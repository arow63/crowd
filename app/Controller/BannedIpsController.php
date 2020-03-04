<?php
/**
 * CrowdFunding
 *
 * PHP version 5
 *
 * @category   PHP
 * @package    Crowdfunding
 * @subpackage Core
 * @author     arow63 <info@arow63.com>
 * @copyright  2018 arow63 Infoway Private Ltd
 * @license    http://www.arow63.com/ arow63 Infoway Licence
 * @link       http://www.arow63.com
 */
class BannedIpsController extends AppController
{
    public $name = 'BannedIps';
    public function admin_index() 
    {
        $this->pageTitle = __l('Banned IPs');
        $this->BannedIp->recursive = -1;
        $this->paginate = array(
            'order' => array(
                $this->modelClass . '.id' => 'desc'
            )
        );
        $this->set('bannedIps', $this->paginate());
        $moreActions = $this->BannedIp->moreActions;
        $this->set('moreActions', $moreActions);
        $this->set('pageTitle', $this->pageTitle);
    }
    public function admin_add($banned_id = null) 
    {
        $this->pageTitle = sprintf(__l('Add %s') , __l('Banned IP'));
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['BannedIp']['address'])) {
                $banned_id = $this->request->data['BannedIp']['address'];
            }
            $this->BannedIp->set($this->request->data);
            if ($this->request->data['BannedIp']['type_id'] == ConstBannedTypes::RefererBlock) {
                unset($this->BannedIp->validate['address']);
                $this->BannedIp->validate['address']['rule'] = 'url';
                $this->BannedIp->validate['address']['message'] = __l('Must be a valid URL, starting with http://');
                $this->BannedIp->validate['address']['allowEmpty'] = false;
            }
            if ($this->BannedIp->validates()) {
                // To get the local ip
                if (empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $easyban_remote_ip = $_SERVER['REMOTE_ADDR'];
                } else {
                    $easyban_remote_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }
                // To set the time duration of banned ip
                if ($this->request->data['BannedIp']['duration_id'] == ConstBannedDurations::Days) {
                    $this->request->data['BannedIp']['timespan'] = ($this->request->data['BannedIp']['duration_time']*86400) +date('U');
                } else if ($this->request->data['BannedIp']['duration_id'] == ConstBannedDurations::Weeks) {
                    $this->request->data['BannedIp']['timespan'] = ($this->request->data['BannedIp']['duration_time']*604800) +date('U');
                } else {
                    $this->request->data['BannedIp']['timespan'] = 0;
                }
                $this->request->data['BannedIp']['thetime'] = date('U');
                $reserved[] = sprintf('%u', ip2long(gethostbyname('127.0.0.1')));
                $reserved[] = sprintf('%u', ip2long(gethostbyname('0.0.0.0')));
                $reserved[] = '::1';
                $reserved[] = sprintf('%u', ip2long(gethostbyname($easyban_remote_ip)));
                $reserved[] = strtolower(gethostbyaddr($easyban_remote_ip));
                $reserved[] = 'localhost';
                $data = $this->request->data;
                $is_own_site = 0;
                // to set the ip range
                if ($data['BannedIp']['type_id'] == ConstBannedTypes::IPRange) {
                    $data['BannedIp']['address'] = sprintf('%u', ip2long(gethostbyname($data['BannedIp']['address'])));
                    $data['BannedIp']['range'] = sprintf('%u', ip2long(gethostbyname($data['BannedIp']['range'])));
                } else if ($data['BannedIp']['type_id'] == ConstBannedTypes::SingleIPOrHostName) {
                    $data['BannedIp']['address'] = sprintf('%u', ip2long(gethostbyname($data['BannedIp']['address'])));
                    $data['BannedIp']['range'] = sprintf('%u', ip2long(gethostbyname($data['BannedIp']['address'])));
                } else if ($data['BannedIp']['type_id'] == ConstBannedTypes::RefererBlock) {
                    $data['BannedIp']['address'] = str_replace('http://', '', $data['BannedIp']['address']);
                    $banned_arr = explode('/', $data['BannedIp']['address']);
                    $data['BannedIp']['address'] = $banned_arr[0];
                    $referer_url = strtolower($data['BannedIp']['address']);
                    $site_url_arr = explode('/', str_replace('http://', '', Router::url('/', true)));
                    $site_url = $site_url_arr[0];
                    if ($site_url != $referer_url) {
                        $data['BannedIp']['referer_url'] = $referer_url;
                    } else {
                        $is_own_site = 1;
                    }
                    unset($data['BannedIp']['address']);
                    unset($data['BannedIp']['range']);
                }
                if (($data['BannedIp']['address'] && $data['BannedIp']['range']) || $data['BannedIp']['referer_url']) {
                    if ((!in_array(strtolower($data['BannedIp']['address']) , $reserved) and !in_array(strtolower($data['BannedIp']['range']) , $reserved)) and !($data['BannedIp']['address'] <= sprintf('%u', ip2long(gethostbyname($easyban_remote_ip))) and $data['BannedIp']['range'] >= sprintf('%u', ip2long(gethostbyname($easyban_remote_ip)))) and !($data['BannedIp']['range'] <= sprintf('%u', ip2long(gethostbyname($easyban_remote_ip))) and $data['BannedIp']['address'] >= sprintf('%u', ip2long(gethostbyname($easyban_remote_ip))))) {
                        $this->BannedIp->create();
                        if ($this->BannedIp->save($data)) {
                            $this->Session->setFlash(sprintf(__l('%s has been added') , __l('Banned IP')) , 'default', null, 'success');
                            $this->redirect(array(
                                'action' => 'index'
                            ));
                        } else {
                            $this->Session->setFlash(sprintf(__l('%s could not be added. Please, try again.') , __l('Banned IP')) , 'default', null, 'error');
                        }
                    } else {
                        $this->Session->setFlash(__l('You cannot add your IP address. Please, try again') , 'default', null, 'error');
                    }
                } else {
                    if (empty($is_own_site)) {
                        $this->Session->setFlash(sprintf(__l('%s could not be added. Please, try again.') , __l('Banned IP')) , 'default', null, 'error');
                    } else {
                        $this->Session->setFlash(__l('You cannot add your own domain. Please, try again') , 'default', null, 'error');
                    }
                }
            } else {
                $this->Session->setFlash(sprintf(__l('%s could not be added. Please, try again.') , __l('Banned IP')) , 'default', null, 'error');
            }
        }
        if (!is_null($banned_id)) {
            $this->request->data['BannedIp']['address'] = $banned_id;
        }
        $this->set('ip', $this->RequestHandler->getClientIP());
        $this->set('types', $this->BannedIp->ipTypesOptions);
        $this->set('durations', $this->BannedIp->ipTimeOptions);
        if (empty($this->request->data['BannedIp']['type_id'])) {
            $this->request->data['BannedIp']['type_id'] = 1;
        }
        $this->set('pageTitle', $this->pageTitle);
    }
    public function admin_delete($id = null) 
    {
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if ($this->BannedIp->delete($id)) {
            $this->Session->setFlash(sprintf(__l('%s deleted') , __l('Banned IP')) , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            throw new NotFoundException(__l('Invalid request'));
        }
    }
}
?>
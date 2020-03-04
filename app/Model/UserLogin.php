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
class UserLogin extends AppModel
{
    public $name = 'UserLogin';
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true
        ) ,
        'Ip' => array(
            'className' => 'Ip',
            'foreignKey' => 'ip_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public function insertUserLogin($user_id) 
    {
        $this->data['UserLogin']['user_id'] = $user_id;
        $this->data['UserLogin']['ip_id'] = $this->toSaveIp();
        $this->data['UserLogin']['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $this->save($this->data);
        if (!empty($_COOKIE['PHPSESSID'])) {
            $hashed_val = md5($_SESSION['Auth']['User']['id'] . session_id() . PERMANENT_CACHE_GZIP_SALT);
            $hashed_val = substr($hashed_val, 0, 7);
            $form_cookie = $_SESSION['Auth']['User']['id'] . '|' . $hashed_val;
            setcookie('_gz', $form_cookie, time() +60*60*24, '/');
        }
    }
    public function afterSave($created) 
    {
        $this->User->updateAll(array(
            'User.last_login_ip_id' => '\'' . $this->toSaveIp() . '\'',
            'User.last_logged_in_time' => '\'' . date('Y-m-d H:i:s') . '\'',
        ) , array(
            'User.id' => $_SESSION['Auth']['User']['id']
        ));
    }
    public function __construct($id = false, $table = null, $ds = null) 
    {
        parent::__construct($id, $table, $ds);
        $this->moreActions = array(
            ConstMoreAction::Delete => __l('Delete')
        );
    }
}
?>
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
class EmailTemplatesController extends AppController
{
    public $name = 'EmailTemplates';
    public function beforeFilter() 
    {
        $this->Security->disabledFields = array(
            '_wysihtml5_mode'
        );
        parent::beforeFilter();
    }
    public function admin_index() 
    {
        $this->pageTitle = __l('Email Templates');
        $emailTemplates = $this->EmailTemplate->find('all', array(
            'recursive' => -1
        ));
        $this->set('emailTemplates', $emailTemplates);
    }
    public function admin_edit($id = null) 
    {
        $this->disableCache();
        $this->pageTitle = sprintf(__l('Edit %s') , __l('Email Template'));
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if (!empty($this->request->data)) {
            if ($this->EmailTemplate->save($this->request->data)) {
                $this->Session->setFlash(sprintf(__l('%s has been updated') , __l('Email Template')) , 'default', null, 'success');
            } else {
                $this->Session->setFlash(sprintf(__l('%s could not be updated. Please, try again.') , __l('Email Template')) , 'default', null, 'error');
            }
            $emailTemplate = $this->EmailTemplate->find('first', array(
                'conditions' => array(
                    'EmailTemplate.id' => $this->request->data['EmailTemplate']['id']
                ) ,
                'fields' => array(
                    'EmailTemplate.name',
                    'EmailTemplate.email_variables'
                ) ,
                'recursive' => -1
            ));
            $this->request->data['EmailTemplate']['name'] = $emailTemplate['EmailTemplate']['name'];
            $this->request->data['EmailTemplate']['email_variables'] = $emailTemplate['EmailTemplate']['email_variables'];
        } else {
            $this->request->data = $this->EmailTemplate->read(null, $id);
            if (empty($this->request->data)) {
                throw new NotFoundException(__l('Invalid request'));
            }
        }
        $this->pageTitle.= ' - ' . $this->request->data['EmailTemplate']['name'];
        $this->set('email_variables', explode(',', $this->request->data['EmailTemplate']['email_variables']));
    }
}
?>
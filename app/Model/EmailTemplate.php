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
class EmailTemplate extends AppModel
{
    public $name = 'EmailTemplate';
    public $displayField = 'name';
    public function __construct($id = false, $table = null, $ds = null) 
    {
        parent::__construct($id, $table, $ds);
        $this->validate = array(
            'from' => array(
                'rule' => 'notempty',
                'allowEmpty' => false,
                'message' => __l('Required')
            ) ,
            'subject' => array(
                'rule' => 'notempty',
                'allowEmpty' => false,
                'message' => __l('Required')
            ) ,
            'email_text_content' => array(
                'rule' => 'notempty',
                'allowEmpty' => false,
                'message' => __l('Required')
            ) ,
            'email_html_content' => array(
                'rule' => 'notempty',
                'allowEmpty' => false,
                'message' => __l('Required')
            ) ,
        );
    }
    public function selectTemplate($tempName) 
    {
        $emailTemplate = $this->find('first', array(
            'conditions' => array(
                'EmailTemplate.name' => $tempName
            ) ,
            'recursive' => -1
        ));
        $resultArray = array();
        foreach($emailTemplate['EmailTemplate'] as $key => $value) {
            $resultArray[$key] = $value;
        }
        return $resultArray;
    }
}
?>
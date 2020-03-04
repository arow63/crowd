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
class AclLinkStatus extends AppModel
{
    public $name = 'AclLinkStatus';
    public $displayField = 'name';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $hasMany = array(
        'Acl.AclLinksRole' => array(
            'className' => 'Acl.AclLinksRole',
            'foreignKey' => 'acl_link_status_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    function __construct($id = false, $table = null, $ds = null) 
    {
        parent::__construct($id, $table, $ds);
    }
}
?>
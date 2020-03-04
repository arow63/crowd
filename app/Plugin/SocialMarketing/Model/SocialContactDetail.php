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
class SocialContactDetail extends AppModel
{
    public $name = 'SocialContactDetail';
    public $hasMany = array(
        'SocialContact' => array(
            'className' => 'SocialMarketing.SocialContact',
            'foreignKey' => 'social_contact_detail_id',
            'dependent' => true,
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
}
?>
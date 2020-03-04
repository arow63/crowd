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
require_once 'constants.php';
Cms::hookComponent('*', 'SocialMarketing.FriendsDetails');
if (!empty($_REQUEST['request_ids'])) {
    Cms::hookComponent('*', 'SocialMarketing.FacebookRequest');
}
$defaultModel = array(
    'User' => array(
        'hasMany' => array(
            'UserFollower' => array(
                'className' => 'SocialMarketing.UserFollower',
                'foreignKey' => 'followed_user_id',
                'dependent' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'exclusive' => '',
                'finderQuery' => '',
                'counterQuery' => ''
            ) ,
            'FollowedUser' => array(
                'className' => 'SocialMarketing.UserFollower',
                'foreignKey' => 'user_id',
                'dependent' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'exclusive' => '',
                'finderQuery' => '',
                'counterQuery' => ''
            ) ,
        )
    )
);
CmsHook::bindModel($defaultModel);

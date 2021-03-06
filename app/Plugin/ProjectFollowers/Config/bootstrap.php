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
CmsNav::add('activities', array(
    'title' => __l('Activities') ,
    'weight' => 30,
    'children' => array(
        'Project Followers' => array(
            'title' => sprintf(__l('%s Followers') , Configure::read('project.alt_name_for_project_singular_caps')) ,
            'url' => array(
                'controller' => 'project_followers',
                'action' => 'index',
            ) ,
            'weight' => 10,
        ) ,
    ) ,
));
CmsHook::setExceptionUrl(array(
    'project_followers/index',
));
$defaultModel = array(
    'User' => array(
        'hasMany' => array(
            'ProjectFollower' => array(
                'className' => 'ProjectFollowers.ProjectFollower',
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
        ) ,
    ) ,
);
$pluginModel = array();
if (isPluginEnabled('Projects')) {
    $pluginModel = array(
        'Project' => array(
            'hasMany' => array(
                'ProjectFollower' => array(
                    'className' => 'ProjectFollowers.ProjectFollower',
                    'foreignKey' => 'project_id',
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
            ) ,
        ) ,
        'Message' => array(
            'belongsTo' => array(
                'ProjectFollower' => array(
                    'className' => 'ProjectFollowers.ProjectFollower',
                    'foreignKey' => 'foreign_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => '',
                ) ,
            ) ,
        ) ,
    );
    $defaultModel = $defaultModel+$pluginModel;
}
CmsHook::bindModel($defaultModel);

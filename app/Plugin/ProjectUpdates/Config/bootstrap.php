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
        'Project Updates' => array(
            'title' => sprintf(__l('%s Updates') , Configure::read('project.alt_name_for_project_singular_caps')) ,
            'url' => array(
                'controller' => 'blogs',
                'action' => 'index',
            ) ,
            'weight' => 10,
        ) ,
        'Project Update Comments' => array(
            'title' => sprintf(__l('%s Update Comments') , Configure::read('project.alt_name_for_project_singular_caps')) ,
            'url' => array(
                'controller' => 'blog_comments',
                'action' => 'index',
            ) ,
            'weight' => 10,
        ) ,
    ) ,
));
CmsHook::setExceptionUrl(array(
    'blogs/index',
    'blogs/view',
    'blog_comments/index',
    'blog_comments/view',
));
$defaultModel = array(
    'User' => array(
        'hasMany' => array(
            'Blog' => array(
                'className' => 'ProjectUpdates.Blog',
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
            'BlogComment' => array(
                'className' => 'ProjectUpdates.BlogComment',
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
            'BlogView' => array(
                'className' => 'ProjectUpdates.BlogView',
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
                'Blog' => array(
                    'className' => 'ProjectUpdates.Blog',
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
                'Blog' => array(
                    'className' => 'ProjectUpdates.Blog',
                    'foreignKey' => 'foreign_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => '',
                ) ,
                'BlogComment' => array(
                    'className' => 'ProjectUpdates.BlogComment',
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

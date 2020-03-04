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
        'Project Ratings' => array(
            'title' => sprintf(__l('%s Votings') , Configure::read('project.alt_name_for_project_singular_caps')) ,
            'url' => array(
                'controller' => 'project_ratings',
                'action' => 'index',
            ) ,
            'weight' => 10,
        ) ,
    ) ,
));
$defaultModel = array();
$pluginModel = array();
if (isPluginEnabled('Projects')) {
    $pluginModel = array(
        'Project' => array(
            'hasMany' => array(
                'ProjectRating' => array(
                    'className' => 'Idea.ProjectRating',
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
                'ProjectRating' => array(
                    'className' => 'Idea.ProjectRating',
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
CmsHook::setExceptionUrl(array(
    'project_ratings/index',
));
CmsHook::bindModel($defaultModel);

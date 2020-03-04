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
CmsNav::add('masters', array(
    'title' => 'Masters',
    'weight' => 200,
    'children' => array(
        'Account' => array(
            'title' => __l('Account') ,
            'url' => '',
            'weight' => 1100,
        ) ,
        'Security Questions' => array(
            'title' => __l('Security Questions') ,
            'url' => array(
                'controller' => 'security_questions',
                'action' => 'index'
            ) ,
            'weight' => 1110,
        ) ,
    )
));
$defaultModel = array(
    'User' => array(
        'belongsTo' => array(
            'SecurityQuestion' => array(
                'className' => 'SecurityQuestions.SecurityQuestion',
                'foreignKey' => 'security_question_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            ) ,
        ) ,
    ) ,
);
CmsHook::bindModel($defaultModel);

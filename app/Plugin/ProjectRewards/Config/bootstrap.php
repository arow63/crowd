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
$defaultModel = array();
$pluginModel = array();
if (isPluginEnabled('Projects')) {
    $pluginModel = array(
        'Project' => array(
            'hasMany' => array(
                'ProjectReward' => array(
                    'className' => 'ProjectRewards.ProjectReward',
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
        'ProjectFund' => array(
            'belongsTo' => array(
                'ProjectReward' => array(
                    'className' => 'ProjectRewards.ProjectReward',
                    'foreignKey' => 'project_reward_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => '',
                    'counterCache' => true,
                    'counterScope' => array(
                        'ProjectFund.project_fund_status_id' => array(
                            ConstProjectFundStatus::Authorized,
                            ConstProjectFundStatus::PaidToOwner,
                            ConstProjectFundStatus::Closed,
                            ConstProjectFundStatus::DefaultFund
                        ) ,
                    )
                ) ,
            ) ,
        ) ,
    );
    $defaultModel = $defaultModel+$pluginModel;
}
CmsHook::bindModel($defaultModel);

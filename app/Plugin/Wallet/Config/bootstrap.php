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
// to show add fund link in users action
Cms::hookAdminRowAction('Users/admin_index', '<i class="fa fa-plus-circle fa-fw"></i> '.__l('Add Fund'), 'controller:user_add_wallet_amounts/action:add_fund/:id', array(
    'title' => __l('Add Fund'),
    'escape' => false,
));
// to show deduct fund link in users action
Cms::hookAdminRowAction('Users/admin_index', '<i class="fa fa-minus fa-fw"></i> '.__l('Deduct Fund'), 'controller:user_add_wallet_amounts/action:deduct_fund/:id', array(
    'title' => __l('Deduct Fund') ,
    'escape' => false,
));
CmsHook::bindModel(array(
    'User' => array(
        'hasMany' => array(
            'UserAddWalletAmount' => array(
                'className' => 'Wallet.UserAddWalletAmount',
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
            'MoneyTransferAccount' => array(
                'className' => 'Withdrawals.MoneyTransferAccount',
                'foreignKey' => 'user_id',
                'dependent' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'exclusive' => '',
                'finderQuery' => '',
                'counterQuery' => '',
            )
        ) ,
    )
));
?>
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
CmsNav::add('plugins', array(
    'title' => __l('Plugins') ,
    'weight' => 70,
    'data-bootstro-step' => '7',
    'data-bootstro-content' => __l('To manage all plugins and their settings.') ,
    'icon-class' => 'certificate',
    'children' => array(
        'plugins' => array(
            'title' => __l('Plugins') ,
            'url' => array(
                'controller' => 'extensions_plugins',
                'action' => 'index',
            ) ,
            'htmlAttributes' => array(
                'class' => 'separator',
            ) ,
            'weight' => 10,
        ) ,
    ) ,
));

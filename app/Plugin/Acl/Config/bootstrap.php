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
CmsHook::setCssFile(array(
    APP . 'Plugin' . DS . 'Acl' . DS . 'webroot' . DS . 'css' . DS . 'acl.css'
) , 'admin');
CmsHook::setJsFile(array(
    APP . 'Plugin' . DS . 'Acl' . DS . 'webroot' . DS . 'js' . DS . 'common.js'
) , 'default');

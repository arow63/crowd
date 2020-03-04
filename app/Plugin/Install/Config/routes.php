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
$path = '/';
$url = array(
    'plugin' => 'install',
    'controller' => 'install'
);
if (file_exists(APP . 'Config' . DS . 'settings.yml')) {
    if (!Configure::read('Install.secured')) {
        $path = '/*';
        $url['action'] = 'finish';
    }
}
CmsRouter::connect($path, $url);

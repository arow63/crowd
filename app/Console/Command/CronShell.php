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
class CronShell extends Shell
{
    function main() 
    {
        App::uses('Router', 'Routing');
        // site settings are set in config
        App::import('Vendor', 'Spyc/Spyc');
        if (file_exists(APP . 'Config' . DS . 'settings.yml')) {
            $settings = Spyc::YAMLLoad(file_get_contents(APP . 'Config' . DS . 'settings.yml'));
            foreach($settings AS $settingKey => $settingValue) {
                Configure::write($settingKey, $settingValue);
            }
        }
        // include cron component
        App::uses('ComponentCollection', 'Controller');
        $collection = new ComponentCollection();
        App::import('Component', 'Cron');
        $this->Cron = new CronComponent($collection);
        $option = !empty($this->args[0]) ? $this->args[0] : '';
        $this->log('Cron started without any issue');
        if (!empty($option) && $option == 'main') {
            $this->Cron->main();
        } elseif (!empty($option) && $option == 'daily') {
            $this->Cron->daily();
        }
    }
}
?>
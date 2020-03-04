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
App::import('Model', 'Project');
class SecondProject extends Project
{
    public $name = 'SecondProject';
    var $useTable = 'projects';
    public $actsAs = array(
        'Inheritable' => array(
            'inheritanceField' => 'class',
            'fieldAlias' => 'SecondProject'
        )
    );
}
?>
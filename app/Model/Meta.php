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
class Meta extends AppModel
{
    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'Meta';
    /**
     * Table name
     *
     * @var string
     * @access public
     */
    public $useTable = 'meta';
    /**
     * Model associations: belongsTo
     *
     * @var array
     * @access public
     */
    public $belongsTo = array(
        'Node' => array(
            'className' => 'Node',
            'foreignKey' => 'foreign_key',
            'conditions' => '',
            'fields' => '',
            'order' => '',
        ) ,
    );
}

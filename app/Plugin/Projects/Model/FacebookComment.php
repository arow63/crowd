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
class FacebookComment extends AppModel
{
    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'FacebookComment';
    /**
     * Behaviors used by the Model
     *
     * @var array
     * @access public
     */
    public function __construct($id = false, $table = null, $ds = null) 
    {
        parent::__construct($id, $table, $ds);
    }
}

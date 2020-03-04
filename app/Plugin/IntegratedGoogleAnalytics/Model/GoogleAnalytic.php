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
class GoogleAnalytic extends AppModel
{
    public $useTable = false;
    public function __construct($id = false, $table = null, $ds = null) 
    {
        parent::__construct($id, $table, $ds);
        $this->filterOptions = array(
            ConstFilterOptions::Loggedin => __l('Loggedin Users') ,
            ConstFilterOptions::Refferred => __l('Refferred Users') ,
            ConstFilterOptions::Followed => __l('Followed Users') ,
            ConstFilterOptions::Voted => __l('Voted Users') ,
            ConstFilterOptions::Commented => __l('Commented Users') ,
            ConstFilterOptions::Funded => __l('Funded Amount Value') ,
            ConstFilterOptions::ProjectPosted => __l('Project Posted Amount Value')
        );
    }
}
?>
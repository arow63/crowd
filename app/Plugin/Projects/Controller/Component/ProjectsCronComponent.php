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
class ProjectsCronComponent extends Component
{
    public function main()
    {
        App::import('Model', 'Projects.Project');
        $this->Project = new Project();
        $this->Project->_updateCityProjectCount();
    }
}

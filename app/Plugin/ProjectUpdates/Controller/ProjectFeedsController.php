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
class ProjectFeedsController extends AppController
{
    public $name = 'ProjectFeeds';
    public function index($project_id = null) 
    {
        $this->pageTitle = __l('Updates');
        $conditions = array();
        if ($project_id) {
            $conditions['ProjectFeed.project_id'] = $project_id;
        }
        $this->paginate = array(
            'conditions' => $conditions,
            'recursive' => -1,
        );
        $this->set('projectFeeds', $this->paginate());
    }
}
?>
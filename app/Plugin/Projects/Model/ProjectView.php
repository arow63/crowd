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
class ProjectView extends AppModel
{
    public $name = 'ProjectView';
    public $actsAs = array();
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $belongsTo = array(
        'Project' => array(
            'className' => 'Projects.Project',
            'foreignKey' => 'project_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true,
            'counterScope' => array(
                'ProjectView.project_view_type_id' => 1
            )
        ) ,
        'EmbeddedProject' => array(
            'className' => 'Projects.Project',
            'foreignKey' => 'project_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => 'embed_view_count',
            'counterScope' => array(
                'ProjectView.project_view_type_id' => 2,
            )
        ) ,
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ) ,
        'Ip' => array(
            'className' => 'Ip',
            'foreignKey' => 'ip_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true
        )
    );
    function __construct($id = false, $table = null, $ds = null) 
    {
        parent::__construct($id, $table, $ds);
        $this->moreActions = array(
            ConstMoreAction::Delete => __l('Delete')
        );
    }
    public function beforeFind($query) 
    {
        $query['conditions'][$this->alias . '.project_type_id'] = $this->getProjectTypes();
        return $query;
    }
}
?>
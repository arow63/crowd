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
class Link extends AppModel
{
    /**
     * Model name
     *
     * @var string
     * @access public
     */
    public $name = 'Link';
    /**
     * Behaviors used by the Model
     *
     * @var array
     * @access public
     */
    public $actsAs = array(
        'Encoder',
        'Tree',
        'Cached' => array(
            'prefix' => array(
                'link_',
                'menu_',
                'cms_menu_',
            ) ,
        ) ,
    );
    /**
     * Model associations: belongsTo
     *
     * @var array
     * @access public
     */
    public $belongsTo = array(
        'Menu' => array(
            'counterCache' => true
        )
    );
    public function __construct($id = false, $table = null, $ds = null) 
    {
        parent::__construct($id, $table, $ds);
        $this->validate = array(
            'menu_id' => array(
                'rule' => 'notempty',
                'message' => __l('Required') ,
            ) ,
            'title' => array(
                'rule' => 'notempty',
                'message' => __l('Required') ,
            ) ,
            'link' => array(
                'rule' => 'notempty',
                'message' => __l('Required') ,
            ) ,
        );
        $this->moreActions = array(
            ConstMoreAction::Publish => __l('Publish') ,
            ConstMoreAction::Unpublish => __l('Unpublish') ,
        );
    }
}

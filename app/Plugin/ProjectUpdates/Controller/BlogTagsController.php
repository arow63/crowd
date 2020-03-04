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
class BlogTagsController extends AppController
{
    public $name = 'BlogTags';
    public function index() 
    {
        $this->pageTitle = __l('Update Tags');
        $blogTag = $this->BlogTag->find('all', array(
            'recursive' => 1,
            'contain' => array(
                'Blog' => array(
                    'fields' => array(
                        'id'
                    )
                )
            )
        ));
        $tag_arr = array();
        foreach($blogTag as $blogTag) {
            $tag_arr[$blogTag['BlogTag']['slug']] = count($blogTag['Blog']);
            $tag_name_arr[$blogTag['BlogTag']['slug']] = $blogTag['BlogTag']['name'];
        }
        $this->set('tag_arr', $tag_arr);
        $this->set('tag_name_arr', $tag_name_arr);
    }
}
?>
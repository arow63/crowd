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
include_once ('Attachment.php');
class Image extends Attachment
{
    public $name = 'Image';
    var $useTable = 'attachments';
    public $actsAs = array(
        //		'WhoDunnit',
        /*		'Slug' => array (
        'label' =>'description',
        'overwrite' => true,
        'unique' => false
        ),
        */
        'ImageUpload'
    );
}

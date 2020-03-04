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
CmsRouter::connect('/blogs/project/:project', array(
    'controller' => 'blogs',
    'action' => 'ProjectUpdates',
    'plugin' => 'Projects',
) , array(
    'project' => '[a-zA-Z0-9\-]+'
));
CmsRouter::connect('/blogs/tag/:tag', array(
    'controller' => 'blogs',
    'action' => 'index',
    'plugin' => 'ProjectUpdates',
) , array(
    'tag' => '[a-zA-Z0-9\-]+'
));
CmsRouter::connect('/blogs/category/:category', array(
    'controller' => 'blogs',
    'action' => 'index',
    'plugin' => 'ProjectUpdates',
) , array(
    'tag' => '[a-zA-Z0-9\-]+'
));
CmsRouter::connect('/blogs/user/:username', array(
    'controller' => 'blogs',
    'action' => 'index',
    'plugin' => 'ProjectUpdates',
) , array(
    'username' => '[a-zA-Z0-9\-]+'
));
CmsRouter::connect('/blogs/status/:status', array(
    'controller' => 'blogs',
    'action' => 'index',
    'plugin' => 'ProjectUpdates',
) , array(
    'tag' => '[a-zA-Z\-]+'
));

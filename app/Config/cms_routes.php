<?php
/**
 * CrowdFunding
 *
 * PHP version 5
 *
 * @category   PHP
 * @package    CrowdFunding
 * @subpackage Core
 * @author     arow63 <info@arow63.com>
 * @copyright  2018 arow63 Infoway Private Ltd
 * @license    http://www.arow63.com/ arow63 Infoway Licence
 * @link       http://www.arow63.com
 */
CakePlugin::routes();
Router::parseExtensions('rss', 'csv', 'json', 'txt', 'xml', 'svg', 'js','css');
// Basic
CmsRouter::connect('/how-it-works', array(
    'controller' => 'nodes',
    'action' => 'how_it_works',
));
CmsRouter::connect('/promoted/*', array(
    'controller' => 'nodes',
    'action' => 'promoted'
));
CmsRouter::connect('/search/*', array(
    'controller' => 'nodes',
    'action' => 'search'
));
// Node
CmsRouter::connect('/node', array(
    'controller' => 'nodes',
    'action' => 'index',
    'type' => 'node'
));
CmsRouter::connect('/node/archives/*', array(
    'controller' => 'nodes',
    'action' => 'index',
    'type' => 'node'
));
CmsRouter::connect('/node/:slug', array(
    'controller' => 'nodes',
    'action' => 'view',
    'type' => 'node'
));
CmsRouter::connect('/node/term/:slug/*', array(
    'controller' => 'nodes',
    'action' => 'term',
    'type' => 'node'
));
// Page
CmsRouter::connect('/page/:slug/*', array(
    'controller' => 'nodes',
    'action' => 'view',
    'type' => 'page'
));
CmsRouter::connect('/css/*', array(
    'controller' => 'devs',
    'action' => 'asset_css'
));
CmsRouter::connect('/js/*', array(
    'controller' => 'devs',
    'action' => 'asset_js'
));
CmsRouter::connect('/img/:size/*', array(
    'controller' => 'images',
    'action' => 'view'
) , array(
    'size' => '(?:[a-zA-Z_]*)*'
));
CmsRouter::connect('/files/*', array(
    'controller' => 'images',
    'action' => 'view',
    'size' => 'original'
));
CmsRouter::connect('/img/*', array(
    'controller' => 'images',
    'action' => 'view',
    'size' => 'original'
));
CmsRouter::connect('/sitemap', array(
    'controller' => 'devs',
    'action' => 'sitemap'
));
CmsRouter::connect('/robots', array(
    'controller' => 'devs',
    'action' => 'robots'
));
CmsRouter::connect('/yadis', array(
    'controller' => 'devs',
    'action' => 'yadis'
));
CmsRouter::connect('/cron/:action/*', array(
    'controller' => 'crons',
));
CmsRouter::connect('/contactus', array(
    'controller' => 'contacts',
    'action' => 'add'
));
CmsRouter::connect('/admin', array(
    'controller' => 'users',
    'action' => 'stats',
    'prefix' => 'admin',
    'admin' => true
));
CmsRouter::connect('/users/register', array(
    'controller' => 'users',
    'action' => 'register',
    'type' => 'social'
));
CmsRouter::connect('/users/register/manual', array(
    'controller' => 'users',
    'action' => 'register'
));
CmsRouter::connect('/users/twitter/login', array(
    'controller' => 'users',
    'action' => 'login',
    'type' => 'twitter'
));
CmsRouter::connect('/users/facebook/login', array(
    'controller' => 'users',
    'action' => 'login',
    'type' => 'facebook'
));
CmsRouter::connect('/users/yahoo/login', array(
    'controller' => 'users',
    'action' => 'login',
    'type' => 'yahoo'
));
CmsRouter::connect('/users/gmail/login', array(
    'controller' => 'users',
    'action' => 'login',
    'type' => 'gmail'
));
CmsRouter::connect('/users/openid/login', array(
    'controller' => 'users',
    'action' => 'login',
    'type' => 'openid'
));
CmsRouter::connect('/r::username', array(
    'controller' => 'users',
    'action' => 'refer'
), array(
	'username' => '[^\/]*'
));

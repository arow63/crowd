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
/**
 * Abstract base class for OAuth consumers.
 *
 * A typical class extending this base class looks like:
 *
 * class TwitterConsumer extends AbstractConsumer {
 *     public function __construct() {
 * 	       parent::__construct('key', 'secret');
 *     }
 * }
 *
 * The following conventions apply for subclasses:
 * - class name has to end with "Consumer", e.g. TwitterConsumer
 * - each class has to be in its own file and named like the class it contains, e.g. TwitterConsumer.php
 *
 * Copyright (c) by Daniel Hofstetter (http://cakebaker.42dh.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 */
abstract class AbstractConsumer
{
    private $consumerKey = null;
    private $consumerSecret = null;
    public function __construct($consumerKey, $consumerSecret) 
    {
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
    }
    final public function getConsumer() 
    {
        return new OAuthConsumer($this->consumerKey, $this->consumerSecret);
    }
}

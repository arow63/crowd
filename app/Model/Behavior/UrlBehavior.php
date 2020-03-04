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
class UrlBehavior extends ModelBehavior
{
    /**
     * Setup
     *
     * @param object $model
     * @param array  $config
     * @return void
     */
    public function setup(Model $model, $config = array()) 
    {
        $_config = array(
            'url' => array(
                'plugin' => false,
                'controller' => 'nodes',
                'action' => 'view',
            ) ,
            'fields' => array(
                'type',
                'slug',
            ) ,
        );
        if (is_string($config)) {
            $config = array(
                $config
            );
        }
        $config = array_merge($_config, $config);
        $this->settings[$model->alias] = $config;
    }
    /**
     * afterFind callback
     *
     * @param object  $model
     * @param array   $created
     * @param boolean $primary
     * @return array
     */
    public function afterFind(Model $model, $results, $primary) 
    {
        if ($primary && isset($results[0][$model->alias])) {
            foreach($results as $i => $result) {
                $url = $this->settings[$model->alias]['url'];
                $fields = $this->settings[$model->alias]['fields'];
                if (is_array($fields)) {
                    foreach($fields as $field) {
                        if (isset($results[$i][$model->alias][$field])) {
                            $url[$field] = $results[$i][$model->alias][$field];
                        }
                    }
                }
                $results[$i][$model->alias]['url'] = $url;
            }
        } elseif (isset($results[$model->alias])) {
            $url = $this->settings[$model->alias]['url'];
            $fields = $this->settings[$model->alias]['fields'];
            if (is_array($fields)) {
                foreach($fields as $field) {
                    if (isset($results[$i][$model->alias][$field])) {
                        $url[$field] = $results[$i][$model->alias][$field];
                    }
                }
            }
            $results[$model->alias]['url'] = $url;
        }
        return $results;
    }
}

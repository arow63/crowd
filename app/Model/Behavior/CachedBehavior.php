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
class CachedBehavior extends ModelBehavior
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
        if (is_string($config)) {
            $config = array(
                $config
            );
        }
        $this->settings[$model->alias] = $config;
    }
    /**
     * afterSave callback
     *
     * @param object  $model
     * @param boolean $created
     * @return void
     */
    public function afterSave(Model $model, $created) 
    {
        $this->_deleteCachedFiles($model);
    }
    /**
     * afterDelete callback
     *
     * @param object $model
     * @return void
     */
    public function afterDelete(Model $model) 
    {
        $this->_deleteCachedFiles($model);
    }
    /**
     * Delete cache files matching prefix
     *
     * @param object $model
     * @return void
     */
    protected function _deleteCachedFiles(Model $model) 
    {
        foreach($this->settings[$model->alias]['prefix'] AS $prefix) {
            $files = glob(TMP . 'cache' . DS . 'queries' . DS . 'cake_' . $prefix . '*');
            if (is_array($files) && count($files) > 0) {
                foreach($files as $file) {
                    @unlink($file);
                }
            }
        }
    }
}

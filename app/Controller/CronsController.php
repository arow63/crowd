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
class CronsController extends AppController
{
    public $name = 'Crons';
    public $components = array(
        'Cron',
    );
    public function main() 
    {
        $this->Cron->main();
        if (!empty($_GET['r'])) {
            $this->Session->setFlash(__l('Status updated successfully') , 'default', null, 'success');
            $this->redirect(Router::url(array(
                'controller' => 'nodes',
                'action' => 'tools',
                'admin' => true
            ) , true));
        }
        $this->autoRender = false;
    }
    public function daily() 
    {
        $this->Cron->daily();
        if (!empty($_GET['r'])) {
            $this->Session->setFlash(__l('Status updated successfully') , 'default', null, 'success');
            $this->redirect(Router::url(array(
                'controller' => 'nodes',
                'action' => 'tools',
                'admin' => true
            ) , true));
        }
        $this->autoRender = false;
    }
	public function encode()
    {
		if (isPluginEnabled('HighPerformance')) {
			App::import('Core', 'ComponentCollection');
			$collection = new ComponentCollection();
			App::import('Component', 'HighPerformance.HighPerformanceCron');
			$this->HighPerformanceCron = new HighPerformanceCronComponent($collection);
			$this->HighPerformanceCron->encode();
			if (!empty($_GET['f'])) {
				$this->Session->setFlash(__l('Encode updated successfully') , 'default', null, 'success');
				$this->redirect(Router::url(array(
					'controller' => 'nodes',
					'action' => 'tools',
					'admin' => true
				) , true));
			}
		}
		$this->autoRender = false;
    }
}

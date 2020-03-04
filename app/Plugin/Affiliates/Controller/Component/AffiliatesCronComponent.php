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
class AffiliatesCronComponent extends Component
{
    public function main() 
    {
        App::import('Model', 'Affiliates.Affiliate');
        $this->Affiliate = new Affiliate();
        $this->Affiliate->update_affiliate_status();
    }
}

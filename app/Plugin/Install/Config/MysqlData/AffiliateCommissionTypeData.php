<?php
/**
 *
 * @package		Crowdfunding
 * @author 		siva_063at09
 * @copyright 	Copyright (c) 2012 {@link http://www.arow63.com/ arow63 Infoway}
 * @license		http://www.arow63.com/ arow63 Infoway Licence
 * @since 		2012-07-25
 *
 */
class AffiliateCommissionTypeData {

	public $table = 'affiliate_commission_types';

	public $records = array(
		array(
			'id' => '1',
			'name' => '%',
			'description' => 'Percentage'
		),
		array(
			'id' => '2',
			'name' => '$',
			'description' => 'Amount'
		),
	);

}

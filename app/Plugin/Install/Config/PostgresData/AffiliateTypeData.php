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
class AffiliateTypeData {

	public $table = 'affiliate_types';

	public $records = array(
		array(
			'id' => '1',
			'created' => '2011-02-08 00:00:00',
			'modified' => '2012-05-12 02:52:10',
			'name' => 'Sign Up',
			'model_name' => 'User',
			'commission' => '2',
			'affiliate_commission_type_id' => '2',
			'is_active' => '1',
			'plugin_name' => ''
		),
		array(
			'id' => '2',
			'created' => '2011-02-08 00:00:00',
			'modified' => '2012-05-12 02:52:10',
			'name' => 'Pledge',
			'model_name' => 'Pledge',
			'commission' => '2',
			'affiliate_commission_type_id' => '1',
			'is_active' => '1',
			'plugin_name' => 'Pledge'
		),
		array(
			'id' => '3',
			'created' => '2011-02-08 00:00:00',
			'modified' => '2012-05-12 02:52:10',
			'name' => 'Project Listing',
			'model_name' => 'Project',
			'commission' => '5',
			'affiliate_commission_type_id' => '1',
			'is_active' => '1',
			'plugin_name' => ''
		),
		array(
			'id' => '4',
			'created' => '2011-02-08 00:00:00',
			'modified' => '2012-05-12 02:52:10',
			'name' => 'Donate',
			'model_name' => 'Donate',
			'commission' => '1',
			'affiliate_commission_type_id' => '1',
			'is_active' => '1',
			'plugin_name' => 'Donate'
		),
		array(
			'id' => '5',
			'created' => '1970-01-01 00:00:00',
			'modified' => '1970-01-01 00:00:00',
			'name' => 'Lend',
			'model_name' => 'Lend',
			'commission' => '0',
			'affiliate_commission_type_id' => '1',
			'is_active' => '1',
			'plugin_name' => 'Lend'
		),
		array(
			'id' => '6',
			'created' => '1970-01-01 00:00:00',
			'modified' => '1970-01-01 00:00:00',
			'name' => 'Equity',
			'model_name' => 'Equity',
			'commission' => '0',
			'affiliate_commission_type_id' => '1',
			'is_active' => '1',
			'plugin_name' => 'Equity'
		),
	);

}

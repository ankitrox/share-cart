<?php

return apply_filters( 'wcssc_settings_fields_general', array(

	array(
		'name' => __( 'Cart Share Settings', 'wcssc' ),
		'type' => 'title',
		'desc' => '',
		'id'   => 'wcssc_title'
	),

	array(
		'name'    => __( 'Share button position', 'wcssc' ),
		'type'    => 'select',
		'desc'    => '',
		'id'      => 'wc_wcssc_button_pos',
		'options' => array(
			'select_btn_pos'                => __( 'Select button position', 'wcssc' ),
			'woocommerce_before_cart_table' => __( 'Before Cart Table', 'wcssc' ),
			'woocommerce_after_cart_table'  => __( 'After Cart Table', 'wcssc' ),
			'woocommerce_before_cart'       => __( 'Before Cart', 'wcssc' ),
			'woocommerce_after_cart'        => __( 'After Cart', 'wcssc' ),
			'woocommerce_cart_actions'      => __( 'Beside update cart button', 'wcssc' ),
		),
		'default' => 'woocommerce_after_cart_table'
	),

	array(
		'name'    => __( 'Share cart button text', 'wcssc' ),
		'type'    => 'text',
		'default' => __( 'Share cart', 'wcssc' ),
		'id'      => 'wcssc_btn_txt'
	),

	array(
		'name'     => __( 'Shared cart page title', 'wcssc' ),
		'type'     => 'text',
		'default'  => __( 'Cart', 'wcssc' ),
		'id'       => 'wcssc_shared_cart_page_title',
		'desc_tip' => __( 'This title would be common across all shared cart pages which doesn\'t have title assigned.', 'wcssc' ),
	),

	array(
		'type' => 'sectionend',
		'id'   => 'wcssc_title'
	),

	array(
		'name' => __( 'Enable social media for sharing', 'wcssc' ),
		'type' => 'title',
		'desc' => '',
		'id'   => 'wcssc_title_sm'
	),

	array(
		'name' => __( 'Facebook', 'wcssc' ),
		'type' => 'checkbox',
		'desc' => __( 'Share On Facebook', 'wcssc' ),
		'id'   => 'wcssc_sm_fb'
	),

	array(
		'name' => __( 'Twitter', 'wcssc' ),
		'type' => 'checkbox',
		'desc' => __( 'Share On Twitter', 'wcssc' ),
		'id'   => 'wcssc_sm_tw'
	),

	array(
		'name' => __( 'WhatsApp', 'wcssc' ),
		'type' => 'checkbox',
		'desc' => __( 'Share On WhatsApp', 'wcssc' ),
		'id'   => 'wcssc_sm_wp'
	),

	array(
		'name' => __( 'Skype', 'wcssc' ),
		'type' => 'checkbox',
		'desc' => __( 'Share On Skype', 'wcssc' ),
		'id'   => 'wcssc_sm_skype'
	),

	array(
		'name' => __( 'Email', 'wcssc' ),
		'type' => 'checkbox',
		'desc' => __( 'Share cart via Email', 'wcssc' ),
		'id'   => 'wcssc_sm_mail'
	),

	array(
		'name' => __( 'Copy to clipboard', 'wcssc' ),
		'type' => 'checkbox',
		'desc' => __( 'Copy cart link to clipboard', 'wcssc' ),
		'id'   => 'wcssc_sm_clipboard'
	),

	array(
		'name' => __( 'Save', 'wcssc' ),
		'type' => 'checkbox',
		'desc' => __( 'Save cart for later (For logged-in users only)', 'wcssc' ),
		'id'   => 'wcssc_sm_save'
	),

	array(
		'type' => 'sectionend',
		'id'   => 'wcssc_title_sm'
	),

	array(
		'name' => __( 'Miscellaneous', 'wcssc' ),
		'type' => 'title',
		'desc' => '',
		'id'   => 'wcssc_misc'
	),

	array(
		'name'     => __( 'Data persistence time', 'wcssc' ),
		'type'     => 'number',
		'desc'     => __( 'Enter days for which shared cart data will persist in database.', 'wcssc' ),
		'desc_tip' => __( 'This would help to clean up the old data and keep the database size minimum.', 'wcssc' ),
		'id'       => 'wcssc_ip_interval'
	),

	array(
		'type' => 'sectionend',
		'id'   => 'wcssc_misc'
	),

) );
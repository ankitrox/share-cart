<?php

return apply_filters( 'wcssc_settings_fields_save_cart', array(

        'section_title' => array(
            'name'     => __( 'Save Cart Settings', 'wcssc' ),
            'type'     => 'title',
            'desc'     => '',
            'id'       => 'wcssc_title'
        ),

        'wcssc_saved_cart_title' => array(
            'name'     => __( 'Saved cart title', 'wcssc' ),
            'type'     => 'text',
            'id'       => 'wcssc_saved_cart_title',
            'default'  => __('Saved carts', 'wcssc'),
            'desc'     => __('This would be visible in my account section.', 'wcssc')
        ),

        'wcssc_save_cart_name' => array(
            'name'     => __( 'Enter name for saved cart label', 'wcssc' ),
            'type'     => 'text',
            'id'       => 'wcssc_save_cart_name',
            'default'  => __('Enter name for saved cart', 'wcssc'),
            'desc'     => __('This would be visible while user would be saving cart on front-end.', 'wcssc')
        ),

        'section_end' => array(
             'type' => 'sectionend',
             'id' => 'wcssc_section_end'
        )
    
));
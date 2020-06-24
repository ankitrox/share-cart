<?php

return apply_filters( 'wcssc_settings_fields_email', array(

        'section_title' => array(
            'name'     => __( 'Email Cart Settings', 'wcssc' ),
            'type'     => 'title',
            'desc'     => '',
            'id'       => 'wcssc_title'
        ),

        'wcssc_email_from' => array(
            'name'     => __( 'Email from address', 'wcssc' ),
            'type'     => 'email',
            'desc'     => __( 'Enter address from which email will be sent', 'wcssc' ),
            'id'       => 'wcssc_email_from'
        ),

        'wcssc_email_from_name' => array(
            'name'     => __( 'Email from name', 'wcssc' ),
            'type'     => 'text',
            'desc'     => __( 'Enter name from which email will be sent', 'wcssc' ),
            'id'       => 'wcssc_email_from_name'
        ),

        'wcssc_email_body' => array(
            'name'     => __( 'Email body', 'wcssc' ),
            'type'     => 'textarea',
            'custom_attributes' => array(
                'rows' => 10,
                'cols' => 20
            ),
            'desc_tip' => 'Use these placeholders. '
                        . '<p><strong>{cart_link}</strong> for cart link.</p>'
                        . '<p><strong>{blogname}</strong> for blog name.</p>'
                        . '<p><strong>{siteurl}</strong> for website url.</p>',
            'id'       => 'wcssc_email_body'
        ),

        'section_end' => array(
             'type' => 'sectionend',
             'id' => 'wcssc_section_end'
        )
    
));
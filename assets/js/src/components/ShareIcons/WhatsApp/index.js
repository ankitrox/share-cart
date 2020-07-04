import React from 'react';
import { isMobile } from 'mobile-device-detect';

const { __ } = window.wp.i18n;

function WhatsAppIcon( { link } ) {

  return (
    <div>
      <a title={ __( 'Share cart on WhatsApp', 'wcssc' ) } target="_blank" href={ ( isMobile ? "whatsapp://send?text=" : "https://web.whatsapp.com/send?text=" ) + encodeURIComponent(link) }>
        <i className="fab fa-whatsapp"></i>
      </a>
    </div>
);
}

export default WhatsAppIcon;

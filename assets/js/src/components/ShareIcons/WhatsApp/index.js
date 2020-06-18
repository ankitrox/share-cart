import React from 'react';
import { isMobile } from 'mobile-device-detect';

function WhatsAppIcon( { link } ) {

  return (
    <div>
      <a target="_blank" href={ ( isMobile ? "whatsapp://send?text=" : "https://web.whatsapp.com/send?text=" ) + encodeURIComponent(link) }>
        <i class="fab fa-whatsapp"></i>
      </a>
    </div>
);
}

export default WhatsAppIcon;

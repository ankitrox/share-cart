import React from 'react';

function WhatsAppIcon( { link } ) {

  return (
    <div>
      <a target="_blank" href={link}>
        <i class="fab fa-whatsapp"></i>
      </a>
    </div>
);
}

export default WhatsAppIcon;

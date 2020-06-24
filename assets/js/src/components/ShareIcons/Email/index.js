import React from 'react';

const { __ } = window.wp.i18n;

function EmailIcon( { onClick } ) {

  return (
    <div>
      <a title={ __('Email this cart', 'wcssc') } href="#" onClick={ onClick } title="Email">
        <i class="fas fa-envelope"></i>
      </a>
    </div>
);
}

export default EmailIcon;

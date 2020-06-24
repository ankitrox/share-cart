import React from 'react';

const { __ } = window.wp.i18n;

function ClipIcon( { onClick } ) {

  return (
    <div>
      <a title={ __( 'Copy cart link to clipboard', 'wcssc' ) } href="#" onClick={ onClick }>
        <i class="fas fa-copy"></i>
      </a>
    </div>
);
}

export default ClipIcon;

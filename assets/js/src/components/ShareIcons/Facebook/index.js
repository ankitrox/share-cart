import React from 'react';

const { __ } = window.wp.i18n;

function FacebookIcon( { link } ) {

  return (
    <div>
      <a target="_blank" title={ __( 'Share on Facebook', 'wcssc' ) } href={ "https://www.facebook.com/sharer.php?u=" + encodeURIComponent( link ) }>
        <i class="fab fa-facebook"></i>
      </a>
    </div>
  );
}

export default FacebookIcon;

import React from 'react';

const { __ } = window.wp.i18n;

function TwitterIcon( { link } ) {

  return (
    <div>
      <a title={ __( 'Share cart on Twitter', 'wcssc' ) } target="_blank" href={"https://twitter.com/intent/tweet?url=" + encodeURIComponent(link)}>
        <i class="fab fa-twitter"></i>
      </a>
    </div>
);
}

export default TwitterIcon;

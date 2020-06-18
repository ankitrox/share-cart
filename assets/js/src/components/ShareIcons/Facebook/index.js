import React from 'react';

function FacebookIcon( { link } ) {

  return (
    <div>
      <a target="_blank" href={ "https://www.facebook.com/sharer.php?u=" + encodeURIComponent( link ) }>
        <i class="fab fa-facebook"></i>
      </a>
    </div>
  );
}

export default FacebookIcon;

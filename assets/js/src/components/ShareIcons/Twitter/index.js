import React from 'react';

function TwitterIcon( { link } ) {

  return (
    <div>
      <a target="_blank" href={"https://twitter.com/intent/tweet?url=" + encodeURIComponent(link)}>
        <i class="fab fa-twitter"></i>
      </a>
    </div>
);
}

export default TwitterIcon;

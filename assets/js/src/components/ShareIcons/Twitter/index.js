import React from 'react';

function TwitterIcon( { link } ) {

  return (
    <div>
      <a target="_blank" href={link}>
        <i class="fab fa-twitter"></i>
      </a>
    </div>
);
}

export default TwitterIcon;

import React from 'react';

function FacebookIcon( { link } ) {

  return (
    <div>
      <a target="_blank" href={link}>
        <i class="fab fa-facebook"></i>
      </a>
    </div>
  );
}

export default FacebookIcon;

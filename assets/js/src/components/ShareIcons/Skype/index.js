import React from 'react';

function SkypeIcon( { link } ) {

  return (
    <div>
      <a target="_blank" href={link}>
        <i class="fab fa-skype"></i>
      </a>
    </div>
);
}

export default SkypeIcon;

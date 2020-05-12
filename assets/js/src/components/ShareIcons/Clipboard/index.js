import React from 'react';

function ClipIcon( { link } ) {

  return (
    <div>
      <a target="_blank" href={link}>
        <i class="fas fa-copy"></i>
      </a>
    </div>
);
}

export default ClipIcon;

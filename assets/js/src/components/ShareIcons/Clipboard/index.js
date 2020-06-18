import React from 'react';

function ClipIcon( { onClick } ) {

  return (
    <div>
      <a href="#" onClick={ onClick }>
        <i class="fas fa-copy"></i>
      </a>
    </div>
);
}

export default ClipIcon;

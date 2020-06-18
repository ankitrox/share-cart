import React from 'react';

function SaveIcon( { onClick } ) {

  return (
    <div>
      <a target="_blank" href="#" onClick={ onClick }>
        <i class="fas fa-save"></i>
      </a>
    </div>
);
}

export default SaveIcon;

import React from 'react';

function SaveIcon( { link } ) {

  return (
    <div>
      <a target="_blank" href={link}>
        <i class="fas fa-save"></i>
      </a>
    </div>
);
}

export default SaveIcon;

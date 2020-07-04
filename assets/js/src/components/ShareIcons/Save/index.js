import React from 'react';

const { __ } = window.wp.i18n;

function SaveIcon( { onClick } ) {

  return (
    <div>
      <a target="_blank" title={ __('Save the cart', 'wcssc') } href="#" onClick={ onClick }>
        <i className="fas fa-save"></i>
      </a>
    </div>
);
}

export default SaveIcon;

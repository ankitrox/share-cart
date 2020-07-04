import React from 'react';

const { __ } = window.wp.i18n;

function SkypeIcon( { link } ) {

  return (
    <div>
      <a title={ __('Share cart on Skype', 'wcssc') } target="_blank" href={"https://web.skype.com/share?url=" + encodeURIComponent(link) }>
        <i className="fab fa-skype"></i>
      </a>
    </div>
);
}

export default SkypeIcon;

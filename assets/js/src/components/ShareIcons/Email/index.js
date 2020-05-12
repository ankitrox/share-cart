import React from 'react';

function EmailIcon( { link } ) {

  return (
    <div>
      <a target="_blank" href={link}>
        <i class="fas fa-envelope"></i>
      </a>
    </div>
);
}

export default EmailIcon;

import React from 'react';

function EmailIcon( { onClick } ) {

  return (
    <div>
      <a href="#" onClick={ onClick } title="Email">
        <i class="fas fa-envelope"></i>
      </a>
    </div>
);
}

export default EmailIcon;

import React from 'react';
import Dialog from '../Containers/Dialog';

function ShareButton ({onClick}) {

  return (
    <>
      <button className="button button-primary" onClick={onClick}>Share Cart</button>
      <Dialog />
    </>
  );
}

export default ShareButton;

import React from 'react';
import Dialog from '../Containers/Dialog';

const { __ } = window.wp.i18n;

function ShareButton ({onClick}) {

  return (
    <>
      <button className="button button-primary" onClick={onClick}> { __( 'Share Cart', 'wcssc' ) } </button>
      <Dialog />
    </>
  );
}

export default ShareButton;

import React from 'react';
import Dialog from '../Containers/Dialog';

const { __ } = window.wp.i18n;

function ShareButton ({onClick}) {

  const ButtonText = window.wcssc_settings.wcssc_btn_text;

  return (
    <>
      <button className="button button-primary" onClick={onClick}> { ButtonText } </button>
      <Dialog />
    </>
  );
}

export default ShareButton;

import React from 'react';
import Modal from 'react-bootstrap/Modal';
import ModalContent from '../../components/ModalContent';

function Dialog( props ) {
  const {
    verified,
    notice,
    classname,
    frame,
    show,
    onHide,
    onEntered
  } = props;
  const Container = <ModalContent screen={frame} />

  return (
    <Modal show={show} onHide={onHide} onEntered={onEntered}>
      <Modal.Header closeButton={true}>
      </Modal.Header>
      <Modal.Body>
        { Container }
        {notice && 	<div className={ "wcssc-notice " + classname }>{notice}</div>}
      </Modal.Body>
    </Modal>
  );
}

export default Dialog;

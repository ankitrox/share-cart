import React from 'react';
import Modal from 'react-bootstrap/Modal';
import ModalContent from '../../components/ModalContent';

function Dialog( props ) {
  const { verified, notice, classname, frame, ...rest } = props;
  const Container = <ModalContent screen={frame} />

  return (
    <Modal {...rest}>
      <Modal.Header closeButton>
      </Modal.Header>
      <Modal.Body closeButton>
        { Container }
        {notice && 	<div class={ "wcssc-notice " + classname }>{notice}</div>}
      </Modal.Body>
    </Modal>
  );
}

export default Dialog;

import React from 'react';
import Modal from 'react-bootstrap/Modal';
import {ReactComponent as Loader} from '../../../src/media/loader.svg';

function Dialog( props ) {
  const { cartlink, ...rest } = props;
  const Container = ( '' === cartlink ) ? <Loader /> : <Loader />;

  return (
    <Modal {...rest}>
      <Modal.Header closeButton>
      <Modal.Title centered>Share Cart</Modal.Title>
      </Modal.Header>
      <Modal.Body>
        { Container }
      </Modal.Body>
    </Modal>
  );
}

export default Dialog;

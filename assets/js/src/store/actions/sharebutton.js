import * as Constants from '../constants';

const { SET_CART_LINK, MODAL_OPEN } = Constants;

/**
 * Open Modal action.
 */
export function cartlink(link) {
  return {
    type: SET_CART_LINK,
    link: link
  }
}

/**
 * Close Modal action.
 */
export function setModal(open) {
  return {
    type: MODAL_OPEN,
    open: open
  }
}

const button = ( state = { cartlink: '', modalOpen: false }, action ) => {

  switch ( action.type ) {

    case 'SET_CART_LINK':
      return {
        ...state,
        cartlink: action.link
      }
    case 'MODAL_OPEN':
      return {
        ...state,
        modalOpen: action.open
      }
    default:
      return state;
  }
}

export default button;

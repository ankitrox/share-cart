const DEFAULT_SAVEFORM = {
  saving: false,
}

const savecart = ( state = DEFAULT_SAVEFORM, action ) => {

  switch ( action.type ) {

    case 'SAVING_CART':
      return {
        ...state,
        saving: true
      }

    default:
      return state;
  }
}

export default savecart;

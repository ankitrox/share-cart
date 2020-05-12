const modal = ( state = { modalOpen: false }, action ) => {

  switch ( action.type ) {

    case 'OPEN':
      return {
        modalOpen: true
      }
    case 'CLOSE':
      return {
        modalOpen: false
      }
    default:
      return state;

  }

}

export default modal;

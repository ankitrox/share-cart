const icons = ( state = { icons: 'cluster' }, action ) => {

  switch ( action.type ) {

    case 'CLUSTER':
    return {
      icons: 'cluster'
    }
    case 'EMAIL':
   return {
      icons: 'email'
    }
    case 'SAVE':
    return {
      icons: 'save'
    }
    case 'CLIP':
    return {
      icons: 'clip'
    }
    default:
      return state;

  }

}

export default icons;

const DEFAULT_DIALOG = {
  modalOpen: false,
  isFetching: false,
  notice: null,
  frame: 'INIT',
  classname: 'error'
}

const dialog = ( state = DEFAULT_DIALOG, action ) => {

  switch ( action.type ) {

    case 'REQUEST_LINK':
      return {
        ...state,
        isFetching: true
      }

    case 'RECEIVE_LINK':
      return {
        ...state,
        isFetching: false,
        frame: 'CLUSTER', // Show all icons
      }

    case 'SET_NOTICE':
      return {
        ...state,
        notice: action.notice,
        classname: ('undefined' !== action.classname) ? action.classname : 'success'
      }

    case 'SET_FRAME':
      return {
        ...state,
        frame: action.frame,
        notice: null
      }

    case 'RECEIVE_ERROR':
      return {
        ...state,
        notice: action.errormessage,
        classname: 'error',
        isFetching: false
      }

    case 'RESET':
      return window.lodash.merge( state, DEFAULT_DIALOG )

    default:
      return state;
  }
}

export default dialog;

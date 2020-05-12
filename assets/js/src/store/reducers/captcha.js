const captcha = ( state = { captchaOK: false }, action ) => {

  switch ( action.type ) {

    case 'VALIDATE':
    return {
      captchaOK: true
    }
    case 'INVALIDATE':
    return {
      captchaOK: false
    }
    default:
      return state;

  }

}

export default captcha;

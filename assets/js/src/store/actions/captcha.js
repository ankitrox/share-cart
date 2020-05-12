import * as Constants from '../constants';

const { CAPTCHA_OK, CAPTCHA_NOT_OK } = Constants;

export function validate() {
  return {
    type: CAPTCHA_OK
  }
}

export function invalidate() {
  return {
    type: CAPTCHA_NOT_OK
  }
}

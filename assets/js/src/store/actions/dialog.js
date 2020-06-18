import { cartlink } from './sharebutton';
import { validate } from '../../store/actions/captcha';
import axios from 'axios';
import { REQUEST_LINK, RECEIVE_LINK, SET_NOTICE, SET_FRAME, RECEIVE_ERROR, RESET } from '../constants';

/**
 * Dispatch an action to set notice.
 *
 * @param classname
 * @param message
 * @return {{classname: *, type: string, notice: *}}
 */
export function setnotice ({ classname, message }) {
  return {
    type: SET_NOTICE,
    notice: message,
    classname: classname
  }

}

/**
 * Sets the modal to a particular frame.
 *
 * @param frame
 * @return {{type: string, frame: string}}
 */
export function setFrame ( frame ) {
  return {
    type: SET_FRAME,
    frame: frame,
  }
}

export function receive_error ( error ) {
  return {
    type: RECEIVE_ERROR,
    errormessage: error,
  }

}

export function reset() {
  return {
    type: RESET
  }
}

/**
 * Fetch the link and validate the captcha.
 * @return {Function}
 */
export function fetchLink() {
  return dispatch => {

    dispatch({ type: REQUEST_LINK });

    const LinkInterceptor = axios.interceptors.response.use( undefined,
    error => Promise.reject(error.response)
    );

    axios.post(
      window.wcssc_settings.api_path.get_link,
    ).
    then( res => {
      if( res.status === 200 ) {
        dispatch({ type: RECEIVE_LINK });
        dispatch(validate());
        dispatch(cartlink(res.data.link));
      }
    }).
    catch(
      error => {
        if( error?.status ) {
          dispatch(receive_error(error.data.message));
        }
      }
    ).finally( () => {
      // Eject the axios interceptor.
      axios.interceptors.request.eject(LinkInterceptor);
    })
  }
}

import axios from 'axios';
import { SAVING_CART } from '../constants';
import { setnotice } from '../actions/dialog';

export function email ( values, formikBag ) {

  return dispatch => {

    dispatch( { type: SAVING_CART } )

    const params = new URLSearchParams();
    params.append('to', values.emailTo );
    params.append('title', values.emailTitle );
    params.append('link', values.link );
    params.append('nonce', window.wcssc_settings.wcssc_nonce );

    axios.post(
      window.wcssc_settings.api_path.email_cart,
      params,
      {
        headers:{
          'Content-Type': 'application/x-www-form-urlencoded'
        }
      } ).
    then(
      res => {
        formikBag.setSubmitting(false);
        if( res && res.status === 200 ) {

          // Display success notice.
          dispatch( setnotice(
            {
              message: res.data.message,
              classname: res.data.success ? 'success' : 'error'
            }
          ));

          // Reset the form on success.
          if( res.data.success ) {
            formikBag.resetForm();
          }
        }
      }
    ).catch(
      error => {
        formikBag.setSubmitting(false);
        if( error && error.response ) {
          console.log(JSON.stringify( error.response ));
        }
      }
    );

  }
}

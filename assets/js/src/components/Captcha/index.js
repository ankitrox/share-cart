import React from 'react';
import ReCAPTCHA from 'react-google-recaptcha'
import { ReactComponent as Loader } from '../../media/loader.svg'

function Captcha({ onSuccess, Invalidate, fetching }) {

  return (
    <>
      <div className="wcssc-captcha">
        <h4>We love humans!</h4>
        <ReCAPTCHA
          sitekey="6LdNjfUUAAAAAP_-LHKXsJZUdpHrT2o_zADrUdl7"
          onChange={ onSuccess }
          onExpired={Invalidate}
          onErrored={Invalidate}
        />
        {fetching && <div><Loader /></div>}
      </div>
    </>
  )
}

export default Captcha;

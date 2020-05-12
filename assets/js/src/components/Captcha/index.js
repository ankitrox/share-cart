import React from 'react';
import ReCAPTCHA from 'react-google-recaptcha'

function Captcha({ onSuccess, Invalidate }) {

  return (
    <ReCAPTCHA
      sitekey="6LdNjfUUAAAAAP_-LHKXsJZUdpHrT2o_zADrUdl7"
      onChange={ onSuccess }
      onExpired={Invalidate}
      onErrored={Invalidate}
    />
  )
}

export default Captcha;

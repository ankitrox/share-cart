import React from 'react';
import ReCAPTCHA from 'react-google-recaptcha'
import { ReactComponent as Loader } from '../../media/loader.svg'

const { __ } = window.wp.i18n;
const CaptchaKey = window.wcssc_settings.wcssc_captcha_key;

function Captcha({ onSuccess, Invalidate, fetching }) {

  return (
    <>
      <div className="wcssc-captcha">
        <h4> { __( 'We love humans!', 'wcssc' ) } </h4>
        <ReCAPTCHA
          sitekey={ CaptchaKey }
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

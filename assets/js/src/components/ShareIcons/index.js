import React, { useState } from 'react';
import FacebookIcon from './Facebook';
import TwitterIcon from './Twitter';
import WhatsAppIcon from './WhatsApp';
import SkypeIcon from './Skype';
import EmailIcon from './Email';
import ClipIcon from './Clipboard';
import SaveIcon from './Save';
import ReCAPTCHA from "react-google-recaptcha";
import Captcha from '../Containers/Captcha'

function ShareIcons( { link } ) {
  const Icons = window.wcssc_settings.socials;

  return (

    <>
    <div className="wcssc-icons-container">
      { Icons.includes("fb") && <FacebookIcon link={ link } /> }
      { Icons.includes("tw") && <TwitterIcon link={ link } /> }
      { Icons.includes("wp") && <WhatsAppIcon link={ link } /> }
      { Icons.includes("skype") && <SkypeIcon link={ link } /> }
      { Icons.includes("email") && <EmailIcon link={ link } /> }
      { Icons.includes("clipboard") && <ClipIcon link={ link } /> }
      { Icons.includes("save") && <SaveIcon link={ link } /> }
    </div>
    <div className="wcssc-captcha">
        <Captcha />
    </div>
    </>

  );

}

export default ShareIcons;

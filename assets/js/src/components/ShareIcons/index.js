import React, { useState } from 'react';
import FacebookIcon from './Facebook';
import TwitterIcon from './Twitter';
import WhatsAppIcon from './WhatsApp';
import SkypeIcon from './Skype';
import EmailIcon from '../Containers/ShareIcons/Email';
import ClipIcon from '../Containers/ShareIcons/Clipboard';
import SaveIcon from '../Containers/ShareIcons/Save';

function ShareIcons( { cartlink } ) {
  const Icons = window.wcssc_settings.socials;
  const Nonce = window.wcssc_settings.nonce;

  return (

    <>
    <div className="wcssc-icons-container">
      { Icons.includes("fb") && <FacebookIcon link={ cartlink } /> }
      { Icons.includes("tw") && <TwitterIcon link={ cartlink } /> }
      { Icons.includes("wp") && <WhatsAppIcon link={ cartlink } /> }
      { Icons.includes("skype") && <SkypeIcon link={ cartlink } /> }
      { Icons.includes("mail") && <EmailIcon link={ cartlink } /> }
      { Icons.includes("clipboard") && <ClipIcon link={ cartlink } /> }
      { Icons.includes("save") && '' !== Nonce && <SaveIcon /> }
    </div>
    </>

  );

}

export default ShareIcons;

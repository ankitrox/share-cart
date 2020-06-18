import React from 'react';

import Captcha from '../Containers/Captcha';
import ShareIcons from '../Containers/ShareIcons';
import EmailForm from '../Containers/EmailForm';
import SaveForm from '../Containers/SaveForm';

function ModalContent( { screen } ) {
  let Screen = <Captcha />;

  switch ( screen ) {
    /**
     * Display Captcha Screen.
     */
    case 'INIT':
      Screen = <Captcha />
    break;

    case 'CLUSTER':
      Screen = <ShareIcons />;
    break;

    case 'EMAIL_FORM':
      Screen = <EmailForm />
    break;

    case 'SAVE_FORM':
      Screen = <SaveForm />;
    break;
  }

  return Screen;

}

export default ModalContent;

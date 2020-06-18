import { connect } from 'react-redux'
import EmailIcon from '../../../ShareIcons/Email';
import { setFrame }  from '../../../../store/actions/dialog';

const mapDispatchToProps = (dispatch) => ({
  onClick: (e) => {
    e.preventDefault();
    dispatch( setFrame( 'EMAIL_FORM' ) );
  }
})

export default connect( null, mapDispatchToProps )(EmailIcon)

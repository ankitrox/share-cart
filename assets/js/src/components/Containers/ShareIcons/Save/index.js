import { connect } from 'react-redux'
import SaveIcon from '../../../ShareIcons/Save';
import { setFrame }  from '../../../../store/actions/dialog';

const mapDispatchToProps = (dispatch) => ({
  onClick: (e) => {
    e.preventDefault();
    dispatch( setFrame( 'SAVE_FORM' ) );
  }
})

export default connect( null, mapDispatchToProps )(SaveIcon)

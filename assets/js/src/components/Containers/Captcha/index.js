import { connect } from 'react-redux'
import Captcha from '../../../components/Captcha'
import { validate, invalidate } from '../../../store/actions/captcha';
import { fetchLink } from '../../../store/actions/dialog';

const mapPropsToState = ( state ) => ({
  fetching: state.dialog.isFetching
})

const mapDispatchToProps = (dispatch) => ({
  onSuccess: () => dispatch( fetchLink() ),
  Invalidate: () => dispatch( invalidate() )
})

export default connect(mapPropsToState, mapDispatchToProps)(Captcha)

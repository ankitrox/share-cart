import { connect } from 'react-redux'
import Captcha from '../../../components/Captcha'
import { validate, invalidate } from '../../../store/actions/captcha';

const mapDispatchToProps = (dispatch) => ({
  onSuccess: () => dispatch( validate() ),
  Invalidate: () => dispatch( invalidate() )
})

export default connect(null, mapDispatchToProps)(Captcha)

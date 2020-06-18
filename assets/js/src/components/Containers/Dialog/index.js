import { connect } from 'react-redux'
import Dialog from '../../../components/Dialog';
import { setModal } from '../../../store/actions/sharebutton';
import { invalidate } from '../../../store/actions/captcha';
import { reset } from '../../../store/actions/dialog';

const mapStateToProps = ( state ) => ({
  show: state.button.modalOpen,
  cartlink: state.button.cartlink,
  centered: true, // always centered
  verified: state.captcha.captchaOK,
  notice: state.dialog.notice,
  classname: state.dialog.classname,
  frame: state.dialog.frame
})

const mapDispatchToProps = (dispatch) => ({
  onHide: ()  => {
    dispatch(setModal(false));
    dispatch( invalidate() )
    dispatch( reset() );
  },
})

export default connect( mapStateToProps, mapDispatchToProps )(Dialog)

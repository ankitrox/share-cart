import { connect } from 'react-redux'
import Dialog from '../../../components/Dialog';
import { setModal } from '../../../store/actions/sharebutton';

const mapStateToProps = ( state ) => ({
  show: state.button.modalOpen,
  cartlink: state.button.cartlink,
  centered: true // always centered
})

const mapDispatchToProps = (dispatch) => ({
  onHide: () => dispatch( setModal(false) )
})

export default connect( mapStateToProps, mapDispatchToProps)(Dialog)

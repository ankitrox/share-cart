import { connect } from 'react-redux'
import ShareButton from '../../../components/ShareButton';
import { setModal } from '../../../store/actions/sharebutton';

const mapDispatchToProps = (dispatch) => ({
  onClick: (e) => { e.preventDefault(); dispatch( setModal(true) ); }
})

export default connect( null, mapDispatchToProps)(ShareButton)

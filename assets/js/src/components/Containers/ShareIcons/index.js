import { connect } from 'react-redux'
import ShareIcons from '../../../components/ShareIcons';

const mapStateToProps = ( state ) => ({
  cartlink: state.button.cartlink,
});

export default connect( mapStateToProps, null )(ShareIcons)

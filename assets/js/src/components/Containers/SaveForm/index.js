import { connect } from 'react-redux'
import SaveForm from '../../../components/SaveForm';
import { savecart } from '../../../store/actions/saveForm';
import { setnotice, setFrame } from '../../../store/actions/dialog';

const mapDispatchToProps = (dispatch) => ({
  onBack: ()  => {
    dispatch( setnotice( { message: null } ) );
    dispatch( setFrame( 'CLUSTER' ) );
  },
  onSubmit: ( values, formikBag ) => {
    console.log(formikBag);
    dispatch( savecart( values, formikBag ) );
  }
})

export default connect( null, mapDispatchToProps )(SaveForm)

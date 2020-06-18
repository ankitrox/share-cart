import { connect } from 'react-redux'
import EmailForm from '../../../components/EmailForm';
import { email } from '../../../store/actions/emailForm';
import { setnotice, setFrame } from '../../../store/actions/dialog';

const mapStateToProps = ( state ) => {
  return ({
    link: state.button.cartlink
  })
}

const mapDispatchToProps = (dispatch) => ({
  onBack: ()  => {
    dispatch( setnotice( { message: null } ) );
    dispatch( setFrame( 'CLUSTER' ) );
  },

  submitForm: (values, formikBag) => {
    dispatch( email( values, formikBag))
  }
})

const mergeProps = (stateProps, dispatchProps) => ({
  ...stateProps,
  ...dispatchProps,
  onSubmit: ( values, formikBag ) => {
    dispatchProps.submitForm( { ...values, link: stateProps.link }, formikBag )
  }
})

export default connect( mapStateToProps, mapDispatchToProps, mergeProps )(EmailForm)

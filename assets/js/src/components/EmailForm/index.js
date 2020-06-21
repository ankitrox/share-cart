import React from 'react';
import { Formik, Form, Field } from 'formik';
import * as Yup from 'yup';
import { ReactComponent as Loader } from '../../media/loader.svg'

const { __ } = window.wp.i18n;

export default function EmailForm ( props ) {
  const { onBack, onSubmit } = props;

  return(
    <>
    <h3> { __('Email Cart', 'wcssc') } </h3>
  <Formik
  initialValues={{
    emailTo: '',
    emailTitle: '',
  }}

  validationSchema={Yup.object({
      emailTo: Yup.string()
        .max(50,  __( 'Must be 50 characters or less', 'wcssc' ) )
        .required( __( 'Required', 'wcssc' ) ),
      emailTitle: Yup.string()
        .required( __( 'Required', 'wcssc' ) )
    })}

    onSubmit={ onSubmit }
    >

    {
      props => {

    const { isSubmitting } = props;

    return (
      <Form>
        <div className="wcssc-form-row">
        <label htmlFor="emailTo"> { __('Email address', 'wcssc') } </label>
        <Field name="emailTo" type="text" autocomplete="off" onBlur={ props } placeholder={ __('Email to whom you want to send cart', 'wcssc') } />
        </div>

        <div className="wcssc-form-row">
          <label htmlFor="emailTitle"> { __('Email Title', 'wcssc') } </label>
          <Field name="emailTitle" type="text" autocomplete="off" onBlur={ props } placeholder={ __( 'Email subject', 'wcssc' ) } />
        </div>

        <div className="wcssc-form-row">
          <button onClick={ onBack }>{ __('Back', 'wcssc') }</button>
          <button type="submit"> { __( 'Submit', 'wcssc' ) } </button>
          {isSubmitting && <span className="form-spinner"><Loader /></span>}
        </div>
      </Form>
    )
  }
}

</Formik>
  </>
)
}

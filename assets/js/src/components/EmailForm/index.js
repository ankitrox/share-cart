import React from 'react';
import { Formik, Form, Field } from 'formik';
import * as Yup from 'yup';
import { ReactComponent as Loader } from '../../media/loader.svg'

export default function EmailForm ( props ) {
  const { onBack, onSubmit } = props;

  return(
    <>
    <h3>Email Cart</h3>
  <Formik
  initialValues={{
    emailTo: '',
    emailTitle: '',
  }}

  validationSchema={Yup.object({
      emailTo: Yup.string()
        .max(50, 'Must be 50 characters or less')
        .required('Required'),
      emailTitle: Yup.string()
        .required('Required')
    })}

    onSubmit={ onSubmit }
    >

    {
      props => {

    const { isSubmitting } = props;

    return (
      <Form>
        <div className="wcssc-form-row">
        <label htmlFor="emailTo">Email address</label>
        <Field name="emailTo" type="text" autocomplete="off" onBlur={ props } placeholder="Email to whom you want to send cart" />
        </div>

        <div className="wcssc-form-row">
          <label htmlFor="emailTitle">Email Title</label>
          <Field name="emailTitle" type="text" autocomplete="off" onBlur={ props } placeholder="Title of email" />
        </div>

        <div className="wcssc-form-row">
          <button onClick={ onBack }>Back</button>
          <button type="submit">Submit</button>
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

import React from 'react';
import { Formik, Form, Field } from 'formik';
import * as Yup from 'yup';
import { ReactComponent as Loader } from '../../media/loader.svg'

export default function SaveForm ( props ) {
  const { onBack, onSubmit } = props;

  return(
    <>
      <h3>Save Cart</h3>
      <Formik
      initialValues={{
      cartTitle: '',
      cartDescription: '',
      }}

      validationSchema={Yup.object({
        cartTitle: Yup.string()
          .max(50, 'Must be 50 characters or less')
          .required('Required'),
        cartDescription: Yup.string()
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
              <label htmlFor="cartTitle">Cart Title</label>
              <Field name="cartTitle" type="text" autocomplete="off" onBlur={ props } />
            </div>

            <div className="wcssc-form-row">
              <label htmlFor="cartDescription">Cart Description</label>
              <Field name="cartDescription" as="textarea" onBlur={ ( e ) => console.log( e ) }  />
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

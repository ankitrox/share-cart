import React from 'react';
import { render } from 'react-dom'
import ShareButton from './components/Containers/ShareButton';
import SavedCarts from './components/SavedCarts';
import domready from '@wordpress/dom-ready';
import rootReducer from './store/reducers';
import { createStore, applyMiddleware } from 'redux';
import { Provider } from 'react-redux'
import thunkMiddleware from 'redux-thunk'
import './App.css'

const store = createStore(
  rootReducer,
  applyMiddleware(
    thunkMiddleware
  )
);

function RenderShareButton() {
  const target = document.getElementById('wcssc-button-container');
  const saved_carts_element = document.getElementById('saved-carts-table');

  /**
   * Mount the shared cart button.
   */
  if( target ) {
    render(
      <Provider store={store}>
        <ShareButton />
      </Provider>,
      target
    );
  }

  /**
   * Mount the saved carts from current user.
   */
  if( saved_carts_element ) {
    render(
      <SavedCarts />,
      saved_carts_element
    );
  }

};

domready(() => { RenderShareButton(); })

window.jQuery( document.body ).bind( 'updated_wc_div', RenderShareButton );

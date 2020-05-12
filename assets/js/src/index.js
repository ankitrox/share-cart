import React from 'react';
import { render } from 'react-dom'
import 'bootstrap/dist/css/bootstrap.css';
import ShareButton from './components/Containers/ShareButton';
import domready from '@wordpress/dom-ready';
import rootReducer from './store/reducers';
import Style from './App.css';
import { createStore } from 'redux';
import { Provider } from 'react-redux'

const store = createStore(rootReducer);

function RenderShareButton() {
  const target = document.getElementById('wcssc-button-container');

  if( target ) {
    render(
      <Provider store={store}>
        <ShareButton />
      </Provider>,
      target
    );
  }
};

domready(() => { RenderShareButton(); })

//window.jQuery( document.body ).bind( 'updated_wc_div', RenderShareButton );

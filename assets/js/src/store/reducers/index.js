import { combineReducers } from 'redux'
import captcha from './captcha'
import icons from './Icons'
import button from './sharebutton'

export default combineReducers({
  captcha,
  icons,
  button
});

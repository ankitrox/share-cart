import { combineReducers } from 'redux'
import captcha from './captcha'
import icons from './Icons'
import button from './sharebutton'
import dialog from './dialog'
import savecart from './saveform'

export default combineReducers({
  captcha,
  icons,
  button,
  dialog,
  savecart,
});

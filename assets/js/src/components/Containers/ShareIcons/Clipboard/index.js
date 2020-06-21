import { connect } from 'react-redux'
import ClipIcon from '../../../ShareIcons/Clipboard';
import { setnotice } from '../../../../store/actions/dialog'
import copy from 'copy-to-clipboard';

const { __ } = window.wp.i18n;

const mapStateToProps = ( state ) => ({
  link: state.button.cartlink,
});

const mapDispatchToProps = (dispatch) => ({
  copyLink: ( link )  => {
    copy(link)
    dispatch(
      setnotice(
        {
          classname: 'success',
          message: __( 'Cart link copied to clipboard', 'wcssc' )
        }
      )
    )
  }
})

const mergeProps = ( stateprops, dispatchprops ) => ({
  ...stateprops,
  ...dispatchprops,
  onClick: (e)  => {
    e.preventDefault();
    dispatchprops.copyLink( stateprops.link )
  }
})

export default connect( mapStateToProps, mapDispatchToProps, mergeProps )(ClipIcon)

import React, { useState } from 'react';
import axios from 'axios';
import RemoveConfirm from './RemoveConfirm';
import Cart from './Cart';


/**
 * Delete a particular cart.
 * 
 * @param { int } id
 */
function deleteCart( id ) {
    let delete_path = window.wcssc_settings.api_path.delete_cart;
    delete_path = delete_path.replace( "{id}", id.toString() );
    axios.delete(
        delete_path,
        {
            headers: {
                'X-WP-Nonce': window.wcssc_settings.nonce,
            }
        }
    ).then(
        res => {
            console.log(res);
        }
    )
}

/**
 * Saved cart icon.
 * 
 * @param { cart } props 
 */
export default function SavedCart( props ) {
    const [ cartdelete, AskDelete ] = useState( false );
    const { cart, setcart, allCarts } = props;
    
    /**
     * Render individual saved cart.
     */
    const RenderCart = () => {
        if ( true === cartdelete ) {
            return <RemoveConfirm cart={ cart } deleteCart={ ( ) => deleteCart( cart.id ) } />
        }else {
            return <Cart cart={ cart } onDelete={ () => AskDelete( true ) } />
        }
    }
    
    return (
        <RenderCart />
    )

}

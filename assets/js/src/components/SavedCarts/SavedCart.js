import React, { useState } from 'react';
import axios from 'axios';
import RemoveConfirm from './RemoveConfirm';
import Cart from './Cart';
import Deleting from './Deleting';

/**
 * Saved cart icon.
 * 
 * @param { cart } props 
 */
export default function SavedCart( props ) {
    const [ cartdelete, AskDelete ]     = useState( false );
    const [ cartdeleting, SetDeleting ] = useState( false );
    const { cart, setcart, allCarts }   = props;

    /**
     * Delete a particular cart.
     * 
     * @param { int } id
     */
    function deleteCart( id ) {
        let delete_path = window.wcssc_settings.api_path.delete_cart;
        delete_path = delete_path.replace( "{id}", id.toString() );
        SetDeleting(true);
        axios.delete(
            delete_path,
            {
                headers: {
                    'X-WP-Nonce': window.wcssc_settings.nonce,
                }
            }
        ).then(
            res => {
                SetDeleting(false);
                if( res && res.status === 200 ) {
                    const RemainingCarts = ( allCarts.length > 1 ) ? allCarts.filter( cart => cart.id !== id ) : []
                    setcart( RemainingCarts );
                }
            }
        )
    }

    /**
     * Render individual saved cart.
     */
    const RenderCart = () => {
        if ( !cartdeleting && ( true === cartdelete ) ) {
            return <RemoveConfirm cart={ cart } 
                        deleteCart={ ( ) => { deleteCart( cart.id ) } } cancelDelete={ () => AskDelete( false ) } />
        }else if ( cartdeleting ) {
            return <Deleting cart={ cart } />
        } else {
            return <Cart cart={ cart } onDelete={ () => AskDelete( true ) } />
        }
    }
    
    return (
        <RenderCart />
    )

}

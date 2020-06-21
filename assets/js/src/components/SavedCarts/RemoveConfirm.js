import React from 'react';
const { __ } = window.wp.i18n;

export default function RemoveConfirm( { cart, deleteCart, cancelDelete } ) {
    return (
        <div key={ parseInt( cart.id ) } className="cart-row-remove">
            <div> { __( 'Are you sure you want to delete this?', 'wcssc' ) } </div>
            <div>
                <button onClick={ cancelDelete }>{ __( 'Cancel', 'wcssc' ) }</button>
                <button onClick={ deleteCart } className="remove-cart">{ __( 'Yes, sure!' ) }</button>
            </div>
        </div>
    )
}

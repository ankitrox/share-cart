import React from 'react';

export default function RemoveConfirm( { cart, deleteCart, cancelDelete } ) {
    return (
        <div key={ parseInt( cart.id ) } className="cart-row-remove">
            <div>Are you sure you want to delete this?</div>
            <div>
                <button onClick={ cancelDelete }>Cancel</button>
                <button onClick={ deleteCart } className="remove-cart">Yes, sure!</button>
            </div>
        </div>
    )
}

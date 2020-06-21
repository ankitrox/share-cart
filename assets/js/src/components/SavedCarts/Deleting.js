import React from 'react';
import { ReactComponent as CartDeleting } from '../../media/deleteCart.svg';

export default function Deleting( cart ) {
    return (
        <div key={ parseInt( cart.id ) } className="cart-row-remove">
            <CartDeleting />
        </div>
    )
}
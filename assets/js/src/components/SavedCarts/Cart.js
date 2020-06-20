import React from 'react';
import { Icon, trash } from '@wordpress/icons';

/**
 * Remove icon.
 * 
 * @param { Icon, width, height } props 
 */
function RemoveIcon( props ) {
    const { onClick, icon, width, height } = props;

    return <Icon icon={ icon } width={ width } height={ height } onClick={ onClick } />
}

/**
 * 
 * 
 * @param { Object } cart
 * @param { function } onDelete
 */
export default function Cart( { cart, onDelete } ) {
    return (
        <div key={ parseInt( cart.id ) } className="cart-row">
            <div className="cartname cartrow-item">
                <a href={ cart.link } title={ cart.title.raw }>
                    { cart.title.raw }
                </a>
            </div>
            <div className="cartremove cartrow-item">
                <RemoveIcon onClick={ onDelete } icon={ trash } width="30"  height="30" />
            </div>
        </div>
    )
}

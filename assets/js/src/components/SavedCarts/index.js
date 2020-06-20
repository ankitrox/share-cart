import React, { useState, useEffect } from 'react';
import axios from 'axios';
import SavedCart from './SavedCart';
import { ReactComponent as Loader } from '../../media/loader.svg'

export default function SavedCarts( props ) {
    const [ carts, setCarts ] = useState([]);
    const [ isFetching, setFetching ] = useState( false );

    /**
     * Request carts once the component is mounted.
     */
    useEffect( () => {
        let url = new URL( window.wcssc_settings.api_path.saved_carts );
        url.searchParams.append( 'nonce', window.wcssc_settings.wcssc_nonce );
        url.searchParams.append( 'context', 'edit' );

        // Display loader before fetching posts.
        setFetching( true );

        axios.get(
            url,
            {
                headers: {
                    'X-WP-Nonce': window.wcssc_settings.nonce,
                }
            }
        ).
        then(
            res => {
                setFetching(false);
                if( res.status === 200 ) {
                    console.log(res.data);
                    setCarts( res.data );
                    // reset the nonce.
                    window.wcssc_settings.nonce = res.headers['x-wp-nonce'];
                }
            }
        ).
        catch(
            error => {
                setFetching(false);
                console.log(error);
            }
        )

    }, []);

    const RenderCarts = () => {
        if( carts.length > 0 ) {
            const CartRows = carts.map( ( cart ) => {
                return <SavedCart cart={cart} setcart={ setCarts } allCarts={carts} />
            });

            return (
                <>
                    <div key="carthead" className="cart-row-heading cart-row">
                        <div className="cartname cartrow-item">Cart Name</div>
                        <div className="cartremove cartrow-item">Remove Cart</div>
                    </div>

                    { CartRows }
                </>
            )
        }else if( isFetching ) {
            return <span className="form-spinner"><Loader /></span>
        }else {
            return <div>There are no saved carts to display.</div>
        }
    }

    return (
        <>
            <RenderCarts />
        </>
    )
}

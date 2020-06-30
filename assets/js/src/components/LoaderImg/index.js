import React from '@wordpress/element';
import Loader from '../../media/loader.svg'

const { __ } = window.wp.i18n;

export default function LoaderImg() {
    return (
        <>
            <img src={LoaderURL} alt={ __( 'Loader', 'wcssc' ) } />
        </>
    )
}

import React from 'react';

export default function MensajeError(props) {
    const {message, errors} = props.result;
    var errores = [];
    for (const campo in errors) {
        errores.push(<li key={campo}><strong>{campo}</strong> {errors[campo][0]}</li>)
    }
    return (
        <>
            <div>{message}</div>
            <ul>{errores}</ul>
        </>
    );
}
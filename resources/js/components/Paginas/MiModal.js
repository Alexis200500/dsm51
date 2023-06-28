import React, {useState, useEffect} from 'react';
import {Modal} from 'react-bootstrap';

export default function MiModal(props) {
    const {mostrar, titulo} = props.datos;
    const [show, setShow] = useState(mostrar);

    useEffect(() => {
        setShow(mostrar);
    }, [props]);

    return (
        <Modal
            size="lg"
            show={show}
            onHide={() => setShow(false)}
            aria-labelledby="example-modal-sizes-title-lg"
        >
            <Modal.Header closeButton>
            <Modal.Title id="example-modal-sizes-title-lg">{titulo}</Modal.Title>
            </Modal.Header>
            <Modal.Body>
                {props.children}
            </Modal.Body>
        </Modal>
    );
}
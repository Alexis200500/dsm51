import React, {useState, useEffect} from 'react';
import {Modal, Button} from 'react-bootstrap';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faWindowClose, faTrash } from '@fortawesome/free-solid-svg-icons';

export default function ConfirmaEliminacion(props) {
    const {handleConfirmaEliminacion, datos:{mostrar, titulo, body}} = props;
    const [show, setShow] = useState(mostrar);

    useEffect(() => {
        setShow(mostrar);
    }, [props]);
    return (
        <Modal show={show} onHide={() => setShow(false)} size="sm">
            <Modal.Header closeButton className="bg-danger text-white">
                <Modal.Title>{titulo}</Modal.Title>
            </Modal.Header>
            <Modal.Body>
                <p>{body}</p>
            </Modal.Body>
            <Modal.Footer>
                <Button variant="secondary" size="sm" onClick={() => {setShow(false)}}><FontAwesomeIcon icon={faWindowClose} /> cancelar</Button>
                <Button variant="danger" size="sm" onClick={() => {handleConfirmaEliminacion()}}><FontAwesomeIcon icon={faTrash} /> eliminar</Button>
            </Modal.Footer>
        </Modal>
    );
}
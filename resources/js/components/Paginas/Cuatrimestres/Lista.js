import React from 'react';
import {Table, Button} from 'react-bootstrap';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faPlus, faEdit, faTrash } from '@fortawesome/free-solid-svg-icons';

export default function Lista(props) {
    return (
        <Table striped bordered hover size="sm">
            <thead>
                <tr>
                    <th style={{width:'60%'}}>Cuatrimestre</th>
                    <th style={{width:'10%'}}>Fecha Inicio</th>
                    <th style={{width:'10%'}}>Fecha Termino</th>
                    <th style={{width:'10%'}}>Estatus</th>
                    <th style={{width:'10%'}}>
                        <Button variant="primary" size="sm" onClick={()=>{props.handleAgrega()}}>
                            <FontAwesomeIcon icon={faPlus} />
                        </Button>
                    </th>
                </tr>
            </thead>
            <tbody>
                {renglones(props)}
            </tbody>
        </Table>
    );
}

function renglones({estatus, handleEdita, handleBorra}) {
    if (estatus.loading) {
        return <tr><td colSpan="4" style={{textAlign:'center', fontWeight:'bold'}}>Cargando...</td></tr>
    }
    if (1 > estatus.result.data.length) {
        return <tr><td colSpan="4" style={{textAlign:'center', fontWeight:'bold'}}>Sin Cuatrimestres</td></tr>
    }
    return estatus.result.data.map((r) => (
        <tr key={r.id}>
            <td>{r.cuatrimestre}</td>
            <td>{r.fecha_inicio}</td>
            <td>{r.fecha_termino}</td>
            <td>{r.estatus}</td>
            <td>
                <Button variant="outline-secondary" size="sm" onClick={() => {handleEdita(r)}}>
                    <FontAwesomeIcon icon={faEdit} />
                </Button>
                &nbsp;
                <Button variant="outline-danger" size="sm" onClick={() => {handleBorra(r)}}>
                    <FontAwesomeIcon icon={faTrash} />
                </Button>
            </td>
        </tr>
    ))
}
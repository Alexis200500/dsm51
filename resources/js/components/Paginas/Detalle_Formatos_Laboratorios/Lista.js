import React from 'react';
import {Table, Button} from 'react-bootstrap';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faPlus, faEdit, faTrash } from '@fortawesome/free-solid-svg-icons';

export default function Lista(props) {
    return (
        <Table striped bordered hover size="sm">
            <thead>
                <tr>
                    <th>Laboratorio</th>
                    <th>Asignatura</th>
                    <th>Docente</th>

                    <th>Equipos de Trabajo</th>
                    <th>Fecha</th>
                    <th>Practica</th>
                                        
                    <th>Objetivo</th>
                    <th>Observaciones</th>
                    
                    <th>Formato</th>
                    <th>
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
        return <tr><td colSpan="11" style={{textAlign:'center', fontWeight:'bold'}}>Cargando...</td></tr>
    }
    if (1 > estatus.result.data.length) {
        return <tr><td colSpan="11" style={{textAlign:'center', fontWeight:'bold'}}>Sin Grupos Laboratorio</td></tr>
    }
    return estatus.result.data.map((r) => (
        <tr key={r.id}>
            <td>{r.grupo_laboratorio}</td>
            <td>{r.asignatura}</td>
            <td>{r.docente}</td>
            <td>{r.numero_equipos_trabajo}</td>
            <td>{r.fecha_formato}</td>
            <td>{r.nombre_practica}</td>
            <td>{r.objetivo}</td>
            <td>{r.observaciones}</td>            
            <td>{r.archivo_formato}</td>
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
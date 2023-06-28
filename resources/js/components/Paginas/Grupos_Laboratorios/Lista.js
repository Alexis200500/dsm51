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
                    <th>Cuatrimestre</th>
                    <th>Direccion</th>
                    <th>Carrera</th>
                    <th>Asignatura</th>
                    <th>Docente</th>
                    <th>Dias</th>
                    <th>Grupo</th>
                    
                    

                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                    <th>Sabado</th>
                   

                    
                    
                    <th>Estatus</th>
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
            <td>{r.laboratorio}</td>
            <td>{r.cuatrimestre}</td>
            <td>{r.direccion}</td>
            <td>{r.carrera}</td>
            <td>{r.asignatura}</td>
            <td>{r.docente}</td>
            <td>{r.dias_asignados}</td>
            <td>{r.grupo}</td>

            <td>{r.lunes_inicio} a {r.lunes_fin}</td>
            <td>{r.martes_inicio} a {r.martes_fin}</td>
            <td>{r.miercoles_inicio} a {r.miercoles_fin}</td>
            <td>{r.jueves_inicio} a {r.jueves_fin}</td>
            <td>{r.viernes_inicio} a {r.viernes_fin}</td>
            <td>{r.sabado_inicio} a {r.sabado_fin}</td>
          
 
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
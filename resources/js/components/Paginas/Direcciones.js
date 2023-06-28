import React from 'react';
import {Card, Table} from 'react-bootstrap';
import useFetch from '../../hooks/useFetch';

const url = 'http://localhost:8000/api/direcciones';
const opt = {};
const token = '538UzO206268r059e707Ni0IU59e7W2X23eT4ru9T200hs3222b3Y3Jqs21U';

export default function Direcciones(props) {
    const res = useFetch(url, opt, token);
    return (
        <Card>
            <Card.Header>Direcciones</Card.Header>
            <Card.Body>
                <Table striped bordered hover size="sm">
                    <thead>
                        <tr>
                            <th style={{width:'55%'}}>Dirección</th>
                            <th style={{width:'15%'}}>Abreviatura</th>
                            <th style={{width:'15%'}}>Estatus</th>
                            <th style={{width:'15%'}}>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        {renglones(res)}
                    </tbody>
                </Table>
            </Card.Body>
        </Card>
    );
}

function renglones(res) {
    if (res.loading || null == res.result) {
        return <tr><td colSpan="4"><strong>Cargando...</strong></td></tr>
    }
    return res.result.data.map((r) => (
        <tr>
            <td>{r.direccion}</td>
            <td>{r.abreviatura}</td>
            <td>{r.estatus}</td>
            <td>&nbsp;</td>
        </tr>
    ));
}
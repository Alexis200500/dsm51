import React, {useState, useEffect} from 'react';
import {Form, Row, Col, Button, Table, FormControl, InputGroup} from 'react-bootstrap';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSave } from '@fortawesome/free-solid-svg-icons';



export default function Formulario(props) {
    const [formulario, setFormulario] = useState(props.formulario);

    useEffect(() => {
        setFormulario(props.formulario);
    }, [props.formulario]);

    function handleChange(event) {
        const {name, value} = event.target;
        setFormulario({...formulario, ...{[name]: value}});
    }

    function handleSubmit(event) {
        event.preventDefault();
        props.handleSubmit(formulario);
    }

    return (
        <Form onSubmit={handleSubmit}>
            <Form.Group as={Row} controlId="grupo_laboratorio_id">
                <Form.Label column sm="2">
                    Grupo Laboratorio
                </Form.Label>
                <Col sm="10">
                <Form.Control as="select" name="grupo_laboratorio_id" required value={formulario.grupo_laboratorio_id} onChange={handleChange}>
                    <option value="1">Laboratorio 1</option>
                </Form.Control>
                </Col>
            </Form.Group>

            <Form.Group as={Row} controlId="asignatura_id">
                <Form.Label column sm="2">
                    Asignatura 
                </Form.Label>
                <Col sm="10">
                <Form.Control as="select" name="asignatura_id" required value={formulario.asignatura_id} onChange={handleChange}>
                    <option value="1">2020 01-04 (Enero - Abril)</option>
                </Form.Control>
                </Col>
            </Form.Group>

            <Form.Group as={Row} controlId="docente_id">
                <Form.Label column sm="2">
                    Docente
                </Form.Label>
                <Col sm="10">
                <Form.Control as="select" name="docente_id" required value={formulario.docente_id} onChange={handleChange}>
                    <option value="1">Cruz Rosales</option>
                </Form.Control>
                </Col>
            </Form.Group>

            <Form.Group as={Row} controlId="numero_equipos_trabajo">
                <Form.Label column sm="2">
                    Equipos
                </Form.Label>
                <Col sm="10">
                    <Form.Control type="text" name="numero_equipos_trabajo" required value={formulario.numero_equipos_trabajo} onChange={handleChange} placeholder="No. Equipos" />
                </Col>
            </Form.Group>

            <Form.Group as={Row} controlId="fecha_formato">
                <Form.Label column sm="2">
                    Fecha Inicio
                </Form.Label>
                <Col sm="10">
                    <Form.Control type="text" name="fecha_formato" required value={formulario.fecha_formato} onChange={handleChange} placeholder="Fecha" />
                </Col>
            </Form.Group>


            

            <Form.Group as={Row} controlId="nombre_practica">
                <Form.Label column sm="2">
                    Practica
                </Form.Label>
                <Col sm="10">
                    <Form.Control type="text" name="nombre_practica" required value={formulario.nombre_practica} onChange={handleChange} placeholder="Practica" />
                </Col>
            </Form.Group>

            <Form.Group as={Row} controlId="objetivo">
                <Form.Label column sm="2">
                    Objetivo
                </Form.Label>
                <Col sm="10">
                <Form.Control as="textarea" name="objetivo" required value={formulario.objetivo} onChange={handleChange}>
                </Form.Control>
                </Col>
            </Form.Group>

            <Form.Group as={Row} controlId="observaciones">
                <Form.Label column sm="2">
                    Observaciones
                </Form.Label>
                <Col sm="10">
                <Form.Control as="textarea" name="observaciones" required value={formulario.observaciones} onChange={handleChange}>
                </Form.Control>
                </Col>
            </Form.Group>
            
            <Form.Group as={Row}>
                <Col sm={{ span: 10, offset: 2 }}>
                    <Button type="submit">
                        <FontAwesomeIcon icon={faSave} />
                        guardar
                    </Button>
                </Col>
            </Form.Group>
        </Form>
        
    );
}
import React, {useState, useEffect} from 'react';
import {Form, Row, Col, Button} from 'react-bootstrap';
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
            <Form.Group as={Row} controlId="cuatrimestre">
                <Form.Label column sm="2">
                    Cuatrimestre
                </Form.Label>
                <Col sm="10">
                    <Form.Control type="text" name="cuatrimestre" required value={formulario.cuatrimestre} onChange={handleChange} placeholder="Cuatrimestre" />
                </Col>
            </Form.Group>
            <Form.Group as={Row} controlId="fecha_inicio">
                <Form.Label column sm="2">
                    Fecha Inicio
                </Form.Label>
                <Col sm="10">
                    <Form.Control type="text" name="fecha_inicio" required value={formulario.fecha_inicio} onChange={handleChange} placeholder="Fecha de Inicio" />
                </Col>
            </Form.Group>
            <Form.Group as={Row} controlId="fecha_termino">
                <Form.Label column sm="2">
                    Fecha Termino
                </Form.Label>
                <Col sm="10">
                    <Form.Control type="text" name="fecha_termino" required value={formulario.fecha_termino} onChange={handleChange} placeholder="Fecha de Termino" />
                </Col>
            </Form.Group>
            <Form.Group as={Row} controlId="estatus">
                <Form.Label column sm="2">
                    Estatus
                </Form.Label>
                <Col sm="10">
                    <Form.Check
                        type="radio"
                        label="Activo"
                        value="Activo"
                        name="estatus"
                        id="EstatusActivo"
                        checked={'Activo' == formulario.estatus}
                        onChange={handleChange}
                    />
                    <Form.Check
                        type="radio"
                        label="Inactivo"
                        value="Inactivo"
                        name="estatus"
                        id="EstatusInactivo"
                        checked={'Inactivo' == formulario.estatus}
                        onChange={handleChange}
                    />
                </Col>
            </Form.Group>
            <Form.Group as={Row}>
                <Col sm={{ span: 10, offset: 2 }}>
                    <Button type="submit">
                        <FontAwesomeIcon icon={faSave} />
                        Guardar
                    </Button>
                </Col>
            </Form.Group>
        </Form>
    );
}
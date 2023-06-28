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
            <Form.Group as={Row} controlId="laboratorio">
                <Form.Label column sm="2">
                    Laboratorio
                </Form.Label>
                <Col sm="10">
                    <Form.Control type="text" name="laboratorio" required value={formulario.laboratorio} onChange={handleChange} placeholder="Laboratorio" />
                </Col>
            </Form.Group>
            <Form.Group as={Row} controlId="abreviatura">
                <Form.Label column sm="2">
                    Abreviatura
                </Form.Label>
                <Col sm="10">
                    <Form.Control type="text" name="abreviatura" required value={formulario.abreviatura} onChange={handleChange} placeholder="Abreviatura" />
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
                        guardar
                    </Button>
                </Col>
            </Form.Group>
        </Form>
    );
}
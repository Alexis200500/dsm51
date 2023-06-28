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
            <Form.Group as={Row} controlId="direccion_id">
                <Form.Label column sm="2">
                    Dirección
                </Form.Label>
                <Col sm="10">
                <Form.Control as="select" name="direccion_id" required value={formulario.direccion_id} onChange={handleChange}>
                    <option value="1">Tecnologías de la Información y Comunicación</option>
                    <option value="2">Mantenimiento Industrial</option>
                    <option value="3">Mecatronica</option>
                    <option value="4">Innovación de Negocios y Mercadotecnia</option>
                </Form.Control>
                </Col>
            </Form.Group>
            <Form.Group as={Row} controlId="carrera">
                <Form.Label column sm="2">
                    Carrera
                </Form.Label>
                <Col sm="10">
                    <Form.Control type="text" name="carrera" required value={formulario.carrera} onChange={handleChange} placeholder="Carrera" />
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
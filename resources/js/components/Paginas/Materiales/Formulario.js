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
            <Form.Group as={Row} controlId="unidad_medida_id">
                <Form.Label column sm="2">
                    Unidad de medida
                </Form.Label>
                <Col sm="10">
                <Form.Control as="select" name="unidad_medida_id" required value={formulario.unidad_medida_id} onChange={handleChange}>
                    <option value="1">Equipo cómputo</option>
                    <option value="2">Software</option>
                    <option value="3">Mililitro</option>
                </Form.Control>
                </Col>
            </Form.Group>
            <Form.Group as={Row} controlId="material">
                <Form.Label column sm="2">
                    Material
                </Form.Label>
                <Col sm="10">
                    <Form.Control type="text" name="material" required value={formulario.material} onChange={handleChange} placeholder="Material" />
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

 
            <Form.Group as={Row} controlId="tipo">
                <Form.Label column sm="2">
                    Tipo
                </Form.Label>
                <Col sm="10">
                    <Form.Check
                        type="radio"
                        label="Equipo"
                        value="Equipo"
                        name="tipo"
                        id="TipoEquipo"
                        checked={'Equipo' == formulario.tipo}
                        onChange={handleChange}
                    />
                    <Form.Check
                        type="radio"
                        label="Material"
                        value="Material"
                        name="tipo"
                        id="TipoMaterial"
                        checked={'Material' == formulario.tipo}
                        onChange={handleChange}
                    />
                    <Form.Check
                        type="radio"
                        label="Reactivo"
                        value="Reactivo"
                        name="tipo"
                        id="TipoReactivo"
                        checked={'Reactivo' == formulario.tipo}
                        onChange={handleChange}
                    />
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
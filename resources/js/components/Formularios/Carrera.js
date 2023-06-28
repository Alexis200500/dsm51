import React, { useState } from 'react';

import { Form, Button } from 'react-bootstrap';

export default function Carrera(props) {
    const [validated, setValidated] = useState(false);

    const handleSubmit = event => {
        const form = event.currentTarget;
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }

        setValidated(true);
    };

    return (
        <Form noValidate validated={validated} onSubmit={handleSubmit}>
            <Form.Group controlId="direccion">
                <Form.Label>Dirección</Form.Label>
                <Form.Control as="select">
                    <option value="1">Tecnologías de la Información y Comunicación</option>
                </Form.Control>
                <Form.Text className="text-muted">
                    Selecciona la dirección a la que pertenece la carrera
                </Form.Text>
            </Form.Group>
            <Form.Group controlId="carrera">
                <Form.Label>Carrera</Form.Label>
                <Form.Control required type="text" placeholder="Ingresa el nombre completo de la carrera" />
                <Form.Text className="text-muted">
                    Por ejemplo: Desarrollo de Software Multiplataforma
                </Form.Text>
            </Form.Group>
            <Form.Group controlId="abreviatura">
                <Form.Label>Abreviatura de la carrera</Form.Label>
                <Form.Control required type="text" placeholder="Ingresa la abreviatura de la carrera" />
                <Form.Text className="text-muted">
                    Por ejemplo: DSM.
                </Form.Text>
            </Form.Group>
            <div key={`inline-radio`} className="mb-3">
                <Form.Check name="activo" value="Activo" inline label="Activo" type="radio" id="activo" />
                <Form.Check name="activo" value="Inactivo" inline label="Inactivo" type="radio" id="Inactivo" />
            </div>
            <Button variant="primary" type="submit">
                enviar
            </Button>
        </Form>
    );
}
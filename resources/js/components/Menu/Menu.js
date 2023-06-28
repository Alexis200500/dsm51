import React from 'react';
import { Navbar, Nav, NavDropdown, Form, Button, FormControl } from 'react-bootstrap';

export default function Menu(props) {
    return (
        <Navbar bg="light" expand="lg">
            <Navbar.Brand href="#home">UTVT</Navbar.Brand>
            <Navbar.Toggle aria-controls="basic-navbar-nav" />
            <Navbar.Collapse id="basic-navbar-nav">
                <Nav className="mr-auto">
                <Nav.Link href="#home">Inicio</Nav.Link>
                <NavDropdown title="Catálogos" id="basic-nav-dropdown">
                    <NavDropdown.Item href="/direcciones">Direcciones</NavDropdown.Item>
                    <NavDropdown.Item href="/carreras">Carreras</NavDropdown.Item>
                    <NavDropdown.Item href="/asignaturas">Asignaturas</NavDropdown.Item>
                    <NavDropdown.Item href="/laboratorios">Laboratorios</NavDropdown.Item>
                    <NavDropdown.Item href="/cuatrimestres">Cuatrimestres</NavDropdown.Item>
                    <NavDropdown.Item href="/unidades_medidas">Unidades de Medida</NavDropdown.Item>
                    <NavDropdown.Item href="/dias_feriados">Dias Feriados</NavDropdown.Item>
                    <NavDropdown.Item href="/materiales">Materiales</NavDropdown.Item>
                    <NavDropdown.Item href="/grupos_laboratorios">Grupos Laboratorios</NavDropdown.Item>
                    <NavDropdown.Item href="/formatos_laboratorios">Formatos Laboratorios</NavDropdown.Item>
                    
                </NavDropdown>
                </Nav>
                <Form inline>
                <FormControl type="text" placeholder="buscar" className="mr-sm-2" />
                <Button variant="outline-success">buscar</Button>
                </Form>
            </Navbar.Collapse>
        </Navbar>
    );
}
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

    function clicDia(event) {
        var dias_asignados = [];
        ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'].forEach((dia) =>{
            var chk = document.getElementById(dia);
            if (null != chk && chk.checked){
                dias_asignados.push(dia);
            }
        });
        setFormulario({...formulario, ...{['dias_asignados']: dias_asignados}});
    }

    return (
        <Form onSubmit={handleSubmit}>
            <Form.Group as={Row} controlId="laboratorio_id">
                <Form.Label column sm="2">
                    Laboratorio
                </Form.Label>
                <Col sm="10">
                <Form.Control as="select" name="laboratorio_id" required value={formulario.laboratorio_id} onChange={handleChange}>
                    <option value="1">Laboratorio 1</option>
                    <option value="2">Laboratorio de Cisco</option>
                    <option value="3">Laboratorio 3</option>    
                </Form.Control>
                </Col>
            </Form.Group>

            <Form.Group as={Row} controlId="cuatrimestre_id">
                <Form.Label column sm="2">
                    Cuatrimestre
                </Form.Label>
                <Col sm="10">
                <Form.Control as="select" name="cuatrimestre_id" required value={formulario.cuatrimestre_id} onChange={handleChange}>
                    <option value="1">2020 01-04 (Enero - Abril)</option>
                </Form.Control>
                </Col>
            </Form.Group>

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

            <Form.Group as={Row} controlId="carrera_id">
                <Form.Label column sm="2">
                    Carrera
                </Form.Label>
                <Col sm="10">
                <Form.Control as="select" name="carrera_id" required value={formulario.carrera_id} onChange={handleChange}>
                    <option value="1">Desarrollo de Software Multiplataforma</option>
                    <option value="2">Infraestructura de Redes Digitales</option>
                    <option value="3">Mecatrónica Área Sistema de Manufactura Flexible</option>
                    <option value="4">Desarrollo de Negocios, Área Mercadotecnia</option>
                </Form.Control>
                </Col>
            </Form.Group>

            <Form.Group as={Row} controlId="asignatura_id">
                <Form.Label column sm="2">
                    Asignatura
                </Form.Label>
                <Col sm="10">
                <Form.Control as="select" name="asignatura_id" required value={formulario.asignatura_id} onChange={handleChange}>
                    <option value="1">Calculo Diferencial</option>
                    <option value="2">Álgebra Lineal</option>
                    <option value="3">Interconexión de Redes</option>
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

            <Form.Group as={Row} controlId="grupo">
                <Form.Label column sm="2">
                    Grupo
                </Form.Label>
                <Col sm="10">
                    <Form.Control type="text" name="grupo" required value={formulario.grupo} onChange={handleChange} placeholder="Grupo" />
                </Col>
            </Form.Group>

            <Table striped bordered hover>
  <thead>
    <tr>
      <th>Dia</th>
      <th>Hora de Entrada</th>
      <th>Hora de Salida</th>
    </tr>
  </thead>
  <tbody>
{/* LUNES */}
        <tr>
            <td>
                <div className="form-group form-check">
                    <input type="checkbox" className="form-check-input" id="Lunes" defaultChecked={formulario.dias_asignados.includes('Lunes')} onClick={clicDia} />
                    <label className="form-check-label" htmlFor="Lunes">LUNES</label>
                </div>
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="lunes_inicio"
                    value={formulario.lunes_inicio || '07:00:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Lunes')}
                    className="form-control form-control-sm" 
                />
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="lunes_fin"
                    value={formulario.lunes_fin || '08:40:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Lunes')}
                    className="form-control form-control-sm" 
                />
            </td>
        </tr>

{/* MARTES */}

<tr>
            <td>
                <div className="form-group form-check">
                    <input type="checkbox" className="form-check-input" id="Martes" defaultChecked={formulario.dias_asignados.includes('Martes')} onClick={clicDia} />
                    <label className="form-check-label" htmlFor="Martes">MARTES</label>
                </div>
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="martes_inicio"
                    value={formulario.martes_inicio || '07:00:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Martes')}
                    className="form-control form-control-sm" 
                />
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="martes_fin"
                    value={formulario.martes_fin || '08:40:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Martes')}
                    className="form-control form-control-sm" 
                />
            </td>
        </tr>

{/* MIRCOLES */}

<tr>
            <td>
                <div className="form-group form-check">
                    <input type="checkbox" className="form-check-input" id="Miércoles" defaultChecked={formulario.dias_asignados.includes('Miércoles')} onClick={clicDia} />
                    <label className="form-check-label" htmlFor="Miércoles">MIÉRCOLES</label>
                </div>
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="miercoles_inicio"
                    value={formulario.miercoles_inicio || '07:00:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Miércoles')}
                    className="form-control form-control-sm" 
                />
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="miercoles_fin"
                    value={formulario.miercoles_fin || '08:40:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Miércoles')}
                    className="form-control form-control-sm" 
                />
            </td>
        </tr>

{/* JUEVES */}

<tr>
            <td>
                <div className="form-group form-check">
                    <input type="checkbox" className="form-check-input" id="Jueves" defaultChecked={formulario.dias_asignados.includes('Jueves')} onClick={clicDia} />
                    <label className="form-check-label" htmlFor="Jueves">JUEVES</label>
                </div>
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="jueves_inicio"
                    value={formulario.jueves_inicio || '07:00:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Jueves')}
                    className="form-control form-control-sm" 
                />
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="jueves_fin"
                    value={formulario.jueves_fin || '08:40:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Jueves')}
                    className="form-control form-control-sm" 
                />
            </td>
        </tr>

{/* VIERNES */}

<tr>
            <td>
                <div className="form-group form-check">
                    <input type="checkbox" className="form-check-input" id="Viernes" defaultChecked={formulario.dias_asignados.includes('Viernes')} onClick={clicDia} />
                    <label className="form-check-label" htmlFor="Viernes">VIERNES</label>
                </div>
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="viernes_inicio"
                    value={formulario.viernes_inicio || '07:00:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Viernes')}
                    className="form-control form-control-sm" 
                />
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="viernes_fin"
                    value={formulario.viernes_fin || '08:40:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Viernes')}
                    className="form-control form-control-sm" 
                />
            </td>
        </tr>

{/* SABADO */}

<tr>
            <td>
                <div className="form-group form-check">
                    <input type="checkbox" className="form-check-input" id="Sábado" defaultChecked={formulario.dias_asignados.includes('Sábado')} onClick={clicDia} />
                    <label className="form-check-label" htmlFor="Sábado">SÁBADO</label>
                </div>
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="sabado_inicio"
                    value={formulario.sabado_inicio || '07:00:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Sábado')}
                    className="form-control form-control-sm" 
                />
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="sabado_fin"
                    value={formulario.sabado_fin || '08:40:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Sábado')}
                    className="form-control form-control-sm" 
                />
            </td>
        </tr>

{/* DOMINGO */}
<tr>
            <td>
                <div className="form-group form-check">
                    <input type="checkbox" className="form-check-input" id="Domingo" defaultChecked={formulario.dias_asignados.includes('Domingo')} onClick={clicDia} />
                    <label className="form-check-label" htmlFor="Domingo">Domingo</label>
                </div>
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="domingo_inicio"
                    value={formulario.domingo_inicio || '07:00:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Domingo')}
                    className="form-control form-control-sm" 
                />
            </td>
            <td>
                <Form.Control
                    type="time"
                    name="domingo_fin"
                    value={formulario.domingo_fin || '08:40:00'}
                    onChange={handleChange}
                    min="07:00"
                    max="21:00"
                    disabled={!formulario.dias_asignados.includes('Domingo')}
                    className="form-control form-control-sm" 
                />
            </td>
        </tr>

  </tbody>
</Table>




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
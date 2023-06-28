import React from 'react';

import { Formik } from 'formik';
import * as yup from 'yup';
import {Form, Field, InputGroup, Button} from 'react-bootstrap';

export default function Validacion(props) {

    const LON_MATRICULA = 9;

    var hoy = new Date();
    var hace = new Date();
    hace.setFullYear(hoy.getFullYear() - 5);

    const schema = yup.object({

        matricula: yup
        .string()
        .length(LON_MATRICULA, `Debe tener una longitud de ${LON_MATRICULA} caracteres`)
        .matches(/^[1-9]{2}[0-9]{7}$/, 'Formato de matrícula no válido')
        .required('Campo requerido'),

        fecha_nacimiento: yup
        .date()
        .min(hace, 'Debes tener máximo 5 años')
        .max(hoy, 'Fecha no puede ser posterior a la fecha actual'),


        firstName: yup.string().required(),
        lastName: yup.string().required(),
        username: yup.string().required(),
        city: yup.string().required(),
        state: yup.string().required(),
        zip: yup.string().required(),
        terms: yup.bool().required(),
    });

    return (
        <Formik
          validationSchema={schema}
          onSubmit={console.log}
          initialValues={{
            firstName: 'Mark',
            lastName: 'Otto',
          }}
        >
          {({
            handleSubmit,
            handleChange,
            handleBlur,
            values,
            touched,
            isValid,
            errors,
          }) => (
            <Form noValidate onSubmit={handleSubmit}>


            <Form.Group controlId="validationFormik">
                <Form.Label>Matrícula</Form.Label>
                <Form.Control
                    type="text"
                    placeholder="Matrícula"
                    name="matricula"
                    value={values.matricula}
                    onChange={handleChange}
                    isInvalid={!!errors.matricula}
                />
    
                <Form.Control.Feedback type="invalid">
                    {errors.matricula}
                </Form.Control.Feedback>
            </Form.Group>
            
            <Form.Group controlId="validationFormik2">
                <Form.Label>Fecha de nacimiento</Form.Label>
                <Form.Control
                    type="date"
                    placeholder="Fecha de nacimiento"
                    name="fecha_nacimiento"
                    value={values.fecha_nacimiento}
                    onChange={handleChange}
                    isInvalid={!!errors.fecha_nacimiento}
                />
    
                <Form.Control.Feedback type="invalid">
                    {errors.fecha_nacimiento}
                </Form.Control.Feedback>
            </Form.Group>

              <Form.Row>
                <Form.Group md="4" controlId="validationFormik01">
                  <Form.Label>First name</Form.Label>
                  <Form.Control
                    type="text"
                    name="firstName"
                    value={values.firstName}
                    onChange={handleChange}
                    isValid={touched.firstName && !errors.firstName}
                  />
                  <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>
                <Form.Group md="4" controlId="validationFormik02">
                  <Form.Label>Last name</Form.Label>
                  <Form.Control
                    type="text"
                    name="lastName"
                    value={values.lastName}
                    onChange={handleChange}
                    isValid={touched.lastName && !errors.lastName}
                  />
    
                  <Form.Control.Feedback>Looks good!</Form.Control.Feedback>
                </Form.Group>
                <Form.Group md="4" controlId="validationFormikUsername">
                  <Form.Label>Username</Form.Label>
                  <InputGroup>
                    <InputGroup.Prepend>
                      <InputGroup.Text id="inputGroupPrepend">@</InputGroup.Text>
                    </InputGroup.Prepend>
                    <Form.Control
                      type="text"
                      placeholder="Username"
                      aria-describedby="inputGroupPrepend"
                      name="username"
                      value={values.username}
                      onChange={handleChange}
                      isInvalid={!!errors.username}
                    />
                    <Form.Control.Feedback type="invalid">
                      {errors.username}
                    </Form.Control.Feedback>
                  </InputGroup>
                </Form.Group>
              </Form.Row>
              <Form.Row>
                <Form.Group md="6" controlId="validationFormik03">
                  <Form.Label>City</Form.Label>
                  <Form.Control
                    type="text"
                    placeholder="City"
                    name="city"
                    value={values.city}
                    onChange={handleChange}
                    isInvalid={!!errors.city}
                  />
    
                  <Form.Control.Feedback type="invalid">
                    {errors.city}
                  </Form.Control.Feedback>
                </Form.Group>
                <Form.Group md="3" controlId="validationFormik04">
                  <Form.Label>State</Form.Label>
                  <Form.Control
                    type="text"
                    placeholder="State"
                    name="state"
                    value={values.state}
                    onChange={handleChange}
                    isInvalid={!!errors.state}
                  />
                  <Form.Control.Feedback type="invalid">
                    {errors.state}
                  </Form.Control.Feedback>
                </Form.Group>
                <Form.Group md="3" controlId="validationFormik05">
                  <Form.Label>Zip</Form.Label>
                  <Form.Control
                    type="text"
                    placeholder="Zip"
                    name="zip"
                    value={values.zip}
                    onChange={handleChange}
                    isInvalid={!!errors.zip}
                  />
    
                  <Form.Control.Feedback type="invalid">
                    {errors.zip}
                  </Form.Control.Feedback>
                </Form.Group>
              </Form.Row>
              <Form.Group>
                <Form.Check
                  required
                  name="terms"
                  label="Agree to terms and conditions"
                  onChange={handleChange}
                  isInvalid={!!errors.terms}
                  feedback={errors.terms}
                  id="validationFormik0"
                />
              </Form.Group>
              <Button type="submit">Submit form</Button>
            </Form>
          )}
        </Formik>
    );
}
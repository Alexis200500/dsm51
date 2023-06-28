import React, {useState} from 'react';
import { Form, Button } from 'react-bootstrap';
import useFetch from '../../hooks/useFetch';

const opt = {};
const token = '538UzO206268r059e707Ni0IU59e7W2X23eT4ru9T200hs3222b3Y3Jqs21U';

export default function Direccion({url, id = 0}) {
    const [renderizado, setRenderizado] = useState(false);

    const [formulario, setFormulario] = useState({
        direccion: ''
        , abreviatura: ''
        , estatus: ''
    });

    if (0 != id) {
        const res = useFetch(url, opt, token);
        if (!res.loading && null != res.result && !renderizado) {
            setRenderizado(true);
            setFormulario({
                direccion: res.result.data.direccion
                , abreviatura: res.result.data.abreviatura
                , estatus: res.result.data.estatus
            });
        }
    }

    function handleChange(event) {
        const {name, value} = event.target;
        setFormulario({[name]: value});
    }

    const formToJSON = elements => [].reduce.call(elements, (data, element) => {
        data[element.name] = element.value;
        return data;
    }, {});

    function handleSubmit(event) {
        event.preventDefault();
        const data = formToJSON(event.target.elements);
        // console.log(JSON.stringify(data));
        // const cu = useFetch('http://localhost:8000/api/direcciones/1', {body:JSON.stringify(data)}, token, 'POST');
        (async () => {
            try {
                const method = 'PUT';
                const res = await fetch('http://localhost:8000/api/direcciones/1', {
                    method: method
                    , credentials: 'include'
                    , mode: 'cors'
                    , body: JSON.stringify(data)
                    , headers: new Headers({
                        'Authorization': `Bearer ${token}`
                        , 'Accept': 'application/json'
                        , 'Content-Type': 'application/json; charset=UTF-8'
                        , 'Access-Control-Allow-Credentials':true
                        , 'Access-Control-Request-Method': method
                        , 'Access-Control-Request-Headers':'Authorization'
                    })
                });
                const json = await res.json();
                console.log(json);
            } catch(err) {
            }
        })()
    }

    return (
        <Form onSubmit={handleSubmit}>
            <Form.Group controlId="direccion">
                <Form.Label>Dirección</Form.Label>
                <Form.Control type="text" name="direccion" value={formulario.direccion} onChange={handleChange} placeholder="Ingresa el nombre completo de la dirección" />
                <Form.Text className="text-muted">
                    Por ejemplo: Tecnologías de la Información y Comunicación.
                </Form.Text>
            </Form.Group>
            <Form.Group controlId="abreviatura">
                <Form.Label>Abreviatura de la dirección</Form.Label>
                <Form.Control type="text" name="abreviatura" value={formulario.abreviatura} onChange={handleChange} placeholder="Ingresa la abreviatura de la dirección" />
                <Form.Text className="text-muted">
                    Por ejemplo: TIC.
                </Form.Text>
            </Form.Group>
            <div key={`inline-radio`} className="mb-3">
                <Form.Check name="estatus" value="Activo" inline label="Activo" type="radio" id="Activo" checked={'Activo' == formulario.estatus} onChange={handleChange} />
                <Form.Check name="estatus" value="Inactivo" inline label="Inactivo" type="radio" id="Inactivo" checked={'Inactivo' == formulario.estatus} onChange={handleChange} />
            </div>
            <Button variant="primary" type="submit">
                enviar
            </Button>
        </Form>
    );
}
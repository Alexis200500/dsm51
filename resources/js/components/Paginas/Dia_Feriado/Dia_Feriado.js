import React, { useState, useEffect } from 'react';
import { toast } from 'react-toastify';
import Tarjeta from '../Tarjeta';
import ConfirmaEliminacion from '../ConfirmaEliminacion';
import MiModal from '../MiModal';
import Lista from './Lista';
import Formulario from './Formulario';
import useFetch from '../../../hooks/useFetch';
import MensajeError from '../MensajeError';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBuilding } from '@fortawesome/free-solid-svg-icons';
import {API_DIAS_FERIADOS as API_URL, METODO_LISTAR, METODO_CREAR, METODO_EDITAR, METODO_BORRAR, API_TOKEN, CREAR, EDITAR} from '../../Constantes';
const opcionesListar = {};

export default function Dias_Feriados(props) {
    // estados
    const[datosModal, setDatosModal] = useState({mostrar:false});
    const[datosConfirmaEliminacion, setDatosConfirmaEliminacion] = useState({mostrar:false});
    const[accion, setAccion] = useState(null);
    const[formulario, setFormulario] = useState({
         id: '2020-'
        
    });
    const[url_lista, setUrlLista] = useState(API_URL);
    const[url_edicion, setUrlEdicion] = useState(API_URL);
    const[url_borra, setUrlBorra] = useState(API_URL);
    const[id, setId] = useState(0);
    const[opcionesCreacion, setOpcionesCreacion] = useState({body:null});
    const[detonarCreacion, setDetonarCreacion] = useState(false);
    const[opcionesEdicion, setOpcionesEdicion] = useState({body:null});
    const[detonarEdicion, setDetonarEdicion] = useState(false);
    const[opcionesBorrado, setOpcionesBorrado] = useState({body:null});
    const[detonarBorrado, setDetonarBorrado] = useState(false);
    
    const estatusLista = useFetch(url_lista, opcionesListar, API_TOKEN, METODO_LISTAR, true);
    const estatusCrear = useFetch(API_URL, opcionesCreacion, API_TOKEN, METODO_CREAR, detonarCreacion);
    const estatusEditar = useFetch(url_edicion, opcionesEdicion, API_TOKEN, METODO_EDITAR, detonarEdicion);
    const estatusBorrar = useFetch(url_borra, opcionesBorrado, API_TOKEN, METODO_BORRAR, detonarBorrado);

    // efectos
    useEffect(() => {
        //si se encuentra cargando no hacer nada, aún no hay respuesta
        if (estatusCrear.loading)
            return;
        //analizar código de error
        switch(estatusCrear.status) {
            case 201:
                toast.success(<MensajeCreadoEditado titulo="Registro creado" result={estatusCrear.result} />, {autoClose: 2500});
                setDatosModal({mostrar:false});
                setUrlLista(`${API_URL}?time=${(new Date()).getTime()}`);
                setDetonarCreacion(false);
                break;
            default:
                toast.error(<MensajeError result={estatusCrear.result} />, {autoClose: 2500});
        }
    }, [estatusCrear])

    useEffect(() => {
        //si se encuentra cargando no hacer nada, aún no hay respuesta
        if (estatusEditar.loading)
            return;
        //analizar código de error
        switch(estatusEditar.status) {
            case 200:
                toast.success(<MensajeCreadoEditado titulo="Registro actualizado" result={estatusEditar.result} />, {autoClose: 2500});
                setDatosModal({mostrar:false});
                setUrlLista(`${API_URL}?time=${(new Date()).getTime()}`);
                setDetonarEdicion(false);
                break;
            default:
                toast.error(<MensajeError result={estatusEditar.result} />, {autoClose: 2500});
        }
    }, [estatusEditar])
    
    useEffect(() => {
        //si se encuentra cargando no hacer nada, aún no hay respuesta
        if (estatusBorrar.loading)
            return;
        //analizar código de error
        switch(estatusBorrar.status) {
            case 200:
                toast.success(estatusBorrar.result.message, {autoClose: 2500});
                setUrlLista(`${API_URL}?time=${(new Date()).getTime()}`);
                setDetonarBorrado(false);
                break;
            default:
                toast.error(<MensajeError result={estatusBorrar.result} />, {autoClose: 2500});
        }
    }, [estatusBorrar])


    function handleAgrega() {
        setAccion(CREAR);
        setDatosModal({
            mostrar: true
            , titulo: 'Agregar Dia feriado'
        });
    }
    
    function handleEdita(registro) {
        setId(registro.id);
        setAccion(EDITAR);
        setFormulario({
           id: registro.id

        });
        setDatosModal({
            mostrar: true
            , titulo: 'Editar Dia feriado'
        });
    }
    
    function handleBorra(registro) {
        setUrlBorra(`${API_URL}/${registro.id}`);
        setDatosConfirmaEliminacion({
            mostrar: true
            , titulo: 'CONFIRMA'
            , body: '¿Realmente deseas eliminar el elemento?'
        });
    }

    function handleSubmit(formulario) {
        switch(accion) {
            case CREAR:
                toast.info('Enviando datos (creación)...', {autoClose: 1500});
                setDetonarCreacion(true);
                setOpcionesCreacion({body:JSON.stringify(formulario)});
                break;
            case EDITAR:
                toast.info('Enviando datos (edición)...', {autoClose: 1500});
                setUrlEdicion(`${API_URL}/${id}`)
                setDetonarEdicion(true);
                setOpcionesEdicion({body:JSON.stringify(formulario)});
                break;
            default:
        }
    }

    function handleConfirmaEliminacion() {
        setDatosConfirmaEliminacion({mostrar:false});
        setDetonarBorrado(true);
        setOpcionesBorrado({body:null});
    }

    return (
        <Tarjeta titulo={<><FontAwesomeIcon icon={faBuilding} />Dias Feriados</>}>
            <ConfirmaEliminacion datos={datosConfirmaEliminacion} handleConfirmaEliminacion={handleConfirmaEliminacion} />
            <MiModal datos={datosModal}>
                <Formulario formulario={formulario} handleSubmit={handleSubmit} />
            </MiModal>
            <Lista handleAgrega={handleAgrega} handleEdita={handleEdita} handleBorra={handleBorra} estatus={estatusLista} />
        </Tarjeta>
    );
}

function MensajeCreadoEditado(props) {
    const {data:{ id }} = props.result;
    return (
        <>
            <div>
                <strong>{props.titulo}</strong>
            </div>
            <div>
                [{id}]
            </div>
        </>
    );
}
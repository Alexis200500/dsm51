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
import {API_DETALLES_FORMATOS_LABORATORIOS as API_URL, METODO_LISTAR, METODO_CREAR, METODO_EDITAR, METODO_BORRAR, API_TOKEN, CREAR, EDITAR} from '../../Constantes';
const opcionesListar = {};

export default function Detalles_formatos_laboratorios(props) {
    // estados
    const[datosModal, setDatosModal] = useState({mostrar:false});
    const[datosConfirmaEliminacion, setDatosConfirmaEliminacion] = useState({mostrar:false});
    const[accion, setAccion] = useState(null);
    const[formulario, setFormulario] = useState({
        grupo_laboratorio_id:1
        , asignatura_id:1
        , docente_id:1
            , numero_equipos_trabajo:3
            , fecha_formato:'2020-05-20'
            , nombre_practica:'Cruds'
            , objetivo: 'Lunes'
            , observaciones: 'DSM51'
            , archivo_formato: '3-R-EDU-20.docx'
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
            , titulo: 'Agregar Grupo Laboratorio'
        });
    }
    
    function handleEdita(registro) {
        setId(registro.id);
        setAccion(EDITAR);
        setFormulario({
            grupo_laboratorio_id: registro.grupo_laboratorio_id
            , asignatura_id: registro.asignatura_id
            , docente_id: registro.docente_id

            , numero_equipos_trabajo: registro.numero_equipos_trabajo
            , fecha_formato: registro.fecha_formato
            , nombre_practica: registro.nombre_practica

            , objetivo: registro.objetivo
            , observaciones: registro.observaciones
            , archivo_formato: registro.archivo_formato
        });
        setDatosModal({
            mostrar: true
            , titulo: 'Editar Grupo Laboratorio'
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
        <Tarjeta titulo={<><FontAwesomeIcon icon={faBuilding} />Grupos Laboratorios</>}>
            <ConfirmaEliminacion datos={datosConfirmaEliminacion} handleConfirmaEliminacion={handleConfirmaEliminacion} />
            <MiModal datos={datosModal}>
                <Formulario formulario={formulario} handleSubmit={handleSubmit} />
            </MiModal>
            <Lista handleAgrega={handleAgrega} handleEdita={handleEdita} handleBorra={handleBorra} estatus={estatusLista} />
        </Tarjeta>
    );
}

function MensajeCreadoEditado(props) {
    const {data:{id, unidad_medida, abreviatura}} = props.result;
    return (
        <>
            <div>
                <strong>{props.titulo}</strong>
            </div>
            <div>
                [{id}] {unidad_medida} ({abreviatura}) 
            </div>
        </>
    );
}
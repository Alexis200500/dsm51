import React from 'react';
import ReactDOM from 'react-dom';
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.min.css';
// Para poder manejar las rutas
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom';
import Menu from './Menu/Menu';
// Importamos páginas
import Index from './Paginas/Index';
import Direcciones from './Paginas/Direcciones/Direcciones';
import Carreras from './Paginas/Carreras/Carreras';
import Contacto from './Paginas/Contacto';
import Error404 from './Paginas/Error404';
//asignaturas
import Asignaturas from './Paginas/Asignaturas/Asignaturas';
//laboratorios
import Laboratorios from './Paginas/Laboratorios/Laboratorios';
//Cuatrimestres
import Cuatrimestres from './Paginas/Cuatrimestres/Cuatrimestres';
// unidades de medida
import Unidades_medida from './Paginas/Unidades de medida/Unidades_medida';
//Materiales
import Materiales from './Paginas/Materiales/Materiales';
//dias feriados
import Dias_Feriados from './Paginas/Dia_Feriado/Dia_Feriado';
//grupos_laboratorios
import Grupos_Laboratorios from './Paginas/Grupos_Laboratorios/Grupos_laboratorios';
//Formatos laboratorios
import Formatos_Laboratorios from './Paginas/Formatos_Laboratorios/Formatos_laboratorios';
//detalles
import Detalles_formatos_laboratorios from './Paginas/Detalle_Formatos_Laboratorios/Detalle_Formatos_Laboratorios';




function Aplicacion() {
    return (
        <Router>
            <Menu />
            
            <ToastContainer />
            <div className="container">
                <Switch>
                    <Route path="/" exact={true}>
                        <Index />
                    </Route>
                    <Route path="/direcciones" exact={true}>
                        <Direcciones />
                    </Route>
                    <Route path="/carreras" exact={true}>
                        <Carreras />
                    </Route>
                    <Route path="/asignaturas" exact={true}>
                        <Asignaturas />
                    </Route>
                    <Route path="/laboratorios" exact={true}>
                        <Laboratorios />
                    </Route>
                    <Route path="/cuatrimestres" exact={true}>
                        <Cuatrimestres />
                    </Route>
                    <Route path="/unidades_medidas" exact={true}>
                        <Unidades_medida />
                    </Route>
                    <Route path="/materiales" exact={true}>
                        <Materiales />
                    </Route>
                    <Route path="/dias_feriados" exact={true}>
                        <Dias_Feriados />
                    </Route>

                    <Route path="/grupos_laboratorios" exact={true}>
                        <Grupos_Laboratorios />
                    </Route>

                    <Route path="/formatos_laboratorios" exact={true}>
                        <Formatos_Laboratorios />
                    </Route>

                    <Route path="/detalle_formato_laboratorio" exact={true}>
                        <Detalles_formatos_laboratorios />
                    </Route>


                    <Route path="*">
                        <Error404 />
                    </Route>
                </Switch>
            </div>
        </Router>
    );
}

export default Aplicacion;

if (document.getElementById('root')) {
    ReactDOM.render(<Aplicacion />, document.getElementById('root'));
}

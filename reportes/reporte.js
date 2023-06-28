// console.log(process.argv);
// console.log(__dirname);

const fs = require('fs');
const carbone = require('carbone');
const Sequelize = require('sequelize');

//Option 1: Passing parameters separately
const sequelize = new Sequelize('dsm51','root','', {
    host: '127.0.0.1',
    dialect: 'mysql'
});

sequelize
    .authenticate()
    .then(() => {
        sequelize.query(
            `SELECT 
            fl.nombre_practica
            ,direcciones.direccion
            ,gl.grupo
            ,fl.fecha_formato
            ,asignaturas.asignatura
            ,laboratorios.abreviatura laboratorio_taller
           
            ,grupos_laboratorios.dias_asignados dias

            ,gl.lunes_inicio iniciol
            ,gl.lunes_fin finl
            ,gl.martes_inicio iniciom
            ,gl.martes_fin finm
            ,gl.miercoles_inicio iniciomi
            ,gl.miercoles_fin finmi
            ,gl.jueves_inicio inicioj
            ,gl.jueves_fin finj
            ,gl.viernes_inicio iniciov
            ,gl.viernes_fin finv
            ,gl.sabado_inicio inicio
            ,gl.sabado_fin fin
 

            ,fl.numero_equipos_trabajo
            ,fl.objetivo
            ,fl.observaciones
            ,users.name docente 
            ,fl.archivo_formato
        FROM 
            formatos_laboratorios fl
            INNER JOIN grupos_laboratorios gl ON fl.grupo_laboratorio_id = gl.id
            INNER JOIN direcciones ON gl.direccion_id = direcciones.id
            INNER JOIN asignaturas ON fl.asignatura_id = asignaturas.id
            INNER JOIN laboratorios ON gl.laboratorio_id = laboratorios.id
            INNER JOIN grupos_laboratorios ON fl.grupo_laboratorio_id = grupos_laboratorios.id
            INNER JOIN users ON fl.docente_id = users.id
        WHERE 
            fl.id = :id`
        , {replacements:{id:process.argv[2]}
        , type: sequelize.QueryTypes.SELECT})
    .then(datos => {
        var data = {
            nombre_practica:datos[0].nombre_practica
            , direccion:datos[0].direccion
            , grupo:datos[0].grupo
            , fecha_formato:datos[0].fecha_formato
            , asignatura:datos[0].asignatura
            , laboratorio_taller:datos[0].laboratorio_taller
            
            , dias:datos[0].dias


            , iniciol:datos[0].iniciol
            , finl:datos[0].finl
            , iniciom:datos[0].iniciom
            , finm:datos[0].finm
            , iniciomi:datos[0].iniciomi
            , finmi:datos[0].finmi
            , inicioj:datos[0].inicioj
            , finj:datos[0].finj
            , iniciov:datos[0].iniciov
            , finv:datos[0].finv
            , inicio:datos[0].inicio
            , fin:datos[0].fin


            
            , numero_equipos_trabajo:datos[0].numero_equipos_trabajo
            , objetivo:datos[0].objetivo
            , observaciones:datos[0].observaciones
            , docente:datos[0].docente
        };
        var ruta = __dirname;
        carbone.render(`${ruta}/${datos[0].archivo_formato}`, data, function(err, result){
            if (err) return console.log(err);
            fs.writeFileSync(process.argv[3], result);
        });
    })
})
.catch(err => {
    console.error('Unable to connect to the database:', err);
});
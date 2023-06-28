const fs = require('fs');
const carbone = require('carbone');

var data = {
    alumno: {
        nombre_completo : 'Lorem Ipsum Dolor Sit Amet'
        , correo : 'alumno@utvtol.edu.mx'
    }
    , competencias: [
        {competencia:'Autogestión del aprendizaje', calificacion:10, letra:'DIEZ PUNTO CERO'}
        , {competencia:'Proyección personal y profesional', calificacion:10, letra:'DIEZ PUNTO CERO'}
        , {competencia:'Manejo de espacios y cantidades', calificacion:10, letra:'DIEZ PUNTO CERO'}
        , {competencia:'Comunicación para la interacción social', calificacion:10, letra:'DIEZ PUNTO CERO'}
        , {competencia:'Procesamiento de información por medios digitales', calificacion:10, letra:'DIEZ PUNTO CERO'}
        , {competencia:'Resolución de problemas', calificacion:10, letra:'DIEZ PUNTO CERO'}
        , {competencia:'Desarrollo ciudadano', calificacion:10, letra:'DIEZ PUNTO CERO'}
    ]
};

// const options = {
//     convertTo : 'pdf' //can be docx, txt, ...
// };

carbone.render('./certificado.docx', data,  function(err, result){
    if (err) return console.log(err); 
    fs.writeFileSync('./certificado-llenado.docx', result);
    // process.exit(); // to kill automatically LibreOffice workers
});
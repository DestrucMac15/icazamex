$(document).ready(function(){

    
    $('#form_filtros, #form_filtros2').submit(function(event){

        event.preventDefault();

        let datos = $(this).serializeArray();

        let parametros = eliminarDatos(datos,'');
        
        localStorage.setItem('parametros',JSON.stringify(parametros));

        let para = crearRuta(parametros);

        location.href="http://icazamex.test/web/propiedades?"+para;
        

        
    });
    
    $('.eliminar_filtro').click(function(){

        let nombre = $(this).closest('.chip').data('nombre');
        
        let parametros = JSON.parse(localStorage.getItem('parametros'));

        
        let nuevosParametros = eliminarDatos(parametros,nombre);
        
        localStorage.setItem('parametros',JSON.stringify(nuevosParametros));

        let para = crearRuta(nuevosParametros);

        location.href="http://icazamex.test/web/propiedades?"+para;

    });

});

function eliminarDatos(datos,valor){
    console.log(valor);
    
    datos.forEach(function(dato,index,object){
        
        if(dato.value === valor){
            object.splice(index, 1);
        }
        if(dato.name === valor){
            object.splice(index, 1);
        }
        
        
        
    });
    
    return datos;

}



function crearRuta(parametros){

    let ruta = '';

    $.each(parametros,function(index,element){

        ruta += `${element.name}=${element.value}&`;

    });

    return ruta;

}
function aButtonPressed(){
            
    var fechaInicio = $('#proceso_asignaciones_fechaRecSDA').val();
    var diasRespuesta = $('#proceso_asignaciones_diasrespuesta').val();
                
    $.post( "{{ path('calculoFecha_ajax') }}", {
        fechaRecSDA: fechaInicio,
        diasResponder: diasRespuesta
    },
    function(response) {
        $('#proceso_asignaciones_fechamaxrespuesta').val(response);
    }, "json"
                        
);
}

function alertaUno() {
    var fechaInicio = $('#proceso_asignaciones_fechaRecSDA').val();
    var fechaFin = $('#proceso_asignaciones_fechamaxrespuesta').val();
        
    $.post( "{{ path('alertaUno_ajax') }}", {
        fechaInicio: fechaInicio,
        fechaFin: fechaFin
    },
    function(response) {
        alert('algo')
        //                    $('#proceso_asignaciones_alerta1').val(response);
    }, "json");
}

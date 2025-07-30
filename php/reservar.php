<?php

$cabana_id = isset($_GET['cabaña']) ? (int)$_GET['cabaña'] : 0;
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');

$CONTENIDO = "<div class='container mt-4'>
    <h2 class='mb-3'>Reservar Cabaña</h2>
    <form id='formReserva'>
        <input type='hidden' name='cabaña_id' value='$cabana_id'>
        <div class='mb-3'>
            <label class='form-label'>Nombres</label>
            <input type='text' class='form-control' name='nombres' required>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Apellido</label>
            <input type='text' class='form-control' name='apellido' required>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Fono</label>
            <input type='text' class='form-control' name='fono' required>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Email</label>
            <input type='email' class='form-control' name='email' required>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Número de personas</label>
            <input type='number' class='form-control' name='num_personas' required>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Observaciones</label>
            <textarea class='form-control' name='observaciones'></textarea>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Fecha Ingreso</label>
            <input type='date' class='form-control' name='fecha_ingreso' value='$fecha' required>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Fecha Salida</label>
            <input type='date' class='form-control' name='fecha_salida' required>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Pagado</label>
            <div>
                <input type='radio' name='pagado' value='1' required> Sí
                <input type='radio' name='pagado' value='0' required> No
            </div>
        </div>
        <button type='submit' class='btn btn-primary'>Reservar</button>
    </form>
    <div id='mensaje' class='mt-3'></div>
</div>";

$JQUERY = "
	$('#formReserva').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url: 'procesar_reserva.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                $('#mensaje').html('<div class=\"alert alert-success\">'+response+'</div>');
                $('#formReserva')[0].reset();
            },
            error: function(){
                $('#mensaje').html('<div class=\"alert alert-danger\">Error al procesar la reserva.</div>');
            }
        });
    });
";


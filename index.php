<?php

require 'inc/connect.inc.php'; // Archivo con la conexión a la base de datos

switch ($_GET['op']){
	case 10:
		require 'php/reservar.php';
		break;
	default:
		require 'php/calendario.php';
		break;

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas de Cabañas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>	
	<?=$JS?>

	$(document).ready(function(){
		<?=$JQUERY?>
	});


	</script>
    <style>
        .reservado { background-color: blue; color: white; }
        .disponible { background-color: green; color: white; }
    </style>
</head>
<body>
    <?=$CONTENIDO?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

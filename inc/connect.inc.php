<?php

///DATOS CONEXION SISTEMA
$USER_SISTEMA     = "root";
$PASS_SISTEMA     = "";
$SERVIDOR_SISTEMA = "localhost";
$BASE_SISTEMA     = "reservas";


	$conn = new mysqli($SERVIDOR_SISTEMA, $USER_SISTEMA, $PASS_SISTEMA, $BASE_SISTEMA);

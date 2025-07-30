<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cabaña_id = isset($_POST['cabaña_id']) ? (int)$_POST['cabaña_id'] : 0;
    $nombres = $_POST['nombres'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $fono = $_POST['fono'] ?? '';
    $email = $_POST['email'] ?? '';
    $num_personas = isset($_POST['num_personas']) ? (int)$_POST['num_personas'] : 0;
    $observaciones = $_POST['observaciones'] ?? '';
    $fecha_ingreso = $_POST['fecha_ingreso'] ?? '';
    $fecha_salida = $_POST['fecha_salida'] ?? '';
    $pagado = isset($_POST['pagado']) ? (int)$_POST['pagado'] : 0;
    
    if ($cabaña_id > 0 && $nombres && $apellido && $fono && $email && $num_personas > 0 && $fecha_ingreso && $fecha_salida) {
        $stmt = $conn->prepare("INSERT INTO reservas (cabaña_id, nombres, apellido, fono, email, num_personas, observaciones, fecha_ingreso, fecha_salida, pagado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssisssi", $cabaña_id, $nombres, $apellido, $fono, $email, $num_personas, $observaciones, $fecha_ingreso, $fecha_salida, $pagado);
        
        if ($stmt->execute()) {
            echo "Reserva guardada con éxito.";
        } else {
            echo "Error al guardar la reserva.";
        }
        $stmt->close();
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>

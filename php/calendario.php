<?php

// Obtener mes y año actual o seleccionado
$mes_actual = isset($_GET['mes']) ? (int)$_GET['mes'] : date('m');
$anio_actual = isset($_GET['anio']) ? (int)$_GET['anio'] : date('Y');
$dias_mes = cal_days_in_month(CAL_GREGORIAN, $mes_actual, $anio_actual);

// Obtener unidads
$sql = "SELECT id, nombre FROM unidad ORDER BY id";
$result_unidad = $conn->query($sql);

// Obtener reservas
$sql = "SELECT * FROM reserva WHERE MONTH(fecha_inicio) = $mes_actual AND YEAR(fecha_inicio) = $anio_actual";
$result_reservas = $conn->query($sql);

$reservas = [];
while ($reserva = $result_reservas->fetch_assoc()) {
    $reservas[$reserva['id_unidad']][] = [
        'inicio' => $reserva['fecha_inicio'],
        'fin' => $reserva['fecha_fin']
    ];
}

$CONTENIDO = "<div class='container mt-4'>
    <h2 class='mb-3'>Calendario de Reservas</h2>
    <div class='d-flex justify-content-between mb-3'>
        <a href='?mes=" . ($mes_actual - 1) . "&anio=$anio_actual' class='btn btn-primary'>&laquo; Mes Anterior</a>
        <h3>" . date('F Y', strtotime("$anio_actual-$mes_actual-01")) . "</h3>
        <a href='?mes=" . ($mes_actual + 1) . "&anio=$anio_actual' class='btn btn-primary'>Mes Siguiente &raquo;</a>
    </div>
    <table class='table table-bordered text-center'>
        <thead>
            <tr>
                <th>Cabaña</th>";

for ($dia = 1; $dia <= $dias_mes; $dia++) {
    $CONTENIDO .= "<th>$dia</th>";
}

$CONTENIDO .= "</tr>
        </thead>
        <tbody>";

//while ($unidad = $result_unidad->fetch_assoc()) {
while (list($idUnidad, $nomUnidad) = $result_unidad->fetch_row()) {
    $CONTENIDO .= "<tr>
        <td>" . utf8_encode($nomUnidad) . "</td>";

    for ($dia = 1; $dia <= $dias_mes; $dia++) {
        $fecha_actual = "$anio_actual-$mes_actual-" . str_pad($dia, 2, '0', STR_PAD_LEFT);
        $estado = 'disponible';

        if (isset($reservas[$idUnidad])) {
			echo "#";
            foreach ($reservas[$id_unidad] as $reserva) {
                if ($fecha_actual >= $reserva['inicio'] && $fecha_actual <= $reserva['fin']) {
                    $estado = 'reservado';
                    break;
                }
            }
        }


        $CONTENIDO .= "<td class='$estado'><a href='?op=10&id=" . $idUnidad . "&fecha=$fecha_actual' class='text-white'>&#10004;</a></td>";
    }
    $CONTENIDO .= "</tr>";
}

$CONTENIDO .= "</tbody>
    </table>
</div>";
?>

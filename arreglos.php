<?php
// Iniciar sesión para mantener la persistencia y la barra de sesión
session_start();

if (!isset($_SESSION['hora_inicio'])) {
    $_SESSION['hora_inicio'] = time();
}

$hora_actual = time();
$tiempo_activo = $hora_actual - $_SESSION['hora_inicio'];
$minutos = floor($tiempo_activo / 60);
$segundos = $tiempo_activo % 60;

// Incluir encabezado y menú
include 'includes/header.php';
include 'includes/menu.php';
?>

<!-- Cuadro obligatorio de sesión -->
<div class="session-box">
    <strong>Información de Sesión Activa:</strong><br>
    Hora inicio sesión: <?= date("H:i:s", $_SESSION['hora_inicio']); ?><br>
    Hora actual: <?= date("H:i:s", $hora_actual); ?><br>
    Tiempo activo: <?= $minutos; ?> minutos <?= $segundos; ?> segundos
</div>

<h2>Manipulación de Arreglos en PHP</h2>
<p>Los arreglos (arrays) permiten almacenar múltiples valores en una sola variable. PHP soporta arreglos indexados numéricamente, arreglos asociativos (con claves de texto) y arreglos multidimensionales.</p>

<h3>1. Arreglo Indexado</h3>
<p>Listado de herramientas de desarrollo utilizadas en el proyecto:</p>
<?php
$herramientas = ["Visual Studio Code", "Git", "XAMPP / Servidor Local", "Navegador Web"];
echo "<ul>";
foreach ($herramientas as $herramienta) {
    echo "<li>$herramienta</li>";
}
echo "</ul>";
?>

<h3>2. Arreglo Asociativo</h3>
<p>Datos generales de la configuración del proyecto:</p>
<?php
$configuracion = [
    "asignatura" => "Programación Web",
    "unidad" => "Unidad 4 - Servidor PHP",
    "semestre" => "2026-B",
    "institucion" => "TecNM Campus Tuxtla Gutiérrez"
];
?>
<table>
    <tr>
        <th>Clave Asociativa</th>
        <th>Valor Almacenado</th>
    </tr>
    <?php
    foreach ($configuracion as $clave => $valor) {
        echo "<tr>";
        echo "<td><strong>" . ucfirst($clave) . "</strong></td>";
        echo "<td>" . $valor . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<h3>3. Arreglo Multidimensional con Condicionales en el Recorrido</h3>
<p>Evaluación de estatus y calificaciones del equipo en las actividades de la unidad (Aplicación de condicionales dentro de <code>foreach</code>):</p>
<?php
$equipo_calificaciones = [
    ["estudiante" => "Ramsés Figueroa", "materia" => "Programación Web", "calificacion" => 9.5],
    ["estudiante" => "Colaborador 1", "materia" => "Programación Web", "calificacion" => 8.2],
    ["estudiante" => "Colaborador 2", "materia" => "Programación Web", "calificacion" => 6.8],
    ["estudiante" => "Colaborador 3", "materia" => "Programación Web", "calificacion" => 9.8]
];
?>
<table>
    <tr>
        <th>Estudiante</th>
        <th>Asignatura</th>
        <th>Calificación</th>
        <th>Estatus Evaluado</th>
    </tr>
    <?php
    foreach ($equipo_calificaciones as $row) {
        echo "<tr>";
        echo "<td>" . $row['estudiante'] . "</td>";
        echo "<td>" . $row['materia'] . "</td>";
        echo "<td>" . $row['calificacion'] . "</td>";
        
        // Uso de condicionales dentro del recorrido del arreglo multidimensional
        if ($row['calificacion'] >= 9.0) {
            echo "<td style='color: #059669; font-weight: bold;'>Excelente (Aprobado)</td>";
        } elseif ($row['calificacion'] >= 7.0) {
            echo "<td style='color: #2563eb; font-weight: bold;'>Satisfactorio</td>";
        } else {
            echo "<td style='color: #dc2626; font-weight: bold;'>Requiere Apoyo</td>";
        }
        
        echo "</tr>";
    }
    ?>
</table>

<?php 
include 'includes/footer.php';
?>
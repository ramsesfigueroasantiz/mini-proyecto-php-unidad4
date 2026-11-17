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

<h2>Estructuras de Control: Bucles y Ciclos en PHP</h2>
<p>Los bucles permiten automatizar la repetición de bloques de código de manera eficiente, recorriendo arreglos, listas o generando elementos dinámicamente según una condición numérica o iterativa.</p>

<h3>1. Uso del Bucle <code>for</code></h3>
<p>Generación dinámica de una tabla de multiplicar o secuencia numérica (Unidades de Práctica):</p>
<ul>
<?php
// Bucle for para generar una lista numerada de prácticas
for ($i = 1; $i <= 5; $i++) {
    echo "<li>Práctica de Laboratorio N° $i ejecutada correctamente.</li>";
}
?>
</ul>

<h3>2. Uso del Bucle <code>while</code></h3>
<p>Simulación de conteo o control de stock/intentos mediante condición previa:</p>
<?php
$contador = 3;
echo "<ul>";
while ($contador > 0) {
    echo "<li>Iteración reactiva restante: <strong>$contador</strong></li>";
    $contador--;
}
echo "</ul>";
echo "<p><em>¡Bucle while finalizado con éxito!</em></p>";
?>

<h3>3. Uso del Bucle <code>foreach</code> con Datos Reales</h3>
<p>Recorrido de un arreglo de tecnologías web implementadas en la asignatura:</p>
<?php
$tecnologias_web = [
    "HTML5 & CSS3 (Estructura y Estilo)",
    "JavaScript (Interactividad del lado del cliente)",
    "PHP (Programación del lado del servidor)",
    "MySQL / SQLite (Gestión de Bases de Datos)"
];
?>
<table>
    <tr>
        <th>N°</th>
        <th>Tecnología / Módulo</th>
    </tr>
    <?php
    $indice = 1;
    foreach ($tecnologias_web as $tech) {
        echo "<tr>";
        echo "<td>" . $indice . "</td>";
        echo "<td>" . $tech . "</td>";
        echo "</tr>";
        $indice++;
    }
    ?>
</table>

<?php 
include 'includes/footer.php';
?>
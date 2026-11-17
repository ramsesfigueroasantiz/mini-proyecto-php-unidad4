<?php
// Iniciar sesión para mantener la persistencia y la barra de sesión en todas las páginas
session_start();

// Validar si la sesión está activa, si no, redirigir o inicializar
if (!isset($_SESSION['hora_inicio'])) {
    $_SESSION['hora_inicio'] = time();
}

// Cálculo del tiempo activo
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

<h2>Módulo de Variables y Tipos de Datos en PHP</h2>
<p>En PHP, las variables se declaran anteponiendo el símbolo de dólar (<code>$</code>) seguido del nombre de la variable. No es necesario declarar explícitamente el tipo de dato, ya que PHP realiza una asignación dinámica.</p>

<h3>1. Declaración y Tipos de Datos Básicos</h3>
<?php
// Declaración de variables de diferentes tipos
$nombre_estudiante = "Ramsés Figueroa"; // string
$edad = 19;                            // int
$promedio_academico = 9.5;             // float
$es_inscrito = true;                   // boolean
$materias_cursando = ["Sistemas Operativos", "Programación Web", "Bases de Datos"]; // array

// Mostrar contenido usando echo y concatenación
echo "<p><strong>Nombre (string):</strong> " . $nombre_estudiante . "</p>";
echo "<p><strong>Edad (int):</strong> " . $edad . "</p>";
echo "<p><strong>Promedio (float):</strong> " . $promedio_academico . "</p>";
echo "<p><strong>¿Está inscrito? (boolean):</strong> " . ($es_inscrito ? "Sí" : "No") . "</p>";
?>

<h3>2. Uso de Funciones de PHP: <code>date()</code> y <code>count()</code></h3>
<p>Las funciones integradas en PHP permiten manipular datos y obtener información del sistema en tiempo de ejecución:</p>

<?php
// Uso de date() para mostrar la fecha actual
$fecha_actual = date("d/m/Y");
echo "<p><strong>Fecha actual del servidor (usando date()):</strong> " . $fecha_actual . "</p>";

// Uso de count() para contar elementos de un arreglo
$total_materias = count($materias_cursando);
echo "<p><strong>Total de materias registradas en el arreglo (usando count()):</strong> " . $total_materias . "</p>";
?>

<h3>3. Tabla Resumen de Tipos de Datos Implementados</h3>
<table>
    <tr>
        <th>Tipo de Dato</th>
        <th>Variable PHP</th>
        <th>Valor Asignado</th>
        <th>Función / Uso</th>
    </tr>
    <tr>
        <td>String</td>
        <td><code>$nombre_estudiante</code></td>
        <td><?= $nombre_estudiante; ?></td>
        <td>Almacena cadenas de texto.</td>
    </tr>
    <tr>
        <td>Integer</td>
        <td><code>$edad</code></td>
        <td><?= $edad; ?></td>
        <td>Almacena números enteros.</td>
    </tr>
    <tr>
        <td>Float</td>
        <td><code>$promedio_academico</code></td>
        <td><?= $promedio_academico; ?></td>
        <td>Almacena números con decimales.</td>
    </tr>
    <tr>
        <td>Boolean</td>
        <td><code>$es_inscrito</code></td>
        <td><?= ($es_inscrito ? 'true' : 'false'); ?></td>
        <td>Evalúa estados lógicos (verdadero/falso).</td>
    </tr>
    <tr>
        <td>Array</td>
        <td><code>$materias_cursando</code></td>
        <td>3 elementos</td>
        <td>Contado dinámicamente con <code>count()</code>.</td>
    </tr>
</table>

<?php 
include 'includes/footer.php';
?>
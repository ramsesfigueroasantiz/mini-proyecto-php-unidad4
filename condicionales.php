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


<h2>Estructuras de Control: Condicionales en PHP</h2>
<p>Las estructuras condicionales permiten evaluar expresiones y tomar decisiones lógicas en el flujo del programa redirigiendo la ejecución según se cumplan o no determinadas condiciones.</p>

<h3>1. Uso de Estructuras <code>if</code>, <code>else</code> y <code>elseif</code></h3>
<p>Evaluación del promedio académico de un estudiante:</p>

<?php
$calificacion = 9.2; // Variable a evaluar
echo "<p>Calificación evaluada: <strong>$calificacion</strong></p>";

if ($calificacion >= 9.5) {
    echo "<p style='color: #059669;'><strong>Resultado:</strong> Excelencia académica (Aprobado con honores).</p>";
} elseif ($calificacion >= 7.0) {
    echo "<p style='color: #2563eb;'><strong>Resultado:</strong> Aprobado satisfactoriamente.</p>";
} else {
    echo "<p style='color: #dc2626;'><strong>Resultado:</strong> No aprobado. Requiere nivelación.</p>";
}
?>

<h3>2. Uso de la Estructura <code>switch</code></h3>
<p>Evaluación del nivel de desempeño basado en una letra clave:</p>

<?php
$nivel_desempeno = "B"; // Puede ser A, B, C o D
echo "<p>Nivel evaluado: <strong>$nivel_desempeno</strong></p>";

switch ($nivel_desempeno) {
    case 'A':
        echo "<p><strong>Diagnóstico:</strong> Desempeño Superior. El estudiante domina todos los temas de la unidad.</p>";
        break;
    case 'B':
        echo "<p><strong>Diagnóstico:</strong> Desempeño Notable. El estudiante cumple con los requerimientos técnicos y funcionales.</p>";
        break;
    case 'C':
        echo "<p><strong>Diagnóstico:</strong> Desempeño Suficiente. Se recomienda reforzar aspectos prácticos.</p>";
        break;
    case 'D':
        echo "<p><strong>Diagnóstico:</strong> Insuficiente. Es necesario reestructurar la lógica de desarrollo.</p>";
        break;
    default:
        echo "<p><strong>Error:</strong> Nivel de desempeño no reconocido en el sistema.</p>";
        break;
}
?>

<h3>3. Tabla Comparativa de Condicionales PHP</h3>
<table>
    <tr>
        <th>Estructura</th>
        <th>Descripción Técnica</th>
        <th>Ejecución en este Módulo</th>
    </tr>
    <tr>
        <td><code>if / elseif / else</code></td>
        <td>Permite bifurcar el código en múltiples caminos lógicos según rangos o condiciones booleanas.</td>
        <td>Evaluación numércia de <code>$calificacion</code> (= <?= $calificacion; ?>).</td>
    </tr>
    <tr>
        <td><code>switch</code></td>
        <td>Evalúa una variable contra múltiples valores discretos (casos) de manera limpia y estructurada.</td>
        <td>Evaluación por letra de <code>$nivel_desempeno</code> (= '<?= $nivel_desempeno; ?>').</td>
    </tr>
</table>

<?php 
include 'includes/footer.php';
?>
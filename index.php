<?php
// Manejo de reinicio de sesión si se solicita por parámetro GET
if (isset($_GET['reiniciar']) && $_GET['reiniciar'] == 'true') {
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

// Iniciar sesión en el sistema
session_start();

// Si no existe una hora de inicio de sesión, se registra con time()
if (!isset($_SESSION['hora_inicio'])) {
    $_SESSION['hora_inicio'] = time();
}

// Incluir encabezado y menú
include 'includes/header.php';
include 'includes/menu.php';

// Cálculo del tiempo activo para mostrarlo en todas las páginas
$hora_actual = time();
$tiempo_activo = $hora_actual - $_SESSION['hora_inicio'];
$minutos = floor($tiempo_activo / 60);
$segundos = $tiempo_activo % 60;
?>

<div class="session-box">
    <strong>Información de Sesión Activa:</strong><br>
    Hora inicio sesión: <?= date("H:i:s", $_SESSION['hora_inicio']); ?><br>
    Hora actual: <?= date("H:i:s", $hora_actual); ?><br>
    Tiempo activo: <?= $minutos; ?> minutos <?= $segundos; ?> segundos
</div>

<h2>Bienvenido al Sistema Dinámico en PHP</h2>
<p>Este sitio web demuestra la aplicación práctica de PHP evaluando variables, estructuras de control, arreglos y persistencia mediante sesiones en memoria temporal.</p>

<p>Utiliza el menú superior para navegar entre las diferentes secciones requeridas por la rúbrica del proyecto.</p>

<a href="index.php?reiniciar=true" class="btn">🔄 Reiniciar Sesión / Destruir Sesión</a>

<?php 
include 'includes/footer.php';
?>
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

// Almacenar un dato adicional de prueba en $_SESSION para demostrar persistencia
$_SESSION['usuario_activo'] = "Estudiante - TecNM Tuxtla Gutiérrez";
$_SESSION['visitas_sesion'] = isset($_SESSION['visitas_sesion']) ? $_SESSION['visitas_sesion'] + 1 : 1;

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

<h2>Módulo de Manejo de Sesiones en PHP</h2>
<p>Las sesiones permiten almacenar información del usuario a través de múltiples páginas web utilizando un identificador único guardado en una cookie temporal. Los datos residen en la memoria del servidor.</p>

<h3>1. Funcionamiento Técnico de las Sesiones</h3>
<ul>
    <li><strong><code>session_start()</code>:</strong> Inicializa una nueva sesión o reanuda la sesión existente basada en el identificador recibido.</li>
    <li><strong><code>$_SESSION</code>:</strong> Superglobal utilizada para registrar y leer variables persistentes en la memoria temporal del servidor.</li>
    <li><strong><code>time()</code>:</strong> Retorna la marca de tiempo Unix actual (segundos transcurridos desde el 1 de enero de 1970), utilizada para calcular con precisión milimétrica el tiempo activo del usuario.</li>
    <li><strong><code>session_destroy()</code>:</strong> Destruye toda la información asociada con la sesión actual, permitiendo reiniciar el ciclo de vida de la sesión desde el archivo <code>index.php</code>.</li>
</ul>

<h3>2. Variables Almacenadas en la Sesión Actual</h3>
<table>
    <tr>
        <th>Clave de Sesión</th>
        <th>Valor Almacenado</th>
        <th>Descripción de Persistencia</th>
    </tr>
    <tr>
        <td><code>$_SESSION['hora_inicio']</code></td>
        <td><?= date("H:i:s", $_SESSION['hora_inicio']); ?> (Timestamp: <?= $_SESSION['hora_inicio']; ?>)</td>
        <td>Marca temporal fija registrada al primer acceso al sistema.</td>
    </tr>
    <tr>
        <td><code>$_SESSION['usuario_activo']</code></td>
        <td><?= $_SESSION['usuario_activo']; ?></td>
        <td>Identificador de rol o perfil activo en memoria temporal.</td>
    </tr>
    <tr>
        <td><code>$_SESSION['visitas_sesion']</code></td>
        <td><?= $_SESSION['visitas_sesion']; ?> recargas/accesos</td>
        <td>Contador incremental persistente entre navegaciones de página.</td>
    </tr>
</table>

<p>Puedes reiniciar tu sesión en cualquier momento haciendo clic en el siguiente botón o regresando al inicio:</p>
<a href="index.php?reiniciar=true" class="btn">🔄 Reiniciar / Destruir Sesión</a>

<?php 
include 'includes/footer.php';
?>
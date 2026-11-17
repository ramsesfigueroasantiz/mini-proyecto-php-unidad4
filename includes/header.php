<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['hora_inicio'])) {
    $_SESSION['hora_inicio'] = time();
}
$hora_inicio_formateada = date("H:i:s", $_SESSION['hora_inicio']);
$segundos_iniciales = time() - $_SESSION['hora_inicio'];
$minutos_iniciales = floor($segundos_iniciales / 60);
$segundos_restantes = $segundos_iniciales % 60;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Proyecto 1 - Programación Web</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Programación Web - Unidad 4</h1>
        <p>Mini Proyecto 1: PHP Dinámico (Variables, Estructuras, Arreglos y Sesiones)</p>

        <!-- Caja de Sesión Activa Oscura y Moderna (Única en todo el sitio) -->
        <div class="sesion-box" style="background: rgba(30, 41, 59, 0.95); padding: 15px; border-left: 4px solid #3b82f6; margin: 20px auto; max-width: 600px; font-family: monospace; border-radius: 6px; text-align: left; color: #f8fafc; box-shadow: 0 4px 6px rgba(0,0,0,0.4);">
            <strong style="color: #60a5fa;">Información de Sesión Activa:</strong><br>
            Hora inicio sesión: <span style="color: #cbd5e1;"><?php echo $hora_inicio_formateada; ?></span><br>
            Hora actual: <span id="hora-actual" style="color: #38bdf8; font-weight: bold;"><?php echo date("H:i:s"); ?></span><br>
            Tiempo activo: <span id="tiempo-activo-texto" style="color: #34d399; font-weight: bold;"><?php echo $minutos_iniciales . " minutos " . $segundos_restantes . " segundos"; ?></span>
        </div>
    </header>

    <!-- Script JavaScript global para actualizar el reloj segundo a segundo -->
    <script>
        let segundosTotales = <?php echo $segundos_iniciales; ?>;

        function actualizarRelojEnVivo() {
            segundosTotales++;
            
            let minutos = Math.floor(segundosTotales / 60);
            let segundos = segundosTotales % 60;

            let fechaActual = new Date();
            let horasStr = String(fechaActual.getHours()).padStart(2, '0');
            let minutosStr = String(fechaActual.getMinutes()).padStart(2, '0');
            let segundosStr = String(fechaActual.getSeconds()).padStart(2, '0');

            const elementoHoraActual = document.getElementById("hora-actual");
            if (elementoHoraActual) {
                elementoHoraActual.innerText = horasStr + ":" + minutosStr + ":" + segundosStr;
            }

            const elementoTiempoTexto = document.getElementById("tiempo-activo-texto");
            if (elementoTiempoTexto) {
                elementoTiempoTexto.innerText = minutos + " minutos " + segundos + " segundos";
            }
        }

        setInterval(actualizarRelojEnVivo, 1000);
    </script>
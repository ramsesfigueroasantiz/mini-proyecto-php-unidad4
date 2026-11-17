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

        <?php
        // Control de sesión para el tiempo activo
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['hora_inicio'])) {
            $_SESSION['hora_inicio'] = time();
        }
        $segundos_iniciales = time() - $_SESSION['hora_inicio'];
        ?>

        <!-- Caja visual del cronómetro -->
        <div class="sesion-box" style="margin-top: 10px; font-size: 15px;">
            <span>⏱️ Tiempo activo en sesión: <strong id="tiempo-activo"><?php echo $segundos_iniciales; ?></strong> segundos</span>
        </div>
    </header>

    <!-- Script de JavaScript para que el reloj corra segundo a segundo -->
    <script>
        let segundosActivos = <?php echo $segundos_iniciales; ?>;

        function actualizarReloj() {
            segundosActivos++;
            
            let horas = Math.floor(segundosActivos / 3600);
            let minutos = Math.floor((segundosActivos % 3600) / 60);
            let segundos = segundosActivos % 60;

            let formatoTiempo = "";
            if (horas > 0) {
                formatoTiempo += (horas < 10 ? "0" : "") + horas + ":";
            }
            formatoTiempo += (minutos < 10 ? "0" : "") + minutos + ":" + (segundos < 10 ? "0" : "") + segundos;

            const elemento = document.getElementById("tiempo-activo");
            if (elemento) {
                elemento.innerText = formatoTiempo;
            }
        }

        // Se ejecuta automáticamente cada 1 segundo (1000 ms)
        setInterval(actualizarReloj, 1000);
    </script>
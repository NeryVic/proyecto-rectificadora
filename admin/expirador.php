<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <script type="text/javascript">
     let n = 10;

// Reinicia la cuenta regresiva a 10 si se detecta movimiento del ratón
document.onmousemove = function() {
    n = 10;
};

// Define la función de cuenta regresiva que se ejecutará en intervalos regulares
const id = setInterval(() => {
    console.log(n); // Muestra el valor actual de n en la consola
    n--; // Decrementa el valor de n en 1
    if (n === 0) { // Verifica si n ha llegado a 0
        alert("Expirado"); // Muestra una alerta
        clearInterval(id); // Detiene el intervalo para evitar más ejecuciones
        location.href = "index.php"; // Redirige al usuario a index.php
    }
}, 1200); // Ejecuta la función cada 1200 milisegundos (1.2 segundos)
    </script>
</body>
</html>
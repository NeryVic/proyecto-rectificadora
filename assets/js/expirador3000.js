let n = 15*60;

document.onmousemove = function() {
    n = 15*60;
};

const id = setInterval(() => {
    n--; // Decrementa el valor de n en 1
    if (n === 0) { 
        alert("Expirado"); 
        clearInterval(id); // Detiene el intervalo para evitar más ejecuciones
        location.href = "http://localhost/proyecto-rectificadora/admin/cerrar.php"; 
    }
}, 1100);
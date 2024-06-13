let n = 10;

document.onmousemove = function() {
    n = 10;
};

const id = setInterval(() => {
    console.log(n);
    n--; // Decrementa el valor de n en 1
    if (n === 0) { 
        alert("Expirado"); 
        clearInterval(id); // Detiene el intervalo para evitar más ejecuciones
        location.href = "http://localhost/proyecto-rectificadora/admin/cerrar.php"; 
    }
}, 1100);
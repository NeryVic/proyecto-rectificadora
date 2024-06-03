
AOS.init({
  // Configuraciones que pueden ser anuladas en el nivel del elemento, mediante los atributos `data-aos-*`
  offset: 120, // desplazamiento (en píxeles) desde el punto de activación original
  delay: 0, // valores desde 0 hasta 3000, con paso de 50ms
  duration: 900, // valores desde 0 hasta 3000, con paso de 50ms
  easing: 'ease', // función de easing predeterminada para las animaciones de AOS
  once: false, // si la animación debe ocurrir solo una vez - mientras se desplaza hacia abajo
  mirror: false, // si los elementos deben animarse hacia fuera mientras se desplaza hacia arriba
  anchorPlacement: 'top-bottom', // define la posición del elemento en relación con la ventana que debe activar la animación
});
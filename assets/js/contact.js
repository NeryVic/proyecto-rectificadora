
const btn = document.getElementById('submit_btn');
const form = document.getElementById('contactForm');
const nameInput = document.getElementById('from_name');
const emailInput = document.getElementById('email_id');
const messageInput = document.getElementById('message');
const asuntoInput = document.getElementById('asunto');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  // Validación del nombre
  const name = nameInput.value;
  if (name === '') {
    swal("Por favor", "ingrese su nombre", "error");
    return;
  }

  // Validación del email
  const email = emailInput.value;
  if (email === '') {
    swal("Por favor", "ingresa tu correo electrónico.", "error");
    return;
  }

  // Validación del mensaje
  const message = messageInput.value;
  if (message === '' || message.trim() === '' || message.length <= 20) {
    swal("Por favor", "ingresa un mensaje mayor a 20 caracteres.", "error");
    return;
  }

  // Si todos los campos requeridos están completos, proceder con el envío
  btn.value = 'enviando...';

  const serviceID = 'default_service';
  const templateID = 'template_m56uvew';

  emailjs.sendForm(serviceID, templateID, this)
    .then(() => {
      btn.value = 'enviar';
      swal('Gracias por contactarnos. En breve nos pondremos en contacto contigo.', '', 'success');

      // Limpia los campos
      nameInput.value = '';
      emailInput.value = '';
      messageInput.value = '';
      asuntoInput.value = '';
    }, (err) => {
      btn.value = 'enviar';
      alert('Error al enviar el formulario', '', err);
    });
});

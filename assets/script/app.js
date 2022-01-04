const buttonEmail = document.querySelector('.email');
const buttonPassword = document.querySelector('.password');

const email = document.querySelector('.change-email-form');
const password = document.querySelector('.change-password-form');

buttonEmail.addEventListener('click', (e) => {
  email.classList.toggle('show');
  buttonEmail.classList.toggle('button-color');
});

buttonPassword.addEventListener('click', (e) => {
  password.classList.toggle('show');
  buttonPassword.classList.toggle('button-color');
});

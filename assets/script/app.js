const buttonEmail = document.querySelector('.email');
const buttonPassword = document.querySelector('.password');

const email = document.querySelector('.change-email-form');
const password = document.querySelector('.change-password-form');

// buttonEmail.addEventListener('click', (e) => {
//   email.classList.toggle('show');
//   buttonEmail.classList.toggle('button-color');
// });

// buttonPassword.addEventListener('click', (e) => {
//   password.classList.toggle('show');
//   buttonPassword.classList.toggle('button-color');
// });
console.log('hello');
// TASKS

const form = document.querySelector('form');
const task = document.querySelector('input[type=checkbox]');

// When the user clicks on the checkbox the form will automagically submit.
task.addEventListener('click', () => form.submit());

// form.submit()

// profile.php
const buttonEmail = document.querySelector('.email');
const buttonPassword = document.querySelector('.password');

const email = document.querySelector('.change-email-form');
const password = document.querySelector('.change-password-form');

if (email) {
  buttonEmail.addEventListener('click', (e) => {
    email.classList.toggle('show');
    buttonEmail.classList.toggle('button-color');
  });
}

if (password) {
  buttonPassword.addEventListener('click', (e) => {
    password.classList.toggle('show');
    buttonPassword.classList.toggle('button-color');
  });
}

// TASKS

const form = document.querySelector('form');
const task = document.querySelector('input[type=checkbox]');

// When the user clicks on the checkbox the form will automagically submit.

task.addEventListener('click', (event) => {
  event.target.parentNode.submit();
});

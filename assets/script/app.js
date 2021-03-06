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
const tasks = document.querySelectorAll('input[type=checkbox]');

// When the user clicks on the checkbox the form will automagically submit.

function handleClick(event) {
  event.target.parentNode.submit();
}

tasks.forEach((task) => {
  task.addEventListener('click', handleClick);
});

let signUpForm = document.querySelector("#signUpForm");
let errorMsgP = document.querySelector("#errorMsgP");

signUpForm.addEventListener("submit", (e) => {
  let userName = document.querySelector("#user-name");
  let userEmail = document.querySelector("#user-email");

  let nameRegex = /^[a-zA-Z ]+$/;
  let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/;

  let isValid = true;
  if (isValid) {
    errorMsgP.innerHTML = "";
  }

  if (!nameRegex.test(userName.value)) {
    isValid = false;
    errorMsgP.innerHTML += "<li>Please enter only letters in name</li>";
  }

  if (!emailRegex.test(userEmail.value)) {
    isValid = false;
    errorMsgP.innerHTML += "<li>Please enter a valid email address</li>";
  }

  if (!isValid) {
    e.preventDefault();
  }
});

let signUpShowPassword = document.querySelector("#signUpShowPassword");
let signUpHidePassword = document.querySelector("#signUpHidePassword");

signUpShowPassword.addEventListener("click", () => {
  let userPassword = document.querySelector("#user-password");
  if (userPassword.type == "text") {
    userPassword.type = "password";
  } else {
    userPassword.type = "text";
  }
  signUpShowPassword.style.display = "none";
  signUpHidePassword.style.display = "block";
});

signUpHidePassword.addEventListener("click", () => {
  let userPassword = document.querySelector("#user-password");
  if (userPassword.type == "text") {
    userPassword.type = "password";
  } else {
    userPassword.type = "text";
  }
  signUpShowPassword.style.display = "block";
  signUpHidePassword.style.display = "none";
});

let loginSignupForm = document.querySelector(".loginSignupForm");
let errorMsgP = document.querySelector("#errorMsgP");

loginSignupForm.addEventListener("submit", (e) => {
  let isValid = true;
  if (isValid) {
    errorMsgP.innerHTML = "";
  }

  if (loginSignupForm.id == "SignupForm") {
    isValid = nameValidate();
  }
  isValid = emailValidate();

  if (!isValid) {
    e.preventDefault();
  }
});

function emailValidate() {
  let userEmail = document.querySelector("#user-email");
  let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  let isValid = true;

  if (!emailRegex.test(userEmail.value)) {
    isValid = false;
    errorMsgP.innerHTML += "<li>Please enter a valid email address</li>";
  }
  return isValid;
}
function nameValidate() {
  let userName = document.querySelector("#user-name");
  let isValid = true;

  let nameRegex = /^[a-zA-Z ]+$/;
  if (!nameRegex.test(userName.value)) {
    isValid = false;
    errorMsgP.innerHTML += "<li>Please enter only letters in name</li>";
  }
  return isValid;
}

let signUpShowPassword = document.querySelector("#signUpShowPassword");
let signUpHidePassword = document.querySelector("#signUpHidePassword");
console.log(signUpShowPassword);
console.log(signUpShowPassword);

signUpShowPassword.addEventListener("click", () => {
  console.log("function fired");
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

let firstName = document.querySelector("#first-name");
let lastName = document.querySelector("#last-name");
let phone = document.querySelector("#phone");
let email = document.querySelector("#email");
let state = document.querySelector("#location-state");
let city = document.querySelector("#location-city");
let area = document.querySelector("#location-area");
let link = document.querySelector("#link-select-input");
let linkAddError = document.querySelector("#linkAddError");

firstName.addEventListener("blur", () => {
  args = {
    empty: "Please enter first name.",
    incorrect: "Only letters and spaces are allowed.",
  };
  formDataErrorHandling(firstName, /^[A-Za-z\s]+$/, args, true);
});
lastName.addEventListener("blur", () => {
  args = {
    empty: "Please enter last name.",
    incorrect: "Only letters and spaces are allowed.",
  };
  formDataErrorHandling(lastName, /^[A-Za-z\s]+$/, args, false);
});
phone.addEventListener("blur", () => {
  args = {
    empty: "Please enter mobile number.",
    incorrect:
      "Enter a valid 10-digit phone number starting, with or without country code",
  };
  formDataErrorHandling(phone, /^(\+91[\-\s]?)?[6-9]\d{9}$/, args, true);
});
email.addEventListener("blur", () => {
  args = {
    empty: "Please enter email id.",
    incorrect: "Enter a valid email address, e.g., example@domain.com",
  };
  formDataErrorHandling(
    email,
    /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
    args,
    true
  );
});
state.addEventListener("blur", () => {
  args = {
    empty: "Please enter state.",
    incorrect:
      "Enter a valid state name ((letters and spaces only), e.g., Haryana or Tamil Nadu",
  };
  formDataErrorHandling(state, /^[a-zA-Z\s]+$/, args, true);
});
city.addEventListener("blur", () => {
  args = {
    empty: "Please enter city.",
    incorrect:
      "Enter a valid city name (letters and spaces only), e.g., Mumbai or New York",
  };
  formDataErrorHandling(city, /^[a-zA-Z\s]+$/, args, true);
});
area.addEventListener("blur", () => {
  args = {
    empty: "Please enter area.",
    incorrect:
      "Enter a valid area name (letters, numbers, and spaces allowed), e.g., Andheri West or Sector 15.",
  };
  formDataErrorHandling(area, /^[a-zA-Z0-9\s]+$/, args, false);
});

document.querySelector("#linkSelectBtn").addEventListener("click", () => {
  args = {
    incorrect: "Please enter a valid URL.",
  };
  formDataErrorHandling(
    link,
    /^(https?:\/\/)?(www\.)?[a-zA-Z0-9-]+\.[a-zA-Z]{2,}(\/[a-zA-Z0-9-_.~%]*)*(\?[a-zA-Z0-9-_=&]*)?(#[a-zA-Z0-9-]*)?$/,
    args,
    false
  );
});

function formDataErrorHandling(
  inputField,
  regex,
  errorMessages,
  required = false
) {
  const value = inputField.value.trim();

  // Find or create a field-specific error element
  let errorElement = inputField.nextElementSibling;
  if (!errorElement || !errorElement.classList.contains("form-error")) {
    errorElement = document.createElement("span");
    errorElement.className = "text-red-500 mt-1 form-error w-fit";
    inputField.insertAdjacentElement("afterend", errorElement);
  }

  // Empty value and required
  if (required && value === "") {
    errorElement.textContent = errorMessages["empty"];
    errorElement.classList.remove("hidden");
    return;
  }

  // Invalid pattern
  if (value !== "" && !regex.test(value)) {
    errorElement.textContent = errorMessages["incorrect"];
    errorElement.classList.remove("hidden");
    return;
  }

  // No error
  errorElement.classList.add("hidden");
}

let step1Form = document.querySelector("#step1Form");
let formSubmitError = document.querySelector("#formSubmitError");

step1Form.addEventListener("submit", (e) => {
  e.preventDefault();

  let errors = document.querySelectorAll(".form-error");
  let isValid = true;
  errors.forEach((element) => {
    if (!element.classList.contains("hidden")) {
      isValid = false;
    }
  });

  if (isValid) {
    step1Form.submit();
  } else {
    formSubmitError.classList.remove("hidden");
    // alert("Please fill the form with correct details!");
  }
});

// Event listener for input field focus (clicking or focusing on any field)
const formFields = document.querySelectorAll("input, select, textarea");

formFields.forEach((field) => {
  field.addEventListener("focus", () => {
    // Remove general error when any field is focused
    formSubmitError.classList.add("hidden");
    linkAddError.classList.add("hidden");
  });
});

let linkSelect = document.querySelector("#link-select");
let linkSelectInput = document.querySelector("#link-select-input");
let linkSelectBtn = document.querySelector("#linkSelectBtn");

// let link = "";

// linkSelect.addEventListener("change", () => {
//   let value = linkSelect.value;
//   console.log(value);
//   switch (value) {
//     case "Linkedin":
//       linkSelectInput.placeholder = "@Username or link";
//       linkSelectInput.value = "";
//       link = "https://www.linkedin.com/in/";
//       break;
//     case "Github":
//       linkSelectInput.placeholder = "@Username or link";
//       link = "https://github.com/";
//       linkSelectInput.value = "";
//       break;
//     case "Instagram":
//       linkSelectInput.placeholder = "@Username or link";
//       link = "https://www.instagram.com/";
//       linkSelectInput.value = "";
//       break;
//     case "LeetCode":
//       linkSelectInput.placeholder = "@Username or link";
//       link = "https://leetcode.com/";
//       linkSelectInput.value = "";
//       break;
//     case "Behance":
//       linkSelectInput.placeholder = "@Username or link";
//       link = "https://www.behance.net/";
//       linkSelectInput.value = "";
//       break;
//     default:
//       linkSelectInput.placeholder = "Link";
//       link = "";
//       break;
//   }
// });
let previouslyAdded = document.querySelectorAll(".link-id");
let count = 1 + previouslyAdded.length;
linkSelectBtn.addEventListener("click", () => {
  if (linkSelectInput.value == "") {
    linkAddError.classList.remove("hidden");
    return;
  }
  if (!linkSelectInput.nextElementSibling.classList.contains("hidden")) {
    return;
  }
  let inputValue = linkSelectInput.value;
  let selectValue = linkSelect.value;

  let linkAddDataContainer = document.querySelector("#linkAddDataContainer");
  let linkSelectTemplate = document.querySelector("#linkSelectTemplate");

  // Linkedin = 1
  // Github = 2
  // Portfolio = 3
  // Instagram = 4
  // LeetCode = 5
  // Behance = 6
  // Other = 7

  // let linkSelect = document.querySelector("#qualificationType");
  // let id =
  //   qualificationType.options[qualificationType.selectedIndex].className.slice(
  //     22
  //   );
  let id = linkSelect.options[linkSelect.selectedIndex].id.slice(14);
  // console.log(id);
  // return;

  let clone = document.importNode(linkSelectTemplate.content, true);
  let label = clone.querySelector("label");
  let input = clone.querySelector("input");
  let linkIdElement = clone.querySelector(".link-id");

  if (selectValue == "Other") {
    selectValue = "Link";
  }
  label.textContent = selectValue ? selectValue : "Link";
  label.setAttribute("for", `link-id-${id}`);
  input.setAttribute("name", `link-id-${id}`);

  linkIdElement.setAttribute("name", `link-id-sno-${count}`);
  linkIdElement.value = id;

  clone.querySelector("input").value = inputValue.replace(/\s+/g, "");
  linkAddDataContainer.appendChild(clone);

  let alreadyAddedLinks = document.querySelectorAll(".link-id");
  alreadyAddedLinks.forEach((element) => {
    let addedLinkName =
      element.parentElement.firstElementChild.textContent.trim();

    // Loop through select options
    for (let i = 0; i < linkSelect.options.length; i++) {
      if (linkSelect.options[i].text.trim() === addedLinkName) {
        linkSelect.remove(i);
        break; // Exit after removing
      }
    }
  });
  count++;
  linkSelectInput.value = "";
});

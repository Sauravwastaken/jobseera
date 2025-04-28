let year = document.querySelectorAll(".year");
let institutionName = document.querySelectorAll(".institution-name");
let percentage = document.querySelectorAll(".percentage");
let higherEducationInstituteName = document.querySelector(
  "#higherEducationInstituteName"
);
let courseName = document.querySelector("#courseName");
let branchName = document.querySelector("#branchName");
let higherEducationCgpa = document.querySelector("#higherEducationCgpa");
let qualificationType = document.querySelector("#qualificationType");
document.addEventListener(
  "blur",
  (event) => {
    let target = event.target;
    let args, regex;

    if (target.classList.contains("year")) {
      args = {
        empty: "Please enter year.",
        incorrect: "Please enter a valid year (e.g., 1969).",
      };
      regex = /^\d{4}$/;
    } else if (target.classList.contains("institution-name")) {
      args = {
        empty: "Please enter institution name.",
        incorrect: "Enter a valid institution name.",
      };
      regex = /^[A-Za-z0-9\s\-,\.]+$/;
    } else if (target.classList.contains("percentage")) {
      args = {
        empty: "Please enter percentage.",
        incorrect:
          "Please enter a percentage from 0 to 100. Decimals up to two places are allowed.",
      };
      regex = /^(100(\.0{1,2})?|[0-9]{1,2}(\.\d{1,2})?)$/;
    } else if (target.classList.contains("course-name")) {
      args = {
        empty: "Please enter course name.",
        incorrect: "Enter a valid course name.",
      };
      regex = /^[A-Za-z0-9\s\-,\.]+$/;
    } else if (target.classList.contains("branch-name")) {
      args = {
        empty: "Please enter branch name.",
        incorrect: "Enter a valid branch name.",
      };
      regex = /^[A-Za-z0-9\s\-,\.]+$/;
    } else if (target.classList.contains("cgpa")) {
      args = {
        empty: "Please enter CGPA.",
        incorrect:
          "Enter a valid CGPA between 0 and 10 (up to 2 decimal places).",
      };
      regex = /^(10(\.0{1,2})?|[0-9](\.\d{1,2})?)$/;
    }
    if (args && regex) {
      formDataErrorHandling(target, regex, args, true);
    }
  },
  true // Capture phase
);

// year.forEach((element) => {
//   element.addEventListener("blur", () => {
//     args = {
//       empty: "Please enter year.",
//       incorrect: "Please enter a valid year (e.g., 1969).",
//     };
//     formDataErrorHandling(element, /^\d{4}$/, args, true);
//   });
// });
institutionName.forEach((element) => {
  element.addEventListener("blur", () => {
    args = {
      empty: "Please enter school name.",
      incorrect: "Enter a valid school name.",
    };
    formDataErrorHandling(element, /^[A-Za-z0-9\s\-,\.]+$/, args, true);
  });
});
percentage.forEach((element) => {
  element.addEventListener("blur", () => {
    args = {
      empty: "Please enter percentage.",
      incorrect:
        "Please enter a percentage from 0 to 100. Decimals up to two places are allowed.",
    };
    formDataErrorHandling(
      element,
      /^(100(\.0{1,2})?|[0-9]{1,2}(\.\d{1,2})?)$/,
      args,
      true
    );
  });
});
higherEducationInstituteName.addEventListener("blur", () => {
  args = {
    empty: "Please enter institution name.",
    incorrect:
      "Enter a valid institution name (letters, numbers, commas, and spaces only.",
  };
  formDataErrorHandling(
    higherEducationInstituteName,
    /^[A-Za-z0-9\s\-,\.]+$/,
    args,
    true
  );
});
courseName.addEventListener("blur", () => {
  args = {
    empty: "Please enter course name.",
    incorrect:
      "Enter a valid course name (letters, numbers, commas, and spaces only.",
  };
  formDataErrorHandling(courseName, /^[A-Za-z0-9\s\-,\.]+$/, args, true);
});
branchName.addEventListener("blur", () => {
  args = {
    empty: "Please enter branch name.",
    incorrect:
      "Enter a valid branch name (letters, numbers, commas, and spaces only.",
  };
  formDataErrorHandling(branchName, /^[A-Za-z0-9\s\-,\.]+$/, args, true);
});
higherEducationCgpa.addEventListener("blur", () => {
  args = {
    empty: "Please enter cgpa.",
    incorrect: "Enter a valid CGPA between 0 and 10 (up to 2 decimal places).",
  };
  formDataErrorHandling(
    higherEducationCgpa,
    /^(10(\.0{1,2})?|[0-9](\.\d{1,2})?)$/,
    args,
    true
  );
});

qualificationType.addEventListener("change", () => {
  validateSelect();
});
qualificationType.addEventListener("blur", () => {
  validateSelect();
});

function validateSelect() {
  let value = qualificationType.value.trim();
  console.log(value);

  // Find or create a field-specific error element
  let errorElement = qualificationType.nextElementSibling;
  if (!errorElement || !errorElement.classList.contains("form-error")) {
    errorElement = document.createElement("span");
    errorElement.className = "text-red-500 mt-1 form-error w-fit";
    qualificationType.insertAdjacentElement("afterend", errorElement);
  }

  // Empty value
  if (value === "") {
    errorElement.textContent = "Please select qualification type";
    errorElement.classList.remove("hidden");
    return;
  }

  errorElement.classList.add("hidden");
}
// document.querySelector("#higherEducationBtn").addEventListener("click", () => {
//   args = {
//     incorrect: "Please enter a valid URL.",
//   };
//   formDataErrorHandling(
//     link,
//     /^(https?:\/\/)?(www\.)?[a-zA-Z0-9-]+\.[a-zA-Z]{2,}(\/[a-zA-Z0-9-_.~%]*)*(\?[a-zA-Z0-9-_=&]*)?(#[a-zA-Z0-9-]*)?$/,
//     args,
//     false
//   );
// });

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

let step2Form = document.querySelector("#step2Form");
let formSubmitError = document.querySelector("#formSubmitError");
step2Form.addEventListener("submit", (e) => {
  e.preventDefault();

  let errors = document.querySelectorAll(".form-error");
  let isValid = true;
  errors.forEach((element) => {
    if (!element.classList.contains("hidden")) {
      isValid = false;
    }
  });

  if (isValid) {
    step2Form.submit();
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
    higherEducationSubmitError.classList.add("hidden");
  });
});

let higherEducationBtn = document.querySelector("#higherEducationBtn");
let previouslyAdded = document.querySelectorAll(".qualificationType");
let count = 1 + previouslyAdded.length;

removeAlreadyAddedOptions();

higherEducationBtn.addEventListener("click", () => {
  let container = document.querySelector("#higherEducationContainer");
  let template = document.querySelector("#higherEducationTemplate");

  let clone = document.importNode(template.content, true);
  let cloneData = [
    "courseName",
    "branchName",
    "qualificationType",
    "higherEducationCgpa",
    "higherEducationInstituteName",
    "higherEducationJoiningDate",
    "higherEducationPassingDate",
  ];

  let higherEducationSubmitError = document.querySelector(
    "#higherEducationSubmitError"
  );
  let isEmpty = false;
  cloneData.forEach((element) => {
    element = document.querySelector(`#${element}`);
    if (element.value == "") {
      isEmpty = true;
    }
  });
  if (isEmpty) {
    higherEducationSubmitError.classList.remove("hidden");

    return;
  }

  let isValid = true;
  cloneData.forEach((element) => {
    element = document.querySelector(`#${element}`);
    if (
      !element.nextElementSibling ||
      !element.nextElementSibling.classList.contains("hidden")
    ) {
      console.log(element);
      higherEducationSubmitError.classList.remove("hidden");
      isValid = false;
    }
  });
  console.log(isValid);
  if (!isValid) {
    return;
  }

  // Undergraduate = 1
  // Postgraduate = 2
  // Doctorate = 3
  // Diploma = 4
  // Professional and vocational = 5

  let qualificationType = document.querySelector("#qualificationType");
  let id =
    qualificationType.options[qualificationType.selectedIndex].className.slice(
      22
    );
  // console.log(id);

  cloneData.forEach((element) => {
    let userElement = document.querySelector(`#${element}`);
    let userValue = userElement.value ? userElement.value : "";

    let cloneElement = clone.querySelector(`.${element}`);
    cloneElement.value = userValue;

    if (userElement.id == "qualificationType") {
      cloneElement.name = element + count;
    } else {
      cloneElement.name = element + `-${id}`;
    }

    // Clearing value after submitting data
    userElement.value = "";
  });

  container.appendChild(clone);
  removeAlreadyAddedOptions();

  count++;
});

function removeAlreadyAddedOptions() {
  let selectElement = document.querySelector("#qualificationType");
  let alreadyAddedLinks = document.querySelectorAll(".qualificationType");
  alreadyAddedLinks.forEach((element) => {
    let addedLinkName = element.value;

    // Loop through select options
    for (let i = 0; i < selectElement.options.length; i++) {
      if (selectElement.options[i].text.trim() === addedLinkName) {
        console.log("found");
        selectElement.remove(i);
        break; // Exit after removing
      }
    }
  });
}

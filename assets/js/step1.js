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

linkSelectBtn.addEventListener("click", () => {
  let inputValue = linkSelectInput.value;
  let selectValue = linkSelect.value;

  let linkAddDataContainer = document.querySelector("#linkAddDataContainer");
  let linkSelectTemplate = document.querySelector("#linkSelectTemplate");

  let clone = document.importNode(linkSelectTemplate.content, true);
  let label = clone.querySelector("label");
  if (selectValue == "Other") {
    selectValue = "Link";
  }
  label.textContent = selectValue ? selectValue + ":" : "Link";
  label.setAttribute("for", `link-${1}`);

  clone.querySelector("input").value = inputValue.replace(/\s+/g, "");
  linkAddDataContainer.appendChild(clone);
});

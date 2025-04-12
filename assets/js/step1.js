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
});

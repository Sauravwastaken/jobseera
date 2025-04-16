let addSkillBtn = document.querySelector("#addSkillBtn");
let addLangBtn = document.querySelector("#addLangBtn");

let addAccomplishBtn = document.querySelector("#addAccomplishBtn");
let addCertificateBtn = document.querySelector("#addCertificateBtn");

let previouslyAdded = document.querySelectorAll(".cvSummarySno");
let count = 1 + previouslyAdded.length;
console.log(count);
console.log(previouslyAdded.length);

addSkillBtn.addEventListener("click", () => {
  makeClone("skill", "ability");
});
addLangBtn.addEventListener("click", () => {
  makeClone("lang", "ability");
});
addAccomplishBtn.addEventListener("click", () => {
  makeClone("accomplish", "achievement");
});
addCertificateBtn.addEventListener("click", () => {
  makeClone("certificate", "achievement");
});

function makeClone(entry_type, table_type) {
  let container = document.querySelector(`#${entry_type}Container`);
  let template = document.querySelector(`#${entry_type}Template`);

  let clone = document.importNode(template.content, true);
  let cloneData;
  if (table_type == "ability") {
    cloneData = ["cvSummarySno", `${entry_type}Name`, `${entry_type}Level`];
  } else if (table_type == "achievement") {
    cloneData = [
      "cvSummarySno",
      // cvSummaryEntryType
      `${entry_type}Name`,
      `${entry_type}Provider`,
      `${entry_type}Month`,
      `${entry_type}Year`,
      `${entry_type}Desc`,
    ];
  }

  cloneData.forEach((element) => {
    let userElement = document.querySelector(`#${element}`) ?? "";
    let userValue = userElement.value ? userElement.value : "";

    let cloneElement = clone.querySelector(`.${element}`);
    let EntryTypeCloneElement = clone.querySelector(".cvSummaryEntryType");
    EntryTypeCloneElement.name = "cvSummaryEntryType-" + count;
    // console.log("User element: ");
    // console.log(userElement);
    // console.log("Clone element: ");
    // console.log(cloneElement);

    // if (cloneElement.classList.contains("workExperienceEntryType")) {
    //   cloneElement.value = entry_type;
    // } else if (cloneElement.classList.contains("workExperienceSno")) {
    //   cloneElement.value = count;
    // } else {
    //   cloneElement.value = userValue;
    // }
    cloneElement.value = userValue;
    cloneElement.name = element + `-${count}`;

    // Clearing values after submitting data
    userElement.value = "";
  });

  container.appendChild(clone);
  count++;
}

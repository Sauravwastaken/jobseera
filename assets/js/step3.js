let addJobBtn = document.querySelector("#addJobBtn");
let addProjectBtn = document.querySelector("#addProjectBtn");
let previouslyAdded = document.querySelectorAll(".workExperienceSno");
let count = 1 + previouslyAdded.length;
console.log(count);

addJobBtn.addEventListener("click", () => {
  makeClone("job");
});
addProjectBtn.addEventListener("click", () => {
  makeClone("project");
});

function makeClone(entry_type) {
  let container = document.querySelector(`#${entry_type}Container`);
  let template = document.querySelector(`#${entry_type}Template`);

  let clone = document.importNode(template.content, true);
  let cloneData = [
    "workExperienceSno",
    "workExperienceEntryType",
    `${entry_type}Title`,
    ...(entry_type === "job" ? ["companyName"] : []),
    `${entry_type}Location`,
    `${entry_type}Type`,
    `${entry_type}StartDateMonth`,
    `${entry_type}StartDateYear`,
    `${entry_type}EndDateMonth`,
    `${entry_type}EndDateYear`,
    `${entry_type}TechUsed`,
    `${entry_type}Description`,
  ];

  cloneData.forEach((element) => {
    let userElement = document.querySelector(`#${element}`) ?? "";
    let userValue = userElement.value ? userElement.value : "";

    let cloneElement = clone.querySelector(`.${element}`);
    // console.log("User element: ");
    // console.log(userElement);
    // console.log("Clone element: ");
    // console.log(cloneElement);

    if (cloneElement.classList.contains("workExperienceEntryType")) {
      cloneElement.value = entry_type;
    } else if (cloneElement.classList.contains("workExperienceSno")) {
      cloneElement.value = count;
    } else {
      cloneElement.value = userValue;
    }

    cloneElement.name = element + `-${count}`;
    // Clearing value after submitting data
    userElement.value = "";
  });

  container.appendChild(clone);
  count++;
}

let higherEducationBtn = document.querySelector("#higherEducationBtn");
let previouslyAdded = document.querySelectorAll(".qualificationType");
let count = 1 + previouslyAdded.length;

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
  });

  container.appendChild(clone);
  count++;
});

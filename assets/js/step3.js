let workExperienceBtn = document.querySelector("#workExperienceBtn");
let previouslyAdded = document.querySelectorAll(".workExperienceSno");
let count = 1 + previouslyAdded.length;
console.log(count);

workExperienceBtn.addEventListener("click", () => {
  let container = document.querySelector("#workExperienceContainer");
  let template = document.querySelector("#workExperienceTemplate");

  let clone = document.importNode(template.content, true);
  // console.log(clone);
  let cloneData = [
    "workExperienceSno",
    "workExperienceEntryType",
    "jobTitle",
    "companyName",
    "jobLocation",
    "employementType",
    "startDateMonth",
    "startDateYear",
    "endDateMonth",
    "endDateYear",
    "techUsed",
    "jobDescription",
  ];

  // Undergraduate = 1
  // Postgraduate = 2
  // Doctorate = 3
  // Diploma = 4
  // Professional and vocational = 5

  //   let qualificationType = document.querySelector("#qualificationType");
  //   let id =
  //     qualificationType.options[qualificationType.selectedIndex].className.slice(
  //       22
  //     );
  // console.log(id);
  // id = 2;
  cloneData.forEach((element) => {
    // console.log(element);
    let userElement = document.querySelector(`#${element}`);
    // console.log(userElement);
    let userValue = userElement.value ? userElement.value : "";
    // console.log(userValue);

    let cloneElement = clone.querySelector(`.${element}`);
    // console.log(element);

    // cloneElement.value = userValue;
    if (userElement.id == "workExperienceEntryType") {
      cloneElement.value = "work_experience";
    } else if (userElement.id == "workExperienceSno") {
      console.log("yees");
      cloneElement.value = count;
    } else {
      cloneElement.value = userValue;
    }

    cloneElement.name = element + "-" + count;

    // if (userElement.id == "qualificationType") {
    //   cloneElement.name = element + count;
    // } else {
    //   cloneElement.name = element + `-${id}`;
    // }
    cloneElement.name = element + `-${count}`;
  });

  container.appendChild(clone);
  count++;
});

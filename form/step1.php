<?php
    $title = 'Build Your Resume - JobSeera';
    $is_sub_folder = true;
    $form_step = 1;
    include_once('../components/header.php');
    include_once('../components/nav.php'); 

?>

<form action="../parts/_step<?php echo $form_step; ?>_handle.php" method="POST">
  <section class="site-padding py-8">
    <?php include_once('../components/resume_builder_header.php') ;?>

    <!-- Main form container -->
    <div class="border border-theme_border_gray py-4 rounded-lg">
      <div class="px-8">
        <p class="my-4 text-lg">Personal Details</p>

        <div class="space-y-6">
          <!-- Row -->
          <div class="flex w-full space-x-8">
            <div class="flex flex-col flex-grow">
              <label for="first-name" class="resume-form-label"
                >First Name:</label
              >
              <input
                class="resume-form-input"
                type="text"
                id="first-name"
                name="first-name"
                value="<?php echo isset($_SESSION['first-name']) ? $_SESSION['first-name'] : 'Saurav' ?>"
                required
              />
            </div>
            <div class="flex flex-col flex-grow">
              <label for="last-name" class="resume-form-label"
                >Last Name:</label
              >
              <input
                class="resume-form-input"
                type="text"
                id="last-name"
                name="last-name"
              />
            </div>
          </div>

          <!-- Row -->
          <div class="flex w-full space-x-8">
            <div class="flex flex-col flex-grow">
              <label for="phone" class="resume-form-label">Phone No:</label>
              <input
                class="resume-form-input"
                type="tel"
                id="phone"
                name="phone"
                value="1"
                required
              />
            </div>
            <div class="flex flex-col flex-grow">
              <label for="email" class="resume-form-label">Email Id:</label>
              <input
                class="resume-form-input"
                type="email"
                id="email"
                name="email"
                value="sauravthecoder@gmail.com"
                required
              />
            </div>
          </div>
        </div>
      </div>

      <div class="relative my-6 h-2">
        <span class="resume-form-divider"></span>
      </div>

      <div class="px-8">
        <p class="my-4 text-lg">Location</p>

        <div class="space-y-6">
          <!-- Row -->
          <div class="flex w-full space-x-8">
            <div class="flex flex-col flex-grow">
              <label for="location-state" class="resume-form-label"
                >State:</label
              >
              <input
                list="states"
                class="resume-form-input"
                type="text"
                id="location-state"
                name="location-state"
                value="<?php echo isset($_SESSION['state']) ? $_SESSION['state'] : '';?>"
              />
              <datalist id="states">
                <option value="Andhra Pradesh"></option>
                <option value="Arunachal Pradesh"></option>
                <option value="Assam"></option>
                <option value="Bihar"></option>
                <option value="Chhattisgarh"></option>
                <option value="Goa"></option>
                <option value="Gujarat"></option>
                <option value="Haryana"></option>
                <option value="Himachal Pradesh"></option>
                <option value="Jharkhand"></option>
                <option value="Karnataka"></option>
                <option value="Kerala"></option>
                <option value="Madhya Pradesh"></option>
                <option value="Maharashtra"></option>
                <option value="Manipur"></option>
                <option value="Meghalaya"></option>
                <option value="Mizoram"></option>
                <option value="Nagaland"></option>
                <option value="Odisha"></option>
                <option value="Punjab"></option>
                <option value="Rajasthan"></option>
                <option value="Sikkim"></option>
                <option value="Tamil Nadu"></option>
                <option value="Telangana"></option>
                <option value="Tripura"></option>
                <option value="Uttar Pradesh"></option>
                <option value="Uttarakhand"></option>
                <option value="West Bengal"></option>
              </datalist>
            </div>
            <div class="flex flex-col flex-grow">
              <label for="location-city" class="resume-form-label">City:</label>
              <input
                class="resume-form-input"
                type="text"
                id="location-city"
                name="location-city"
              />
            </div>
            <div class="flex flex-col flex-grow">
              <label for="location-area" class="resume-form-label"
                >Area / Locality:</label
              >
              <input
                class="resume-form-input"
                type="text"
                id="location-area"
                name="location-area"
              />
            </div>
          </div>
        </div>
      </div>

      <div class="relative my-6 h-2">
        <span class="resume-form-divider"></span>
      </div>

      <div class="px-8">
        <p class="my-4 text-lg">Links</p>

        <div class="space-y-6" id="linkAddDataContainer">
          <!-- Row -->
          <div class="flex w-full space-x-4">
            <div class="flex flex-col flex-grow-0">
              <select
                class="resume-form-input"
                name="link-select"
                id="link-select"
              >
                <option value="" disabled selected>Select</option>

                <option value="Linkedin">Linkedin</option>
                <option value="Github">Github</option>
                <option value="Portfolio">Portfolio</option>
                <option value="Instagram">Instagram</option>
                <option value="LeetCode">LeetCode</option>
                <option value="Behance">Behance</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="flex flex-col w-5/12">
              <input
                class="resume-form-input"
                type="text"
                name="link-select-input"
                id="link-select-input"
                placeholder="Link"
              />
            </div>
            <div class="flex flex-col flex-grow-0">
              <a
                id="linkSelectBtn"
                class="bg-theme_green text-white px-4 py-2 rounded-lg"
              >
                Add
              </a>
            </div>
          </div>

          <!-- Added Data -->
          <template id="linkSelectTemplate">
            <div class="flex w-full space-x-0">
              <div class="flex flex-col single-input-row-lg space-y-2">
                <label class="resume-form-label"></label>
                <input class="resume-form-input" type="text" value="" />
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>

    <?php include_once('../components/resume_builder_submit.php'); ?>
  </section>
</form>

<script src="../assets/js/step1.js"></script>
<?php
    include_once('../components/footer.php');
?>

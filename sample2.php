<html>
    <head>
<script>
    const mainCategory = document.querySelector("#main-category");

mainCategory.addEventListener("change", function() {
  const selectedValues = Array.from(mainCategory.selectedOptions).map(option => option.value);
  console.log(selectedValues);
});

</script>
    </head>
    <body>
    <select id="main-category">
  <option value="">Select Type of Services:</option>
  <optgroup label="Category A">
    <option value="HAIRCUT_SMALL">Haircut - Small ₱ 199.00</option>
    <option value="HAIRCUT_MEDIUM">Haircut - Medium ₱ 249.00</option>
    <option value="HAIRCUT_LARGE">Haircut - Large ₱ 300.00</option>
    <option value="HAIRCUT_EXTRA_LARGE">Haircut - Extra Large ₱ 350.00</option>
  </optgroup>
  <optgroup label="Category B">
    <option value="FULL_GROOM_SMALL">Full Groom - Small ₱ 300.00</option>
    <option value="FULL_GROOM_MEDIUM">Full Groom - Medium ₱ 350.00</option>
    <option value="FULL_GROOM_LARGE">Full Groom - Large ₱ 450.00</option>
    <option value="FULL_GROOM_EXTRA_LARGE">Full Groom - Extra Large ₱ 550.00</option>
    <option value="FULL_GROOM_DOUBLE_EXTRA_LARGE">Full Groom - Double Extra Large ₱ 650.00</option>
  </optgroup>
  <optgroup label="Category C">
    <option value="NAIL_CLIPPING">Nail Clipping ₱ 50.00</option>
    <option value="PAW_TRIM">Paw Trim ₱ 75.00</option>
    <option value="EAR_CLEANING">Ear Cleaning ₱ 50.00</option>
    <option value="FACE_TRIM">Face Trim ₱ 100.00</option>
    <option value="EAR_PLUCKING">Ear Plucking ₱ 50.00</option>
  </optgroup>
</select>

    </body>
</html>
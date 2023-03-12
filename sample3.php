<select id="main-category">
  <option value="">Select Type of Services:</option>
  <option value="Category A">Haircut Only</option>
  <option value="Category B">Full Groom</option>
  <option value="Category C">Alacarte</option>
</select>

<div id="sub-category">
  <h3>Please Select:</h3>
</div>

<script>
  const mainCategory = document.querySelector("#main-category");
  const subCategory = document.querySelector("#sub-category");

  mainCategory.addEventListener("change", function() {
    switch (mainCategory.value) {
      case "Category A":
        subCategory.innerHTML = `
          <h3>Select Haircut Dog Size</h3>
          <label><input type="radio" name="size[]" value="SMALL" class="custom-checkbox"> SMALL ₱ 199.00</label><br>
          <label><input type="radio" name="size[]" value="MEDIUM" class="custom-checkbox"> MEDIUM ₱ 249.00</label><br>
          <label><input type="radio" name="size[]" value="LARGE" class="custom-checkbox"> LARGE ₱ 300.00</label><br>
          <label><input type="radio" name="size[]" value="EXTRA LARGE"class=" custom-checkbox"> EXTRA LARGE ₱ 350.00</label><br>
        `;
        break;
      case "Category B":
        subCategory.innerHTML = `
          <h3>Select Full Groom Dog Size</h3>
          <label><input type="radio" name="size[]" value="SMALL"> SMALL ₱ 300.00</label><br>
          <label><input type="radio" name="size[]" value="MEDIUM"> MEDIUM ₱ 350.00</label><br>
          <label><input type="radio" name="size[]" value="LARGE"> LARGE ₱ 450.00</label><br>
          <label><input type="radio" name="size[]" value="EXTRA LARGE"> EXTRA LARGE ₱ 550.00</label><br>
          <label><input type="radio" name="size[]" value="DOUBLE EXTRA LARGE"> DOUBLE EXTRA LARGE ₱ 650.00</label><br>
        `;
        break;
      case "Category C":
        subCategory.innerHTML = `
          <h3>Select Alacarte for your Dog:</h3>
          <label><input type="checkbox" name="alacarte[]" value="NAIL CLIPPING"> NAIL CLIPPING ₱ 50.00</label><br>
          <label><input type="checkbox" name="alacarte[]" value="PAW TRIM"> PAW TRIM ₱ 75.00</label><br>
          <label><input type="checkbox" name="alacarte[]" value="EAR CLEANING"> EAR CLEANING ₱ 50.00</label><br>
          <label><input type="checkbox" name="alacarte[]" value="FACE TRIM"> FACE TRIM ₱ 100.00</label><br>
          <label><input type="checkbox" name="alacarte[]" value="EAR PLUCKING"> EAR PLUCKING ₱ 50.00</label><br>
        `;
        break;
      default:
        subCategory.innerHTML = `
          <h3>Please Select:</h3>
        `;
    }
  });
</script>

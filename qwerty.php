<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
</head>
<body>


<style>
  i{
    color:lightgray;
    position: relative;
    bottom: 40px;
    cursor:pointer;
    left: 600px;;

    }
</style>


<div style="padding-top: 30px">
                             <label>Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Password" id="password" >
                           <i id="visibilityBtn"><span id="icon" class="material-symbols-outlined">visibility_off</i>
                        </div>














<FORM><TABLE BORDER='8'><BR><BR>
<TR>
<TR>
<TD>HAIRCUT ONLY</TD>
<TD><SELECT>
<OPTION> SMALL ₱ 199.00
<OPTION> MEDIUM ₱ 249.00
<OPTION> LARGE ₱ 300.00
<OPTION> EXTRA LARGE ₱ 350.00



<TD> FULL GROOM </TD>
<TD><SELECT>
<OPTION> SMALL ₱ 300.00
<OPTION> MEDIUM ₱ 350.00
<OPTION> LARGE ₱ 450.00
<OPTION> EXTRA LARGE ₱ 550.00
<OPTION> EXTRA LARGE ₱ 650.00

<TD>ALACARTE</TD>
<TD><SELECT>
<OPTION> NAIL CLIPPING ₱ 50.00
<OPTION> PAW TRIM ₱ 75.00
<OPTION> EAR CLEANING ₱ 50.00
<OPTION> FACE TRIM ₱ 100.00
<OPTION> EAR PLUCKING ₱ 50.00

</SELECT></TD>

<select>
  <option value="">Select a Category</option>
  <option value="Category 1">Category 1</option>
  <option value="Category 2">Category 2</option>
  <option value="Category 3">Category 3</option>
</select>

<option value="">Select a Category</option>
  <option value="Category 1">Category 1</option>
  <option value="Category 2">Category 2</option>
  <option value="Category 3">Category 3</option>

<!-- select -->

<style>
  select {
    border: 1px solid #000;
    padding: 10px;
    width: 450x;
    padding: 10px;
    font-size: 18px;
  }
</style>
  <select id="main-category">
  <option value="">Select Type of Services</option>
  <option value="Category A">Haircut Only</option>
  <option value="Category B">Full Groom</option>
  <option value="Category C">Alacarte</option>
</select>

<select id="sub-category">
  <option value="">Select a Sub Category</option>
</select>

<script>
    
  const mainCategory = document.querySelector("#main-category");
  const subCategory = document.querySelector("#sub-category");

  mainCategory.addEventListener("change", function() {
    switch (mainCategory.value) {
      case "Category A":
        subCategory.innerHTML = `
          <option value="">Select Haircut Dog Size</option>
          <option value="SMALL ₱ 199.00">SMALL ₱ 199.00</option>
          <option value="MEDIUM ₱ 249.00">MEDIUM ₱ 249.00</option>
          <option value="LARGE ₱ 300.00">LARGE ₱ 300.00</option>
          <option value=" EXTRA LARGE ₱ 350.00"> EXTRA LARGE ₱ 350.00</option>
        `;
        break;
      case "Category B":
        subCategory.innerHTML = `
          <option value="">Select a Sub Category</option>
          <option value="SMALL ₱ 300.00">SMALL ₱ 300.00</option>
          <option value="MEDIUM ₱ 350.00">MEDIUM ₱ 350.00</option>
          <option value="LARGE ₱ 450.00">LARGE ₱ 450.00</option>
          <option value="EXTRA LARGE ₱ 550.00">EXTRA LARGE ₱ 550.00</option>
          <option value="DOUBLE EXTRA LARGE ₱ 650.00"> DOUBLE EXTRA LARGE ₱ 650.00</option>
        `;
        break;
      case "Category C":
        subCategory.innerHTML = `
          <option value="">Select a Sub Category</option>
          <option value="NAIL CLIPPING ₱ 50.00">NAIL CLIPPING ₱ 50.00</option>
          <option value="PAW TRIM ₱ 75.00">PAW TRIM ₱ 75.00</option>
          <option value="EAR CLEANING ₱ 50.00">EAR CLEANING ₱ 50.00</option>
          <option value="FACE TRIM ₱ 100.00">FACE TRIM ₱ 100.00</option>
          <option value="EAR CLEANING ₱ 50.00">EAR CLEANING ₱ 50.00</option>
          <option value="EAR PLUCKING ₱ 50.00">EAR PLUCKING ₱ 50.00</option>
        `;
        break;
      default:
        subCategory.innerHTML = `
          <option value="">Select a Sub Category</option>
        `;
    }
  });
</script>
<input type="submit" value="Submit">

<!-- dsad? -->
<select id="categories" multiple>
  <option value="Category A">Category A</option>
  <option value="Category B">Category B</option>
  <option value="Category C">Category C</option>
  <option value="Category D">Category D</option>
  <option value="Category E">Category E</option>
</select>

<script>
  const categories = document.querySelector("#categories");

  categories.addEventListener("change", function() {
    const selectedCategories = Array.from(categories.selectedOptions).map(
      option => option.value
    );
    console.log("Selected Categories:", selectedCategories);
  });
</script>




</html>

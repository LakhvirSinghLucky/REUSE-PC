<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
  <link rel="stylesheet" href="../css/logstyle.css" />
</head>
<body>
<div class="country-settings wrapper">
  <h1>Website (Country/Region)</h1>
  <p class="note">Changing the country/region you shop from may affect factors including:</p>
  <p class="note">Price, Shipping Options and Product Availability.</p>
  <p>Select your preferred Country/Region website:</p>
  <select class="country-select">
  <option value="india">India</option>
    <option value="australia">Australia</option>
    <option value="belgium">Belgium (Belgique)</option>
    <option value="brazil">Brazil (Brasil)</option>
    <option value="canada">Canada</option>
    <option value="china">China (中国)</option>
    <option value="egypt">Egypt (مصر)</option>
    <option value="france">France</option>
    <option value="germany">Germany (Deutschland)</option>
    <option value="italy">Italy (Italia)</option>
    <option value="japan">Japan (※)</option>
    <option value="mexico">Mexico (México)</option>
    <option value="netherlands">Netherlands (Nederland)</option>
    <option value="poland">Poland (Polska)</option>
    <option value="saudi-arabia">المملكة العربية السعودية Saudi Arabia</option>
    <option value="singapore">Singapore</option>
    <option value="spain">Spain (España)</option>
    <option value="sweden">Sweden (Sverige)</option>
    <option value="turkey">Turkey (Türkiye)</option>
  </select>
  <p>NOTE: A new country/region website selection will open in a new tab.</p>
  <div class="button-group">
    <a href="" id="cancel_back" class="cancel save-country" >Cancel</a>
    <a href="" class="save-country">Save</a>
<script>
  document.getElementById("cancel_back").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent the default action of following the link
    
    window.history.back(); // Navigate to the previous page
});

</script>
   </div>
</div>
</body>
</html>
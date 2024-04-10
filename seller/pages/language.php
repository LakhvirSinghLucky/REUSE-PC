<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Language</title>
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
    <style>
        .language-settings {
  width: 500px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f5f5f5;
}

.language-settings h1 {
  text-align: center;
  margin-bottom: 20px;
}

.language-settings label {
  display: block;
  margin-bottom: 10px;
}

.language-settings input[type="radio"] {
  margin-right: 10px;
}

.submit-lang {
  display: block;
  margin: 20px auto;
  padding: 8px 18px;
  font-size: larger;
  border: none;
  border-radius: 5px;
  background-color: #4CAF50;
  color: #fff;
  cursor: pointer;
}
  .box-radio {
    display: flex;
    align-items: baseline;
}
form {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}
    </style>
</head>
<body>
<div class="language-settings">
  <h1>Language Settings</h1>
  <form>
    <div class="box-radio">
        <input type="radio" id="english" name="language" value="english">
    <label for="english">
      English - EN
    </label>
    </div>
    <div class="box-radio">
        <input type="radio" id="hindi" name="language" value="hindi">
    <label for="hindi">
      हिन्दी - Hindi 
    </label>
    </div>
    <div class="box-radio">
        <input type="radio" id="tamil" name="language" value="tamil">
    <label for="tamil">
      தமிழ் - Tamil 
    </label>
    </div>
    <div class="box-radio">
        <input type="radio" id="telugu" name="language" value="telugu">
    <label for="telugu">
      తెలుగు - Telugu 
    </label>
    </div>
    <div class="box-radio">
        <input type="radio" id="kannada" name="language" value="kannada">
    <label for="kannada">
      ಕನ್ನಡ - Kannada 
    </label>
    </div>
    <div class="box-radio">
        <input type="radio" id="malayalam" name="language" value="malayalam">
    <label for="malayalam">
      മലയാളം - Malayalam
    </label>
      </div>
    <div class="box-radio">
      <input type="radio" id="bangla" name="language" value="bangla">
    <label for="bangla">
      বাংলা - Bangla 
    </label>
    </div>
    <div class="box-radio">
        <input type="radio" id="marathi" name="language" value="marathi">
    <label for="marathi">
      मराठी -Marathi 
    </label>
    </div>
    <div class="box-radio">
        <input type="radio" id="gujarati" name="language" value="gujarati">
    <label for="gujarati">
      ગુજરાતી - Gujarati 
    </label>
    </div>
    <div class="box-radio">
        <input type="radio" id="punjabi" name="language" value="punjabi">
    <label for="punjabi">
      ਪੰਜਾਬੀ - Punjabi 
    </label>
    </div>
    <div class="box-radio">
        <input type="radio" id="urdu" name="language" value="urdu">
    <label for="urdu">
    ترجمہ - Urdu
    </label>
    </div>
   <a href="" class="submit-lang">Save</a>
  </form>
</div>
</body>
</html>
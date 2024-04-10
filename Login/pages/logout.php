<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache,no-store, must-revalidate" >
    <meta http-equiv="pragma" content="no-cache" >
    <meta http-equiv="expires" content="0" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="LOGO/web-logo--4.png" sizes="132x132" />

    
    <style>
      body{
        background-image: url('LOGO/Deskto.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
      }
      .log-but{
        bottom: -26px;
    left: 33px;
    position: relative;
      }
      .iframe{
        text-align: center;
      }
      .full-screen{
      display: grid;
      margin: -33px;
      place-items: center;
      font-family:sans-serif;
      }
      .container{
        width: 552px;
        display:flow-root;
        text-align:justify;
        background-color: #dfdfdf;
        border: 2px solid  rgba(255, 255, 255, 0.2);
    box-shadow: 10px 12px 10px rgba(0, 0, 0, .2);
    border-radius: 20px;
    margin: 4px 0px 0px 409px;
    padding: 57px 46px 0px 46px;
      }
        .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 8%;
    }
    button{
      font-size: medium;
      color: white;
      border: 2px solid  rgb(82 82 255 / 89%);
      border-radius: 20px;
      background-color: rgb(82 82 255 / 89%);
      cursor:pointer;
      box-shadow: 11px 12px 8px rgba(0, 0, 0, .2);
      font-weight: 600;
    margin: 15px 34px 141px 32px;
    padding: 2px 50px 6px 50px;
    text-align: center;
    font-family: system-ui;
    }
    .out{
      text-align: center;
      align-items: center;
      display: flex;
      text-decoration: none;
      margin-top: 139px;
    }
    #hr {
    margin: -149px 10px -227px -43px;
    }
    .out::before,.out::after{
      content: '';
      flex: 1;
      border-bottom: 1px solid #000;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
    height: 1px;
    border: 0;
    }
    a{
      color: white;
      text-decoration: none;
    }
    #l-button{
      color: white;
    text-decoration: none;
    }
#l-button:hover{
  text-decoration:underline;
}
#power{
  margin: 13px 0px 13px 13px;
    padding: 0px 0px 20px 14px;
  color: #00000080;
}
    </style>  
</head>
<body>
<img src="logo.png"  alt="" class="center">
<div class="container">
<h1 class="full-screen" style="text-decoration: none;">THANKS&nbsp; FOR&nbsp; VISITING&nbsp; OUR&nbsp; SITE</h1>
<div id="hr"><img src="LOGO/hrpng.png" alt="Horizontal Line"></div>
<h3 class="out">You have been logged out</h3>
<div class="log-but">
<button type="button" id="l-button"><a href="login.php"> Log In</a></button> or <button id="l-button" type="button"><a href="regform.php"> Sign Up</a></button>
</div>
 <?php include 'social.html';?>
<div id="power">
  POWERED BY <br>
   REUSE-PC &nbsp;&nbsp;&nbsp;&nbsp; &copy; 2022–2023
</div>
</body>
</html>
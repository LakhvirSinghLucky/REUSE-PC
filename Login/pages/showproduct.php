<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .buy-container {
    display: flex;
    width: 99%;
    position: relative;
    top: 7em;
    padding: 14px 0px 0px 14px;
    flex-wrap: wrap;
    flex-direction: row;
}
.product-img {
    width: 50em;
}
img#product-img {
    width: 26em;
    position: relative;
    left: 11em;
}
.product-detail {
    position: relative;
    background-color: #e4e4e4;
    width: 36em;
    border-radius: 7px;
    color: #818181;
}
pre#txt-product {
    font-family: system-ui;
    font-size: xx-large;
    line-height: 7vh;
    position: relative;
    top: -38px;
    height: 25vh;
    font-weight: 700;
    color: #818181;
    left: 3vh;
    width: 20em;
}
hr#hr-1a {
    width: 14em;
    top: 8vh;
}
hr#hr-2a {
    width: 14em;
}
.hr {
    position: relative;
    background-color: white;
    width: 38em;
}
span {
    display: flex;
    text-align: center;
    align-items: center;
    position: relative;
    top: 3vh;
}
h5#mrp {
    text-decoration: line-through;
    color: #8a8686;
    font-size: 19px;
}
s#off-27\% {
    font-size: 17px;
    font-family: monospace;
    border-radius: 13px;
    line-height: 25px;
    color: #f43e3e;
    background-color: #ffbbbb;
}
s#ioat {
    font-size: 17px;
    color: #5b5b5b;
    position: relative;
    font-weight: 400;
    left: 1em;
}
.product-color {
    position: relative;
    left: 4vh;
    font-size: larger;
    font-weight: 500;
    font-family: system-ui;
    display: flex;
}
s.under-var {
    text-decoration: underline;
}


    </style>
</head>
<body>
<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "seller";
  
  $conn = mysqli_connect($server, $username, $password, $database);
  if (!$conn){
     die("error".mysqli_connect_error());
  }

  $query = "SELECT * FROM products WHERE id='$id'";
  $findresult = mysqli_query($conn, $query);

  while ($res = mysqli_fetch_array($findresult)) {
    $image1     = $res['image1'];
    $title      = $res['title'];
    $subtitle   = $res['subtitle'];
    $price      = $res['price'];
    $old_price  = $res['old_price'];
    
    echo "<div class='buy-container'>
            <div class='product-img'>
                <img src='../seller/product_image/" . $image1 . "' id='product-img' alt='Peanut Butter'>
            </div>
            <div class='product-detail'>
                <pre id='txt-product'> " . $title . "
                    <span><b>   &#8377;" . $price . "</b>&nbsp;&nbsp;<h5 id='mrp'>   MRP &#8377;" . $old_price . "</h5> 
                    </span>
                </pre>
            </div>
         </div>
  </div>";
  }
  ?> 
</body>
</html>
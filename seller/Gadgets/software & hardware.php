<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="LOGO/web-logo--4.png" />
  <link rel="stylesheet" href="css/soft&hard.css" />
</head>

<body>   .container {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 10px;
      width: 80%;
      margin: 0 auto;
    }
    
    /* Style the card divs */
    .card {
      border: 1px solid black;
      padding: 10px;
      background-color: white;
    }
    
    /* Style the product images */
    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    
    /* Style the product names */
    .card h3 {
      font-size: 18px;
      font-weight: bold;
      text-align: center;
      color: black;
    }
    
    /* Style the product prices */
    .card p {
      font-size: 16px;
      font-weight: normal;
      text-align: center;
      color: green;
    }
    
    /* Style the discount information */
    .card span {
      font-size: 14px;
      font-weight: normal;
      text-align: center;
      color: red;
    }
    
    /* Style the delivery details */
    .card p:last-child {
      font-size: 12px;
      font-weight: normal;
      text-align: center;
      color: gray;
    }
    </style>
</head>
<body>
  <div class="container">
    <div class="card" id="product1">
      <img src="peanut-butter.jpg" alt="Peanut Butter">
      <h3>Pintola HIGH Protein Peanut Butter (Dark Chocolate) (1...)</h3>
      <p>₹325 19% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Validity offer</p>
    </div>
    <div class="card" id="product2">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product3">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product4">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product5">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product6">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product7">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product8">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product9">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product10">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product11">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product12">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product13">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product14">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product15">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product16">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product17">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product18">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product19">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product20">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product21">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product22">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product23">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product24">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product25">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product26">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product27">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product28">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product29">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product30">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product31">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product32">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product33">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product34">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product35">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product36">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product37">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product38">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product39">
      <img src="saffola.jpg" alt="saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product40">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product41">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product42">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product43">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product44">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product45">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product46">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product47">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product48">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product49">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product50">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product51">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product52">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product53">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product54">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product55">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product56">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product57">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product58">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product59">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product60">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product61">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product62">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product63">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product64">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product65">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product66">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product67">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product68">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product69">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>
    <div class="card" id="product70">
      <img src="saffola.jpg" alt="Saffola">
      <h3>Saffola Fritty Omega Peanut Butter (Creamy) 125G</h3>
      <p>₹265 55% off</p>
      <span>Delivery by 30th Jan</span>
      <p>Standard Offer</p>
    </div>

    <!-- Add more product cards here -->
  </div>
</body>
</html>

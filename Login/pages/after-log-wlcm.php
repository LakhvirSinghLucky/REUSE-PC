<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
  <link rel="stylesheet" href="../css/demo.css" />
  
</head>
<?php include '../material/HTML/navbar.php';

include("../../seller/pages/database.php");
$query = "SELECT * FROM products";
$findresult = mysqli_query($conn, $query);
$res = mysqli_fetch_array($findresult);
$id = $res['id'];
?>
<main>
    <div class="oneplusphone-1">
      <a href="buy--new.php?Product_id=27" class="phone-top-black"><img src="../LOGO/oneplusphone-1.jpg" id="oneplus-phone" alt="oneplusphone"></a>
    </div>
    <div class="gaming-circle">
      <div class="fw-norm-circle">
        <img src="../logo/gaming-circle.jpg" class="circle-elec" id="Gaming Laptop" alt="Gaming Laptop">
        <h2 class="fw-normal"><u>Gaming Laptops</u>
        </h2>
        <p class="lead-2">Experience the unexpected Designs, Upgraded Speed, Enhanced performance with exciting Price and Gifts.</p>
        <button class="btn-sec"><a class="button-a" href="../Gadgets/Laptops/for gaming.php" target="_blank">View details »</a></button>
      </div>
      <div class="fw-norm-circle">
        <img src="../logo/robot-circle.jpg" class="circle-elec" id="Robotics" alt="Robotics">
        <h2 class="fw-normal"><u>Robotics & Sensors</u>
        </h2>
        <p class="lead-2">Unleash the creativity in you with quality sensors, transistors, resistors and many other quality accesssories.</p>
        <button class="btn-sec"><a class="button-a" href="../Gadgets/Laptops/for gaming.php" target="_blank">View details »</a></button>
      </div>
      <div class="fw-norm-circle">
        <img src="../logo/electr-circle.jpg" class="circle-elec" id="Electronics" alt="Electronics">
        <h2 class="fw-normal"><u>Electronics</u>
        </h2>
        <p class="lead-2">Life made light with always connected, wherever you go with Top Brands through their Technology.</p>
        <button class="btn-sec"><a class="button-a" href="../Gadgets/Laptops/for gaming.php" target="_blank">View details »</a></button>
      </div>
    </div>
    <hr class="hr-ridge">
    <div class="pannel-wrap">
      <div class="electric-pannel">
        <div class="fw-norm-write">
          <h2 class="fw-normal">Apple Desktops.
            <span class="text-body">Imersed yourself in 6k.</span>
          </h2>
          <p class="lead"> Professionals require a lot from their displays. But each person has different needs. Resolution, reference modes, reliable calibration. Pro Display XDR has everything you need in a modern workflow, bringing a new level of efficiency to every production.</p>
        </div>
        <div>
          <a href="buy-portal.html" target="_blank">
            <img src="../LOGO/backhello.png" id="macbok" alt="Apple Gadgets"></a>
        </div>
      </div>
      <hr class="hr-ridge">
      <div class="electric-pannel float-left">
        <div class="fw-norm-write">
          <h2 class="fw-normal">Electronic Gadgets.
            <span class="text-body">Buy for yourself.</span>
          </h2>
          <p class="lead">Technology is not just a tool. It can give learners a voice that they may not have had before. Dreams about the future are always filled with gadgets.</p>
        </div>
        <div>
          <a href="../Gadgets/Electronics/electronics.php" target="_blank">
            <img src="../LOGO/gadgets.png" id="camera" alt="Electronics"></a>
        </div>
      </div>
      <hr class="hr-ridge">
      <div class="electric-pannel">
        <div class="fw-norm-write">
          <h2 class="fw-normal">Robotic Automation.
            <span class="text-body">& Intelligence.</span>
          </h2>
          <p class="lead">Creativity involves putting your Imagination to work. In the sense Creativity is applied Imagination, So show your Imagination throughtout the Creative things.</p>
        </div>
        <div>
          <a href="../Gadgets/Robotics/Robotics Ai.php" target="_blank">
            <img src="../LOGO/robo.png" id="robot" alt="Robotics"></a>
        </div>
      </div>
    </div>
    <hr class="hr-ridge">
    <center class="What's">What's New</center>
    <div class="galaxy-img">
      <div id="galaxy-top">
        <h1 id="galaxy-font-2">Galaxy Watch6 Classic</h1>
        <h3>Timeless aesthetics combined with cutting-edge smartwatch tech</h3>
      </div>
      <img src="../logo/watch 4 galaxy.avif" alt="watch 4 galaxy" class="watch-4">
    </div>
    <div class="wrap-container">
      <div class="container">
        <a href=""><img src="../LOGO/watch-lite-1.avif" class="Lap-M14-img" id="M14-4g" alt="sam-watch"></a>
        <div class="watch-info">
          <h2>Galaxy Watch6 Classic</h2>
          <p>
            (Bluetooth, 43mm)
          </p>
        </div>
        <div class="pricing">
          <div class="monthly-price">
            From 1233.25/mo for 24 mos at 15% Interest
          </div>
          <div class="full-price">
            <span class="strikethrough">₹ 42999.00</span>
            <span class="strike-ough">₹ 36999.00</span>
            <span class="strike">Save ₹ 6000.00</span>
          </div>
        </div>
        <button class="buy-button">Buy now</button>
      </div>
      <div class="container">
        <a href=""><img src="../LOGO/watch-lite-2.avif" class="Lap-M14-img" id="M14-4g" alt="sam-watch"></a>
        <div class="watch-info">
          <h2>Galaxy Watch6 Classic</h2>
          <p>
            (Bluetooth, 43mm)
          </p>
        </div>
        <div class="pricing">
          <div class="monthly-price">
            From 1233.25/mo for 24 mos at 15% Interest
          </div>
          <div class="full-price">
            <span class="strikethrough">₹ 42999.00</span>
            <span class="strike-ough">₹ 36999.00</span>
            <span class="strike">Save ₹ 6000.00</span>
          </div>
        </div>
        <button class="buy-button">Buy now</button>
      </div>
      <div class="container">
        <a href=""><img src="../LOGO/watch-lite-3.avif" class="Lap-M14-img" id="M14-4g" alt="sam-watch"></a>
        <div class="watch-info">
          <h2>Galaxy Watch6 Classic</h2>
          <p>
            (Bluetooth, 43mm)
          </p>
        </div>
        <div class="pricing">
          <div class="monthly-price">
            From 1233.25/mo for 24 mos at 15% Interest
          </div>
          <div class="full-price">
            <span class="strikethrough">₹ 42999.00</span>
            <span class="strike-ough">₹ 36999.00</span>
            <span class="strike">Save ₹ 6000.00</span>
          </div>
        </div>
        <button class="buy-button">Buy now</button>
      </div>
      <div class="container">
        <a href=""><img src="../LOGO/watch-lite-4.webp" class="Lap-M14-img" id="M14-4g" alt="sam-watch"></a>
        <div class="watch-info">
          <h2>Galaxy Watch6 Classic</h2>
          <p>
            (Bluetooth, 43mm)
          </p>
        </div>
        <div class="pricing">
          <div class="monthly-price">
            From 1233.25/mo for 24 mos at 15% Interest
          </div>
          <div class="full-price">
            <span class="strikethrough">₹ 42999.00</span>
            <span class="strike-ough">₹ 36999.00</span>
            <span class="strike">Save ₹ 6000.00</span>
          </div>
        </div>
        <button class="buy-button">Buy now</button>
      </div>
    </div>
    <marquee behavior="" scrollamount="14" direction="left">Free delivery on the above order of ₹ 500</marquee>
    <div class="buy-portal">
      <a href="buy--new.php?Product-id=15"><img src="../logo/i-13.jpg" id="i-phone13" alt="i-phone13"></a>
    </div>
    <label for="gif-buds" id="gif-buds">Explore the unexplored quality buds</label>
    <div class="gif-buds" id="gif-buds">
      <a href=""><img src="../LOGO/1_.gif" class="Buds-gif" alt="Buds"></a>
      <a href=""><img src="../logo/3.gif" class="Buds-gif" alt="Buds"></a>
    </div>
</main>

<a href="after-log-wlcm.php" class="up-btn-foot">
  <img width="50" height="50" id="up-btn-foot" src="../LOGO/up.png" alt="Back to Top">
</a>

<footer>
  <?php include '../material/html/footer.html'; ?>
</footer>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Cafeteria</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
  /*Nav bar section*/
  a {
    text-decoration: none;
  }

  ul {
    list-style: none;
  }

  /* Header Styling */
  header {
    background: #2d6187;
    color: #fff;
    padding: 20px 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .logo {
    font-size: 1.8rem;
    font-weight: bold;
  }

  .nav-links {
    display: flex;
    gap: 20px;
  }

  .nav-links a {
    color: #fff;
    font-weight: 500;
    padding: 8px 12px;
    transition: background 0.3s;
  }

  .nav-links a:hover {
    background: #1a3955;
    border-radius: 5px;
  }

  /* Header Section */
  .header {
    text-align: center;
    padding: 200px 20px;
    background: linear-gradient(rgba(45, 97, 135, 0.9), rgba(0, 0, 0, 0.5)),
      url("https://via.placeholder.com");
    color: #fff;
    transition: background 0.3s ease, color 0.3s ease, padding 0.3s ease;
  }

  /* Add hover effect for transition */
  .header:hover {
    background: linear-gradient(rgba(5, 5, 97, .9), rgba(0, 0, 0, 0.7)),
      url("https://via.placeholder.com");
    color: #fff;
    /* Change text color on hover */
    padding: 220px 20px;
    /* Slightly increase padding */
  }


  .header h1 {
    font-size: 2.5rem;
    margin: 0;
    animation: fadeInDown 1.5s;
  }

  .header p {
    font-size: 1.2rem;
    margin-top: 10px;
    animation: fadeInUp 1.5s;
  }

  /*.cta-button {
    margin-top: 20px;
    padding: 10px 20px;
    background: #8361ff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s;
  }

  .cta-button:hover {
    background: #e55a4f;
  }*/
  /* Student talk section */
  :root {
    --rotate-speed: 40;
    --count: 8;
    /* Default count, the DOM element should override this */
    --easeInOutSine: cubic-bezier(0.37, 0, 0.63, 1);
    --easing: cubic-bezier(0.000, 0.37, 1.000, 0.63);
  }


  .void {
    width: 60%;
    max-width: 1024px;
    margin: auto;
    position: relative;
    aspect-ratio: 1 / 1;
  }

  ul:hover * {
    animation-play-state: paused;
  }

  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    position: relative;
    width: 100%;
    aspect-ratio: 1 / 1;
    outline: 2px dotted magenta;
    z-index: 1;
  }

  li {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    /* outline: 1px dashed rgba(55, 0, 255, 0.5);  */
    width: 100%;
    animation: rotateCW calc(var(--rotate-speed) * 1s) var(--easing) infinite;
  }

  .card {
    width: 27%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 16px 24px;
    gap: 8px;
    background: #FFFFFF;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1), 0px 16px 32px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    color: #535062;
    animation: rotateCCW calc(var(--rotate-speed) * 1s) var(--easing) infinite;
  }

  a {
    text-decoration: none;
    color: unset;
  }

  .model-name {
    font-weight: 500;
    font-size: 18px;
    line-height: 150%;
    color: #3B2ED0;
    display: block;
  }

  svg {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 0;
  }

  li:nth-child(2),
  li:nth-child(2) .card {
    animation-delay: calc((var(--rotate-speed)/var(--count)) * -1s);
  }

  li:nth-child(3),
  li:nth-child(3) .card {
    animation-delay: calc((var(--rotate-speed)/var(--count)) * -2s);
  }

  li:nth-child(4),
  li:nth-child(4) .card {
    animation-delay: calc((var(--rotate-speed)/var(--count)) * -3s);
  }

  li:nth-child(5),
  li:nth-child(5) .card {
    animation-delay: calc((var(--rotate-speed)/var(--count)) * -4s);
  }

  li:nth-child(6),
  li:nth-child(6) .card {
    animation-delay: calc((var(--rotate-speed)/var(--count)) * -5s);
  }

  li:nth-child(7),
  li:nth-child(7) .card {
    animation-delay: calc((var(--rotate-speed)/var(--count)) * -6s);
  }

  li:nth-child(8),
  li:nth-child(8) .card {
    animation-delay: calc((var(--rotate-speed)/var(--count)) * -7s);
  }

  @keyframes rotateCW {
    from {
      transform: translate3d(0px, -50%, -1px) rotate(-45deg);
    }

    to {
      transform: translate3d(0px, -50%, 0px) rotate(-315deg);
    }
  }

  @keyframes rotateCCW {
    from {
      transform: rotate(45deg);
    }

    to {
      transform: rotate(315deg);
    }
  }

  @keyframes pulseGlow {
    from {
      background-size: 60%;
    }

    to {
      background-size: 100%;
    }
  }

  .center-circle {
    position: absolute;
    width: 60px;
    aspect-ratio: 1 / 1;
    left: 50%;
    top: 30%;
    transform: translate(-50%, -50%);
    background: #FFFFFF;
    box-shadow: 0px 18px 36px -18px rgba(12, 5, 46, 0.3), 0px 30px 60px -12px rgba(12, 5, 46, 0.25);
    border-radius: 50%;
  }

  .second-circle {
    position: absolute;
    width: 40%;
    aspect-ratio: 1 / 1;
    left: 50%;
    top: 10%;
    transform: translate(-50%, -50%);
    background: #F5F4FE;
    opacity: 0.5;
    box-shadow: 0px 18px 36px -18px rgba(12, 5, 46, 0.3), 0px 30px 60px -12px rgba(12, 5, 46, 0.25);
    border-radius: 50%;
  }

  .last-circle {
    position: absolute;
    width: 66%;
    aspect-ratio: 1 / 1;
    left: 50%;
    top: 8%;
    transform: translate(-50%, -50%);
    background: #F5F4FE;
    opacity: 0.25;
    box-shadow: 0px 18px 36px -18px rgba(12, 5, 46, 0.3), 0px 30px 60px -12px rgba(12, 5, 46, 0.25);
    border-radius: 50%;
  }

  .crop {
    -webkit-mask-image: linear-gradient(90deg, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1));
  }

  .mask {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 50%;
    height: 60%;
    animation: pulseGlow 5s linear infinite alternate;
    background-position: 50%;
    background-repeat: no-repeat;
    background-image: radial-gradient(50% 50% at 100% 50%, rgba(60, 26, 229, 0.25) 0%, rgba(60, 26, 229, 0.247904) 11.79%, rgba(59, 26, 229, 0.241896) 21.38%, rgba(58, 26, 229, 0.2324) 29.12%, rgba(57, 26, 229, 0.219837) 35.34%, rgba(55, 26, 229, 0.20463) 40.37%, rgba(53, 26, 229, 0.1872) 44.56%, rgba(51, 26, 229, 0.16797) 48.24%, rgba(48, 26, 229, 0.147363) 51.76%, rgba(46, 26, 229, 0.1258) 55.44%, rgba(44, 26, 229, 0.103704) 59.63%, rgba(41, 26, 229, 0.0814963) 64.66%, rgba(39, 26, 229, 0.0596) 70.88%, rgba(36, 26, 229, 0.038437) 78.62%, rgba(34, 26, 229, 0.0184296) 88.21%, rgba(32, 26, 229, 0) 100%);
  }

  .mask:after {
    content: "";
    position: absolute;
    width: 1px;
    height: 50%;
    right: 0;
    display: block;
    background-image: linear-gradient(180deg, rgba(60, 26, 229, 0) 0%, #3C1AE5 50%, rgba(60, 26, 229, 0) 100%);
  }

  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
  }


  /* About Section */
  .about-section {
    padding: 50px 20px;
    background-color: white;
  }

  .about-section h2 {
    text-align: center;
    color: #333;
  }

  .about-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-top: 30px;
  }

  .about-content img {
    width: 40%;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .about-content p {
    flex: 1;
    font-size: 1rem;
    line-height: 1.6;
  }


  /* Reviews Section 
  .reviews-section {
    padding: 50px 20px;
  }

  .reviews-section h2 {
    text-align: center;
    margin-bottom: 20px;
  }

  .review {
    background: white;
    margin: 10px 0;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .review h3 {
    margin: 0;
    color: #555;
  }

  .review p {
    margin: 5px 0 0;
    color: #777;
  }*/

  /* Comment Section */
  .comment-section {
    padding: 50px 20px;
    background: #f4f4f4;
  }

  .comment-section h2 {
    text-align: center;
    margin-bottom: 20px;
  }

  .comment-form {
    max-width: 600px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
  }

  .comment-form textarea {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical;
  }

  .comment-form button {
    background-color: #ff6f61;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    transition: background 0.3s;
  }

  .comment-form button:hover {
    background-color: #e55a4f;
  }

  /* Our Team Section*/
  @import url("https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }


  .container {
    width: 100%;
    display: flex;
    justify-content: center;
    height: 300px;
    gap: 10px;

    >div {
      flex: 0 0 120px;
      border-radius: 0.5rem;
      transition: 0.5s ease-in-out;
      cursor: pointer;
      box-shadow: 1px 5px 15px #1e0e3e;
      position: relative;
      overflow: hidden;

      &:nth-of-type(1) {
        background: url("image/mk.jpg") no-repeat 50% / cover;
      }

      &:nth-of-type(2) {
        background: url("image/anth.jpg") no-repeat 50% / cover;
      }


      &:nth-of-type(3) {
        background: url("image/debby.jpg") no-repeat 50% / cover;
      }

      &:nth-of-type(4) {
        background: url("image/gold.jpg") no-repeat 50% / cover;
      }

      &:nth-of-type(5) {
        background: url("image/sam.jpg") no-repeat 50% / cover;
      }

      .content {
        font-size: 1.5rem;
        color: #fff;
        display: flex;
        align-items: center;
        padding: 15px;
        opacity: 0;
        flex-direction: column;
        height: 100%;
        justify-content: flex-end;
        background: rgb(2, 2, 46);
        background: linear-gradient(0deg,
            rgba(2, 2, 46, 0.6755077030812324) 0%,
            rgba(255, 255, 255, 0) 100%);
        transform: translatey(100%);
        transition: opacity 0.5s ease-in-out, transform 0.5s 0.2s;
        visibility: hidden;

        span {
          display: block;
          margin-top: 5px;
          font-size: 1.2rem;
        }
      }

      &:hover {
        flex: 0 0 250px;
        box-shadow: 1px 3px 15px #7645d8;
        transform: translatey(-30px);
      }

      &:hover .content {
        opacity: 1;
        transform: translatey(0%);
        visibility: visible;
      }
    }
  }



  /* Our Team Section 
  .team-section {
    padding: 20px 100px 20px ;
    background: #ffffff;
    text-align: center;
  }

  .team-section h2 {
    margin-bottom: 20px;
  }

  .team-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
  }

  .team-member {
    background: #f4f4f4;
    border-radius: 10px;
    padding: 20px;
    width: 200px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
  }

  .team-member:hover {
    transform: translateY(-10px);
  }

  .team-member img {
    width: 170px;
    height: 200px;
    border-radius: 20%;
    margin-bottom: 10px;
  }

  .team-member h3 {
    margin: 0;
    font-size: 1.2rem;
  }

  .team-member p {
    color: #555;
    font-size: 0.9rem;
  }

  @keyframes fadeInDown {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }*/

  /* Footer styling */
  footer {
    text-align: center;
    padding: 20px;
    background: #2d6187;
    color: #fff;
    font-size: 0.9rem;
    width: 100%;
    margin-top: 30px;
  }

  footer a {
    color: #fff;
    font-weight: 500;
  }
  </style>
</head>

<body>
  <header>
    <div class="logo">CafeteriaHub</div>
    <nav>
      <ol class="nav-links">
        <p><a href="index.php">Home</a></p>
        <p><a href="about.php">About</a></p>
        <p><a href="contact.php">Contact</a></p>
        <p><a href="login.php">Login</a></p>
      </ol>
    </nav>
  </header>
  <div class="header">
    <h1>Welcome to Our Cafeteria</h1>
    <p>Your comfort, our priority. Discover why we stand out!</p>
  </div>

  <div class="about-section">
    <h2>About Us</h2>
    <div class="about-content">
      <img src="image/cafeteria.jpg" alt="About Image">
      <p>Our cafeteriaHub is dedicated to providing exceptional service. We believe in creating a
        welcoming space for everyone and a hub where technology meets tradition. While you enjoy the timeless flavors in
        the cafeteria, we take care of making the process simple, efficient, and enjoyable.

        Join the thousands of satisfied users who have discovered the easiest way to enjoy their cafeteria dining
        experience. Cafeteria Hub is more than a platform; it's your go-to partner for delicious meals and an enhanced
        cafeteria experience.</p>
    </div>
  </div>

  <!--<div class="testimonial-section">
    <h2>What Students Say</h2>
    <div class="carousel-container">
      <div class="carousel">
        <div class="carousel-card">
          <img src="https://via.placeholder.com/60" alt="User">
          <p><strong>Jane Doe</strong></p>
          <p>"The food here is amazing! Highly recommend the pasta dishes."</p>
        </div>
        <div class="carousel-card">
          <img src="https://via.placeholder.com/60" alt="User">
          <p><strong>John Smith</strong></p>
          <p>"I love the cozy atmosphere and friendly staff. Will visit again!"</p>
        </div>
        <div class="carousel-card">
          <img src="https://via.placeholder.com/60" alt="User">
          <p><strong>Sarah Lee</strong></p>
          <p>"A wonderful place to unwind after classes. Highly recommended!"</p>
        </div>
      </div>
    </div>
  </div> -->
  <!-- ***************** -->
  <div class="void" id="void">
    <center>
      <h2>What Students Say</h2>
    </center>
    <div class="crop">
      <ul id="card-list" style="--count: 6;">
        <li>
          <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly
                dimensional, mostly numeric, tabular data</span></a></div>
        </li>
        <li>
          <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly
                dimensional, mostly numeric, tabular data</span></a></div>
        </li>
        <li>
          <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly
                dimensional, mostly numeric, tabular data</span></a></div>
        </li>
        <li>
          <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly
                dimensional, mostly numeric, tabular data</span></a></div>
        </li>
        <li>
          <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly
                dimensional, mostly numeric, tabular data</span></a></div>
        </li>
        <li>
          <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for generating highly
                dimensional, mostly numeric, tabular data</span></a></div>
        </li>
      </ul>
      <div class="last-circle"></div>
      <div class="second-circle"></div>
    </div>
    <div class="mask"></div>
    <div class="center-circle"></div>
    <div>

      <!--<div class="reviews-section">
    <h2>User Reviews</h2>
    <div class="review">
      <h3>Anna K.</h3>
      <p>"Excellent service and delicious food!"</p>
    </div>
    <div class="review">
      <h3>Michael L.</h3>
      <p>"A great place to relax and enjoy a good meal."</p>
    </div>
  </div>

  <div class="comment-section">
    <h2>Leave a Comment</h2>
    <form class="comment-form">
      <textarea rows="4" placeholder="Your comment..."></textarea>
      <button type="submit">Submit</button>
    </form>
  </div>-->


      <!-- ********** -->
      <div class="container">
        <div>
          <div class="content">
            <h3>Mary Akinyode.K</h3>
            <span>Team leader</span>
          </div>
        </div>
        <div>
          <div class="content">
            <h3>Anthony Ken-igbinosa</h3>
            <span>Backend Developer</span>
          </div>
        </div>
        <div>
          <div class="content">
            <h>Deborah Chukwuokike.C</h3>
              <span>Frontend Developer</span>
          </div>
        </div>
        <div>
          <div class="content">
            <h3>Gold Ojone.O</h3>
            <span>Researcher</span>
          </div>
        </div>
        <div>
          <div class="content">
            <h2>Samuel Iyanuoluwa .S</h2>
            <span>Coordinator</span>
          </div>
        </div>
      </div>
      <!--<div class="team-section">
    <h2>Our Team</h2>
    <div class="team-container">
      <div class="team-member">
        <img src="image/mk.jpg" alt="Team Member">
        <h3>Mary Akinyode.k</h3>
        <p>Team leader</p>
      </div>
      <div class="team-member">
        <img src="image/anth.jpg" alt="Team Member">
        <h3>Anthony Ken-igbinosa</h3>
        <p>Backend Developer</p>
      </div>
      <div class="team-member">
        <img src="image/debby.jpg" alt="Team Member">
        <h3>Deborah Chukwuokike.c</h3>
        <p>Frontend Developer</p>
      </div>
      <div class="team-member">
        <img src="image/gold.jpg" alt="Team Member">
        <h3>Gold Ojone Omojo</h3>
        <p>Researcher</p>
      </div>
     
    </div>
  </div>-->
      <!-- Footer -->
      <footer>
        <p>&copy; 2024 School Cafeteria. All Rights Reserved | <a href="#">Privacy Policy</a></p>
      </footer>

</body>

</html>
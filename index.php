<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet"/>

    <title>Qrúca</title>

   <style>
    :root {
  --background-color: #006A4C;
  --primary-color: #ed9b59;
  --dark-color: #1a1d32;
  --grey-color: #808080;
  --white-color: #ffffff;
  --brown-color: #b25e21;
  --black-color: #000000;
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  font-family: "Rubik", sans-serif;
  overflow-x: hidden;
}
header {
  background: var(--background-color);
}

.logo-container {
  flex: 0.3;
}

.logo {
  width: 100px;
}

.nav {
  position: relative;
  height: 8vh;
  display: flex;
  align-items: center;
  padding: 0 40px;
  z-index: 2;
  width: 100%;
}
.list-items {
  display: flex;
  flex: 0.7;
  justify-content: space-between;
  align-items: center;
  transition: 0.2s;
}

.list {
  list-style: none;
}

.link {
  color: var(--white-color);
  text-decoration: none;
  font-weight: bold;
  position: relative;
}
.link::before {
  content: "";
  position: absolute;
  height: 7px;
  width: 7px;
  border-radius: 5px;
  background: var(--white-color);
  top: 25px;
  left: 50%;
  transform: translateX(-50%) scale(0);
}
.link:hover {
  color: var(--white-color);
}

.link:hover::before {
  transform: scale(1) translateX(-50%);
}

.btn-container {
  display: flex;
  width: 350px;
  justify-content: space-between;
  padding-left: 100px;
}
.btn {
  padding: 15px 30px;
  background: var(--background-color);
  font-family: "Rubik";
  color: var(--white-color);
  border-radius: 40px;
  text-decoration: none;
  font-weight:normal;
  border: none;
}

.btn-secondary {
  color: var(--background-color);
  transition: 0.2s;
  border: solid 1px var(--background-color);
  background: var(--white-color);
  transition: 0.4s;
}

.btn-secondary:hover {
  background: var(--background-color);
  color: var(--white-color);
}

.container-left,
.container-right {
  z-index: 1;
  flex: 1;
}

.container-left {
  padding-top: 100px;
  padding-left: 40px;
  position: relative;
}

.container {
  display: flex;
  min-height: 92vh;
}
.couples-img {
  width: 100%;
  height: 100%;
}

.text-small {
  color: white;
  font-weight: bold;
}
.title {
  margin-top: 20px;
  font-size: 4.2rem;
}

.title-s {
  color: var(--white-color);
}

.text {
  margin-top: 20px;
  font-size: 23px;
  line-height: 40px;
  width: 80%;
  color: var(--black-color);
}

.input-container {
  display: flex;
  align-items: center;
  margin-top: 20px;
  width: 80%;
  height: 60px;
  background: var(--white-color);
  border-radius: 30px;
  padding-left: 20px;
  padding-right: 10px;
  box-shadow: 0px 10px 30px 10px rgba(0, 0, 0, 0.1);
}

.input-container input {
  color: var(--black-color);
  border: none;
  font-size: 15px;
  flex: 1;
  margin-left: 10px;
  outline: none;
}

.wave-left {
  position: absolute;
  z-index: -1;
  bottom: 0;
  left: 0;
}

.wave-right {
  position: absolute;
  z-index: -1;
  right: 0;
  top: 0;
}

.details-img {
  position: absolute;
  width: 50%;
  bottom: 0;
  right: -150px;
}

.stats-container {
  margin-top: 100px;
  margin-bottom: 40px;
  display: flex;
  justify-content: space-between;
}

.stats {
  width: 25%;
}

.stats-title {
  font-size: 4rem;
  color: var(--dark-color);
}

.stats-title-brown {
  color: var(--white-color);
}

.stats-text {
  color: var(--dark-color);
  font-size: 18px;
  margin-top: 20px;
}
.menu-btn {
  position: absolute;
  width: 30px;
  right: 20px;
  display: none;
}

.list-items.open {
  top: 0;
}

.couples-img-mobile {
  display: none;
}
@media (max-width: 1230px) {
  .title {
    font-size: 3rem;
  }
  .menu-btn {
    display: block;
  }
  .container {
    padding-top: 100px;
    flex-direction: column-reverse;
  }
  .stats-container {
    margin-top: 40px;
  }

  .nav {
    position: fixed;
    background: var(--background-color);
    height: 60px;
  }

  .logo-container {
    background: var(--background-color);
    display: flex;
    flex: 1;
    z-index: 1;
    align-items: center;
    height: 100%;
  }
  .container-right {
    width: 100%;
  }
  .container-left {
    width: 100%;
    padding: 40px;
  }
  .details-img {
    display: none;
  }
  .input-container {
    width: 100%;
  }

  .text {
    width: 100%;
    font-size: 18px;
    line-height: 32px;
  }

  .list-items {
    position: absolute;
    flex-direction: column;
    width: 100%;
    background: var(--background-color);
    left: 0;
    padding: 40px;
    top: -400px;
  }
  .list {
    margin-top: 25px;
    font-size: 14px;
  }
  .btn-container {
    flex-direction: column;
    align-items: center;
    padding: 0;
  }

  .wave-right,
  .wave-left {
    display: none;
  }

  .input-container input {
    width: 80%;
    font-size: 13px;
  }

  .stats-title {
    font-size: 2.2rem;
  }

  .stats-text {
    font-size: 15px;
  }
  .btn {
    padding: 10px 20px;
    font-size: 14px;
  }

  .couples-img-mobile {
    display: block;
  }
  .couples-img-desktop {
    display: none;
  }
}

   </style>

  </head>
  <body>
    <header>
      <nav class="nav">
        <div class="logo-container">
          <img class="logo" src="src/newKruca-removebg-preview.png" alt="logo" />
          <img src="src/menu.png" class="menu-btn" id="menu-btn" />
        </div>
        <ul class="list-items">
          <li class="list">
            <a href="#" class="link">Home</a>
          </li>
          <li class="list">
            <a href="#" class="link">About</a>
          </li>
          <li class="list">
            <a href="#" class="link">Privacy</a>
          </li>
          <li class="list">
            <a href="#" class="link">Contact</a>
          </li>
          <div class="btn-container">
            <li class="list">
<!--              <a href="login.html" class="btn btn-secondary">Login</a>-->
            </li>
          </div>
        </ul>
      </nav>
      <div class="container">
        <div class="container-left">
          <h1 class="title">
            Welcome <span class="title-s">to</span> Qrúca,
          </h1>
          <p class="text">
            Find your right model with just a button click away.
          </p>
          <div class="input-container">
            <img src="src/mail.png" class="input-icon" />
            <input placeholder="click on the button" />
            <a href="./portfolio/appPortfolio.php"><button class="btn" >find a model</button></a>
          </div>
          <div class="stats-container">
            <div class="stats">
              <h1 class="stats-title">15k+</h1>
              <p class="stats-text">Dates and matches made everyday</p>
            </div>

            <div class="stats">
              <h1 class="stats-title stats-title-brown">1,456</h1>
              <p class="stats-text">New members signup every day</p>
            </div>

            <div class="stats">
              <h1 class="stats-title">1M+</h1>
              <p class="stats-text">Members from around the world</p>
            </div>
          </div>
          <img src="src/wave-left.png" class="wave-left" />
        </div>

        <div class="container-right">
          <img
            class="couples-img couples-img-desktop"
            src="src/pexels-anna-shvets-5187493-removebg.png"
            alt=""
          />
          <img
            class="couples-img couples-img-mobile"
            src="src/pexels-anna-shvets-5187493-removebg.png"
            alt=""
          />
          <img src="src/details.png" class="details-img" />
          <img src="src/wave-right.png" class="wave-right" />
        </div>
      </div>

    </header>
  </body>

  <script>
    document.querySelector("#menu-btn").addEventListener("click", () => {
  document.querySelector(".list-items").classList.toggle("open");
});
  </script>
  
</html>

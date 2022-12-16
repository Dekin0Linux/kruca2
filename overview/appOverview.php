<?php

session_start();
include '../db/db.php';

$modelID = '';

if(isset($_GET['userId'])){
    $modelID = $_GET['userId'];
    
    $getModel = "SELECT * FROM model WHERE id = '$modelID' ";
    $query = mysqli_query($conn,$getModel) or die($conn);
    
    while($row = mysqli_fetch_assoc($query)){
        $model = $row['id'];
        $name = $row['fullName'];
        $description = $row['description'];
        $interest = $row['interest'];
        $bodyType = $row['bodyType'];
        $amount = $row['amount'];
        $img1 = $row['image'];
        $img2 = $row['image2'];
        
        $_SESSION['model'] = $model;
    }
}else{
    header('location: ../portfolio/appPortfolio.php');
}




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- displays site properly based on user's device -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    
<!--    BS CSS-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Qrúca</title>

    <style>
      :root {
  /*  Primary */
  --orange: #006A4C;
  --pale-orange: hsl(25, 100%, 94%);

  /* Neutral */

  --very-dark-blue: hsl(220, 13%, 13%);
  --dark-grayish-blue: hsl(219, 9%, 45%);
  --grayish-blue: hsl(220, 14%, 75%);
  --light-grayish-blue: hsl(223, 64%, 98%);
  --white: hsl(0, 0%, 100%);
  /* with 75% opacity for lightbox background */
  --black: hsl(0, 0%, 0%);

  /* Pseudo element txt */
  --pseudo-text: "0";
}

html {
  font-size: 62.5%;
  box-sizing: border-box;
}

*,
*::before,
*::after {
  padding: 0;
  margin: 0;
  box-sizing: inherit;
}

/*/////////////
Main CSS
 //////////////*/

body {
  font-family: "Kumbh Sans", sans-serif;
  position: relative;
}

.body-wrapper {
  position: absolute;
  z-index: 50;
}

/*/////////////
Overlay image modal
 //////////////*/

.overlay-container {
  display: none;
  z-index: 1000;
  width: 100%;
  height: 100%;
  position: fixed;
  background-color: rgba(0, 0, 0, 0.5);
}

.item-overlay {
  max-width: 50rem;
  padding-top: 5rem;
  margin: auto;
  display: flex;
  flex-direction: column;
  gap: 2.5rem;
}

.item-overlay__btn {
  align-self: flex-end;
  background: none;
  border: none;
  filter: invert(52%) sepia(14%) saturate(3126%) hue-rotate(344deg)
    brightness(107%) contrast(102%);
  cursor: pointer;
}

.item-overlay__mainImg {
  position: relative;
}

.item-overlay__img {
  align-self: center;
  width: 100%;
  height: 100%;
  border-radius: 5%;
}

.overlay-btn {
  position: absolute;
  top: 50%;
  padding: 1.6rem 2rem;
  border: none;
  border-radius: 50%;
  background-color: var(--white);
  cursor: pointer;
}

.item-overlay__btnlft-img {
  transform: rotate(180deg);
}

.overlay-btn:hover .overlay-btn__img {
  filter: invert(52%) sepia(14%) saturate(3126%) hue-rotate(344deg)
    brightness(107%) contrast(102%);
}

.item-overlay__btnlft {
  left: 0;
  transform: translateX(-50%);
}

.item-overlay__btnrgt {
  right: 0;
  transform: translateX(50%);
}

.overlay-img__btns {
  align-self: center;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
}

.overlay-img__btn {
  display: block;
  cursor: pointer;
  background: none;
  border: none;
  border-radius: 10%;
  transition: all 0.3s;
  position: relative;
}

.overlay-img__btn::after {
  content: "";
  max-width: 100%;
  height: 100%;
  background-color: var(--white);
  border-radius: 10%;
  border: 3px solid transparent;
  margin: auto;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  opacity: 0;
}

.overlay-img__btn:hover {
  background-color: var(--orange);
}

.overlay-img__btn:hover::after {
  border: 3px solid var(--orange);
  opacity: 0.5;
}

.overlay-img__btn-img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 10%;
  transition: all 0.3s;
  transform-origin: bottom;
}

/*/////////////
 Header 
 //////////////*/
.head {
  max-width: 80%;
  padding-top: 5rem;
  margin: 0 auto 15rem;
  display: flex;
  justify-content: space-between;
  position: relative;
}

.head::after {
  content: "";
  height: 0.1px;
  width: 100%;
  background-color: var(--grayish-blue);
  position: absolute;
  bottom: -5rem;
  left: 0;
  margin-top: 5rem;
}

.head-lft {
  display: flex;
  align-items: center;
  gap: 2.5rem;
}

.head-lft__btn {
  display: none;
  padding-top: 0.9rem;
}

.head-nav {
  list-style: none;
  font-size: 1.7rem;
  color: var(--dark-grayish-blue);
  display: flex;
  gap: 2.25rem;
}

.head-nav__item {
  position: relative;
  cursor: pointer;
}

.head-nav__item::after {
  content: "";
  position: absolute;
  bottom: -6.8rem;
  left: 0;
  height: 3px;
  width: 100%;
  transform: scale(0);
  background-color: var(--orange);
  transition: transform 0.3s;
  transform-origin: center;
}

.head-nav__item:hover::after {
  transform: scale(1);
}

.head-nav__btn {
  display: none;
}

.head-rgt {
  display: flex;
  gap: 5rem;
  position: relative;
}

.head-rgt::after {
  content: attr(data-content);
  height: 1.7rem;
  width: 2.7rem;
  padding: 0.1rem 0.15rem;
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--white);
  text-align: center;
  border-radius: 10px;
  background-color: var(--orange);
  position: absolute;
  top: -0.5rem;
  left: -1rem;
  display: var(--display, none);
}

.head-rgt__img {
  height: 5.5rem;
  width: 5.5rem;
  border-radius: 100px;
  border: 0.3rem solid transparent;
  cursor: pointer;
}

.head-rgt__img:hover {
  border: 0.3rem solid var(--orange);
}

.head-rgt__btn {
  background: none;
  border: none;
  cursor: pointer;
}

/* Btn stylling */
.btn--orange {
  padding: 2rem 5rem;
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--white);
  background-color:#006A4C;
  border: none;
  border-radius: 1rem;
  cursor: pointer;
}

/* //////////////////
Cart  stylling
/////////////////////// */
.head-cart {
  z-index: 100;
  padding: 3rem 2rem;
  width: 36rem;
  background-color: var(--white);
  box-shadow: 0px 10px 25px 3px rgba(0, 0, 0, 0.5);
  border-radius: 1rem;
  position: absolute;
  top: 15%;
  right: 15%;
  display: flex;
  flex-direction: column;
  gap: 4rem;
  visibility: hidden;
}

.head-cart__heading {
  position: relative;
  font-size: 1.5rem;
}

.head-cart__heading::before {
  content: "";
  width: 112.5%;
  height: 1px;
  background-color: var(--grayish-blue);
  position: absolute;
  top: 3.5rem;
  left: -2rem;
}

.head-cart__txt {
  font-size: 1.5rem;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  visibility: hidden;
}

.head-cart__btn {
  align-self: center;
  width: 100%;
}

.head-cart__item-wrapper {
  display: flex;
  align-items: start;
  gap: 2.5rem;
}
.head-cart__item {
  display: flex;
  flex-direction: column;
  gap: 2rem;
  visibility: hidden;
}

.head-cart__item-img {
  width: 5rem;
  height: 5rem;
  border-radius: 0.5rem;
}

.head-cart__item-btn {
  align-self: center;
  background: none;
  border: none;
  cursor: pointer;
}

.head-cart__des {
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.head-cart__des-txt {
  font-size: 1.5rem;
  line-height: 1.5;
}

.head-cart__price {
  display: flex;
  gap: 1rem;
  font-size: 1.5rem;
}

.head-cart__price-total {
  font-weight: 700;
}

/* //////////////////
Product section stylling
/////////////////////// */

.item {
  padding: 0 3rem;
  max-width: 134rem;
  margin: auto;
  display: grid;
  grid-template-columns: 0.8fr 1fr;
  gap: 10rem;
}

/* Left img container stylling */
.img-main {
  max-width: 100%;
  border-radius: 5%;
  cursor: pointer;
  margin-bottom: 3.5rem;
}

.img-main__btn {
  display: none;
}

.img-btns {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
}

.img-btn {
  display: block;
  cursor: pointer;
  background: none;
  border: none;
  border-radius: 10%;
  transition: all 0.3s;
  position: relative;
}

.img-btn::after {
  content: "";
  max-width: 100%;
  height: 100%;
  background-color: var(--white);
  border-radius: 10%;
  border: 3px solid transparent;
  margin: auto;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  opacity: 0;
}
.img-btn:hover {
  background-color: var(--orange);
}

.img-btn:hover::after {
  border: 3px solid var(--orange);
  opacity: 0.5;
}

.img-btn__img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 10%;
  border: 3px solid transparent;
  transition: all 0.3s;
  transform-origin: bottom;
}

/*Right item details stylling */
.price {
  margin-top: 3.5rem;
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.price-sub__heading {
  text-transform: uppercase;
  letter-spacing: 1.5px;
  font-size: 1.5rem;
  font-weight: 700;
  text-align: center;
  color:#006A4C;
}

.price-main__heading {
  font-size: 2rem;
  font-weight: 200;
}

.price-txt {
  margin-top: 2rem;
  font-size: 1.8rem;
  color: var(--dark-grayish-blue);
  line-height: 1.5;
}

.price-box {
  display: flex;
  flex-direction: column;
  gap: 2.5rem;
}

.price-box__main {
  display: flex;
  gap: 1rem;
  align-items: center;
}

.price-box__main-new {
  font-size: 3.5rem;
  font-weight: 700;
}

.price-box__main-discount {
  border: none;
  padding: 0.5rem 1.25rem;
  background-color: var(--pale-orange);
  border-radius: 0.5rem;
  font-size: 1.7rem;
  font-weight: 700;
  color: var(--orange);
}

.price-box__old {
  font-size: 1.5rem;
  color: var(--grayish-blue);
  position: relative;
}

.price-box__old::after {
  content: "";
  height: 1px;
  width: 9%;
  background-color: var(--grayish-blue);
  position: absolute;
  left: 0;
  top: 50%;
}

.price-btnbox {
  margin-top: 2rem;
}

.price-btnbox {
  display: flex;
  gap: 2.5rem;
}

.price-btns {
  width: 30%;
  padding: 1.5rem 1.25rem;
  border: none;
  background-color: var(--light-grayish-blue);
  border-radius: 1rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 3.5rem;
}

.price-btn {
  border: none;
  background: none;
  cursor: pointer;
  height: 100%;
  color: #006A4C !important;
}

.price-btn__txt {
  font-size: 1.7rem;
  font-weight: 700;
}

.price-cart__btn {
  width: 50%;
  box-shadow: 0px 10px 25px 3px #006A4C;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 1.5rem;
}

/* Attribution */
.attribution {
  margin-top: 7rem;
  font-size: 11px;
  text-align: center;
}
.attribution a {
  color: hsl(228, 45%, 44%);
}

/*/////////////
Media Queries
 //////////////*/
@media only screen and (max-width: 1600px) {
  .head {
    max-width: 100%;
    margin-left: 3rem;
    margin-right: 3rem;
  }

  .head-cart {
    right: 10%;
  }
}

@media only screen and (max-width: 1100px) {
  html {
    font-size: 50%;
  }
  .head {
    max-width: 100%;
    margin-left: 3rem;
    margin-right: 3rem;
  }

  .price {
    margin-top: 0.5rem;
  }
  .head {
    max-width: 100%;
    margin-left: 3rem;
    margin-right: 3rem;
  }
}

@media only screen and (max-width: 850px) {
  .overlay-container {
    display: none;
  }

  .head {
    position: unset;
    max-width: 100%;
    margin-top: 0;
    margin-bottom: 5rem;
  }

  .head::after {
    display: none;
  }

  .head-nav__item::after {
    display: none;
  }

  .item {
    padding: 0;
    grid-template-columns: 1fr;
    gap: 5rem;
  }

  .img {
    position: relative;
  }

  .img-main {
    border-radius: 0;
  }

  .img-main__btn {
    display: block;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    padding: 2rem 2.6rem;
    border: none;
    border-radius: 100px;
    cursor: pointer;
  }

  .img-main__btn:hover .img-main__btn-img {
    filter: invert(52%) sepia(14%) saturate(3126%) hue-rotate(344deg)
      brightness(107%) contrast(102%);
  }

  .img-main__btnlft {
    left: 10%;
  }

  .img-main__btnlft-img {
    transform: rotate(180deg);
  }

  .img-main__btnrgt {
    right: 10%;
  }

  .img-btns {
    display: none;
  }

  .price {
    padding: 0 3rem;
  }

  .price-btnbox {
    flex-direction: column;
  }

  .price-btns {
    padding: 3rem 5rem;
    width: 100%;
  }

  .price-cart__btn {
    padding: 3rem 5rem;
    width: 100%;
  }

  .price-box {
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
  }
  .price-box__old::after {
    width: 100%;
  }

  /* nav */

  .head-lft__btn {
    display: block;
    background: none;
    border: none;
    position: relative;
    z-index: 100;
    cursor: pointer;
  }

  .head-nav {
    z-index: 99;
    position: absolute;
    left: 0;
    top: 0;
    flex-direction: column;
    gap: 5rem;
    padding: 15rem 0 0 3rem;
    background-color: var(--white);
    width: 55%;
    height: 100%;
    transform: translateX(-100%);
    transition: transform 1s;
  }

  .head-nav__item {
    text-transform: uppercase;
    font-size: 2rem;
    font-weight: 700;
    color: var(--very-dark-blue);
  }
  .head-nav__btn {
    width: 0;
    display: block;
    background: none;
    border: none;
    margin-bottom: 2.5rem;
  }

  /* Cart */
  .head-cart {
    top: 10%;
    right: 15%;
  }
}

@media only screen and (max-width: 600px) {
  .head-cart {
    max-width: 100%;
    left: 50%;
    transform: translateX(-50%);
  }
}

@media only screen and (max-width: 420px) {
  .price {
    gap: 3rem;
  }
  .price-txt {
    margin-top: 0;
  }
  .price-btnbox {
    margin-top: 0;
  }

  .price-main__heading {
    font-size: 3.5rem;
  }

  .price-box__main-new {
    font-size: 3rem;
  }

  .head-lft {
    gap: 1.5rem;
  }

  .head-rgt {
    gap: 1.5rem;
  }
}

/*/////////////
JavaScript Triggered Classes
 //////////////*/
.open-cart {
  visibility: visible;
}

.open-menu {
  transform: translateX(0%);
}

.open-overlay {
  height: 100%;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.preload * {
  transition: none !important;
}

    </style>

   </head>
  <body>

    <!-- Header -->
    <header class="head">
    </header>

    <!-- Main item container -->
    <main class="item">
      <section class="img">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="../admin/uploads/<?= $img1 ?>" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../admin/uploads/<?= $img2 ?>" alt="Second slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </section>
    

      <section class="price">
        <h2 class="price-sub__heading">MODEL PORTFOLIO</h2>
        <h1 class="price-main__heading price-box__main-new"><?= $name; ?></h1>
        <p class="price-txt">
          Description: <?= $description; ?>
        </p>
        <p class="price-txt">
          Interest: <?= $interest; ?>
        </p>

        <p class="price-txt">
          Body Type: <?= $bodyType; ?>
        </p>

        <div class="price-box">
          <div class="price-box__main">
            <span class="price-box__main-new">$ <?= $amount; ?></span>
          </div>
        </div>

        <div class="price-btnbox">

            <a href="../userDetails.php?model=<?= $model ?>"><button class="btn--orange">Interested</button></a> 
<!--            &prevUser=<?php // if(isset($_COOKIE['clientNumber'])){echo $_COOKIE['clientNumber'] ; } ?> -->

            <a href="../portfolio/appPortfolio.php"><button class="btn--orange">Not Interested</button></a>
        </div>
      </section>
    </main>

    <!-- Attribution -->
    <div class="attribution">
      All Right Reserved &nbsp; &copy; 2022
    </div>
    
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
      "use strict";

const imgBtn = Array.from(document.querySelectorAll(".img-btn"));
const img = document.querySelector(".img-main");
const mainImgBtns = Array.from(document.querySelectorAll(".img-main__btn"));

const overlayCon = document.querySelector(".overlay-container");
const overlayImg = document.querySelector(".item-overlay__img");
const overlayImgBtn = Array.from(
  document.querySelectorAll(".overlay-img__btn")
);
const overlayBtnImgs = Array.from(
  document.querySelectorAll(".overlay-img__btn-img")
);
const overlayCloseBtn = document.querySelector(".item-overlay__btn ");
const overlayBtns = Array.from(document.querySelectorAll(".overlay-btn"));

const cartBtn = document.querySelector(".head-rgt__btn");
const cart = document.querySelector(".head-cart");
const cartItem = document.querySelector(".head-cart__item");
const emptyCartTxt = document.querySelector(".head-cart__txt");
const addToCart = document.querySelector(".price-cart__btn");
const clearCart = document.querySelector(".head-cart__item-btn");
const priceSingle = document.querySelector(".head-cart__price-single");
const priceTotal = document.querySelector(".head-cart__price-total");

const priceBtns = Array.from(document.querySelectorAll(".price-btn__img"));
const totalItems = document.querySelector(".price-btn__txt");

const menuOpen = document.querySelector(".head-lft__btn");
const menu = document.querySelector(".head-nav");
const menuBtnImg = document.querySelector(".head-lft__btn-img");

const bodyOverlay = document.querySelector(".body-wrapper");
const body = document.querySelector("body");

const headerCart = document.querySelector(".head-rgt");

/* Eventlisteners related to cart and items adding */
let nextImg = 0,
  noOfItems = 0,
  clicked,
  trasitionTimer;

const minQuery = window.matchMedia("(min-width: 850px)"),
  maxQuery = window.matchMedia("(max-width: 850px)");

/*//////////////////////
 Functions 
 /////////////////////*/
/*Function to stop transition animation from triggering when page resize and reloading  */
function transitionDelay() {
  body.classList.add("preload");
  clearTimeout(trasitionTimer);
  trasitionTimer = setTimeout(() => {
    body.classList.remove("preload");
  }, 1000);
}

/* Function to get next and previous images*/
function imgBtns(btns, img, imgName) {
  btns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      if (e.target.classList.contains(`${imgName}__btnlft-img`)) {
        if (nextImg <= 0) nextImg = 2;
        else nextImg--;

        img.src = `images/brian.jpg`;
      }

      if (e.target.classList.contains(`${imgName}__btnrgt-img`)) {
        if (nextImg >= 2) nextImg = 0;
        else nextImg++;

        img.src = `images/brian.jpg`;
      }
    });
  });
}

imgBtns(overlayBtns, overlayImg, "item-overlay");
imgBtns(mainImgBtns, img, "img-main");

/* Function to show single and total items price in the cart  */
function productPrice(items) {
  totalItems.textContent = items;
  priceSingle.textContent = `$125 * ${items}`;
  priceTotal.textContent = `$${125 * items}`;
  if (items >= 1) {
    headerCart.setAttribute("data-content", `${items}`);
    headerCart.style.setProperty("--display", `block`);
  } else {
    headerCart.style.setProperty("--display", `none`);
  }
}

/* Function to close navigation menu */
function closeMenu() {
  menu.classList.remove("open-menu");
  body.style.overflow = "visible";
  bodyOverlay.classList.remove("open-overlay");
  menuBtnImg.src = "images/icon-menu.svg";
}

/* Function to open navigation menu */

function openMenu() {
  menu.classList.add(".open-menu");
  menuBtnImg.src = "images/icon-close.svg";
  body.style.overflow = "hidden";
  cart.classList.remove("open-cart");
  bodyOverlay.classList.add("open-overlay");
}

/* Function to delete cart item when cart items are zero */

function cartIt() {
  cartItem.classList.add("open-cart");
  emptyCartTxt.classList.remove("open-cart");
}

/* Function to delete cart text 'empty cart' when cart items are > 0 */

function cartTx() {
  cartItem.classList.remove("open-cart");
  emptyCartTxt.classList.add("open-cart");
}

/* Function to delete cart text cart item  */
function emptyCart() {
  cartItem.classList.remove("open-cart");
  emptyCartTxt.classList.remove("open-cart");
}

/*//////////////////////
 Event Listeners 
 /////////////////////*/

/*  Eventlistener to close and open cart   */

cartBtn.addEventListener("click", function () {
  cart.classList.toggle("open-cart");
  if (cart.classList.contains("open-cart")) {
    if (noOfItems >= 1 && clicked === true) cartIt();
    else cartTx();
  } else {
    emptyCart();
  }
});

/*  Eventlistener to increase and decrease no. of items   */
priceBtns.forEach((btn) => {
  btn.addEventListener("click", function (e) {
    clicked = false;
    if (e.target.classList.contains("price-btn__add-img")) {
      if (noOfItems >= 10) return;
      noOfItems++;
      productPrice(noOfItems);
    } else if (e.target.classList.contains("price-btn__remove-img")) {
      if (noOfItems <= 0) return;
      noOfItems--;
      productPrice(noOfItems);
    }
  });
});

/*  Eventlistener for add to cart button  */
addToCart.addEventListener("click", function (e) {
  clicked = true;
  if (cart.classList.contains("open-cart")) {
    if (noOfItems >= 1) {
      cartIt();
    } else if (noOfItems <= 0) {
      cartTx();
    }
  }
});

/*  Eventlistener for delete cart item button   */
clearCart.addEventListener("click", function () {
  cartTx();
  noOfItems = 0;
  totalItems.textContent = noOfItems;
  headerCart.style.setProperty("--display", `none`);
});

/*  Eventlistener to open overlay image modal   */
img.addEventListener("click", function () {
  if (minQuery.matches) {
    overlayCon.style.display = "block";
    overlayImg.src = img.src;
  }
});

/*  Eventlistener to close overlay image modal   */
overlayCloseBtn.addEventListener("click", function () {
  if (minQuery.matches) {
    overlayCon.style.display = "none";
  }
});

/*  Eventlistener for overlay image modal btn to change overlay image same as button image  */
overlayImgBtn.forEach((btn, i) => {
  btn.addEventListener("click", function (e) {
    overlayImg.src = `images/dole.jpg`;
    nextImg = e.target.dataset.img;
  });
});

/*  Eventlistener for  image to change when image button is clicked  */
imgBtn.forEach((btn, i) => {
  btn.addEventListener("click", function () {
    img.src = `images/dole.jpg`;
  });
});

/* Menu eventlisteners */
/*  Eventlistener to open menu / navigation  */
menuOpen.addEventListener("click", function () {
  menu.classList.toggle("open-menu");
  if (menu.classList.contains("open-menu")) {
    openMenu();
    emptyCart();
  } else {
    closeMenu();
  }
});

/*  Eventlistener to stop transition animation from triggering when page resize */
window.addEventListener("resize", function () {
  transitionDelay();

  if (maxQuery.matches) overlayCon.style.display = "none";

  if (minQuery.matches) closeMenu();
});

/*  Eventlistener to stop transition animation from triggering when page reloading  */
window.addEventListener("load", function () {
  transitionDelay();
});

    </script>
  </body>
</html>

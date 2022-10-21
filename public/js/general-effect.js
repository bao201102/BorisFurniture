//Footer collapse effect
window.addEventListener("resize", resizeFooter);
resizeFooter();

function resizeFooter() {
  if (window.innerWidth < 992) {
    document.getElementById("col-toggler1").className = "row gap-3 collapse";
    document.getElementById("col-toggler2").className = "row gap-3 collapse";
  } else {
    document.getElementById("col-toggler1").className =
      "row gap-3 collapse show";
    document.getElementById("col-toggler2").className =
      "row gap-3 collapse show";
  }
}

//modal quick view
// function quickView() {
//     var modals = document.getElementsByClassName("modal-layout")[0];
//     modals.classList.add("d-flex");
//     var close = document.querySelector(".modal-close");
//     close.onclick = function () {
//         modals.classList.remove("d-flex");
//     }
//     modals.onclick = function () {
//         modals.classList.remove("d-flex");
//     }

//     var inner = document.getElementsByClassName("modal-inner")[0];
//     inner.onclick = function (e) {
//         e.stopPropagation();
//     }
// }

//header cart in nav responsive
window.addEventListener("resize", resizeHeaderCart);
resizeHeaderCart();

function resizeHeaderCart() {
  var hiden = document.getElementsByClassName("header-cart-list")[0];
  if (window.innerWidth <= 992) {
    hiden.style.display = "none";
  } else {
    hiden.style.display = "block";
  }
}

window.addEventListener("resize", resizeAddToCart);
resizeAddToCart();

function resizeAddToCart() {
  var hiden = document.getElementsByClassName("add-to-cart");
  for (let index = 0; index < hiden.length; index++) {
    if (window.innerWidth <= 992) {
      hiden[index].classList.add("d-none");
    } else {
      hiden[index].classList.remove("d-none");
    }
  }
}

function handleAjax(e, sufUrl, className, name) {
  e.preventDefault();
  document
    .getElementsByClassName("modal-layout-menu")[0]
    .classList.remove("menu");
  document
    .getElementsByClassName("modal-layout-filter")[0]
    .classList.remove("filter");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementsByClassName(
        "sPage__content-product-main"
      )[0].innerHTML = this.responseText;
    }
  };

  if (name) {
    xmlhttp.open(
      "GET",
      "productView.php" +
        "?" +
        name +
        "=" +
        document.getElementsByClassName(className)[0].value,
      true
    );
    document.getElementsByClassName(className)[0].value = "";
    xmlhttp.send();
  } else {
    xmlhttp.open("GET", "productView.php" + sufUrl, true);
    xmlhttp.send();
  }
}

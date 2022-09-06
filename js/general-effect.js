//Reponsive product information
window.addEventListener("resize", resizeDetail);

function resizeDetail() {
    if (window.innerWidth < 992) {
        document.getElementById("inf-pro").style.paddingLeft = 12;
    }
    else if (window.innerWidth < 1200) {
        document.getElementById("inf-pro").style.paddingLeft = 50;
    }
    else {
        document.getElementById("inf-pro").style.paddingLeft = 100;
    }
}

//Footer collapse effect
window.addEventListener("resize", resizeFooter);

function resizeFooter() {
    if (window.innerWidth < 992) {
        document.getElementById("col-toggler1").className = "row gap-3 collapse";
        document.getElementById("col-toggler2").className = "row gap-3 collapse";
    }
    else {
        document.getElementById("col-toggler1").className = "row gap-3 collapse show";
        document.getElementById("col-toggler2").className = "row gap-3 collapse show";
    }
}
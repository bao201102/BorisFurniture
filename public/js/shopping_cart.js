window.addEventListener("resize", function () {
    if (window.innerWidth < 1200) {
        document.getElementById("cart-totals").style.width = "100%";
    }
    else {
        document.getElementById("cart-totals").style.width = "auto";
    }
})
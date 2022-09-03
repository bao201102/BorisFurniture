//scroll event trigger
window.onscroll = function () { myScrollFunction() };

function myScrollFunction() {
    if (window.scrollY > 1) {
        document.getElementById("nav-id").className = "navbar navbar-expand-lg fixed-top py-3 border-0 bg-white shadow-sm";
    }
    else if (window.innerWidth > 992 && window.scrollY < 20) {
        document.getElementById("nav-id").className = "navbar navbar-expand-lg fixed-top py-3 border-0 bg-transparent";
    }
}

//resize event trigger
window.onresize = function () { myResizeFunction() };

function myResizeFunction() {
    if (window.innerWidth < 992) {
        document.getElementById("nav-id").className = "navbar navbar-expand-lg fixed-top py-3 border-0 bg-white shadow-sm";
        document.getElementById("col-toggler1").className = "row gap-3 collapse";
        document.getElementById("col-toggler2").className = "row gap-3 collapse";
    }
    else if (window.innerWidth > 992 && window.scrollY < 20) {
        document.getElementById("nav-id").className = "navbar navbar-expand-lg fixed-top py-3 border-0 bg-transparent";
    }
    else {
        document.getElementById("col-toggler1").className = "row gap-3 collapse show";
        document.getElementById("col-toggler2").className = "row gap-3 collapse show";
    }

    //details
    if (window.innerWidth < 1000) {
        document.getElementById("inf-pro").style.paddingLeft = 12;
    }
    else if (window.innerWidth < 1200) {
        document.getElementById("inf-pro").style.paddingLeft = 50;
    }
    else {
        document.getElementById("inf-pro").style.paddingLeft = 100;
    }
}
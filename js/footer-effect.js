//resize event trigger
window.onresize = function () { myHideCol() };

function myHideCol() {
    if (window.innerWidth < 992) {
        document.getElementById("col-toggler1").className = "row gap-3 collapse";
        document.getElementById("col-toggler2").className = "row gap-3 collapse";
    }
    else {
        document.getElementById("col-toggler1").className = "row gap-3 collapse show";
        document.getElementById("col-toggler2").className = "row gap-3 collapse show";
    }
}
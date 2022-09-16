
function addProduct() {
    hideSidebar();
    var modals = document.querySelector(".modal-layout.add_product");
    modals.classList.add("d-flex");
    var close = document.querySelector(".modal-close");
    close.onclick = function () {
        modals.classList.remove("d-flex");
        unhideSidebar();
    }
    modals.onclick = function () {
        modals.classList.remove("d-flex");
        unhideSidebar();
    }

    var inner = document.getElementsByClassName("modal-inner")[0];
    inner.onclick = function (e) {
        e.stopPropagation();
    }
}

function editProduct() {
    hideSidebar();
    var modals = document.querySelector(".modal-layout.edit_product");
    modals.classList.add("d-flex");
    var close = document.querySelector(".modal-close");
    close.onclick = function () {
        modals.classList.remove("d-flex");
        unhideSidebar();
    }
    modals.onclick = function () {
        modals.classList.remove("d-flex");
        unhideSidebar();
    }

    var inner = document.getElementsByClassName("modal-inner")[0];
    inner.onclick = function (e) {
        e.stopPropagation();
    }
}

const fileUpload = document.querySelector("#file-upload");

fileUpload.addEventListener("change", (event) => {
    const { files } = event.target;

    for (let i = 0; i < files.length; i++) {
        console.log(files[i].name);
    }
})


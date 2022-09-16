function addProduct() {
    hideSidebar();
    let modals = document.querySelector(".modal-layout.add_product");
    let close = document.getElementsByClassName("modal-close")[0];
    let btnClose = document.getElementsByClassName("btn_close")[0];

    modals.classList.add("d-flex");
    close.onclick = function () {
        modals.classList.remove("d-flex");
        unhideSidebar();
    }
    modals.onclick = function () {
        modals.classList.remove("d-flex");
        unhideSidebar();
    }
    btnClose.onclick = function () {
        modals.classList.remove("d-flex");
        unhideSidebar();
    }

    let inner = document.getElementById("add_product");
    inner.onclick = function (e) {
        e.stopPropagation();
    }
}

function editProduct() {
    hideSidebar();
    let modals = document.querySelector(".modal-layout.edit_product");
    let close = document.getElementsByClassName("modal-close")[1];
    let btnClose = document.getElementsByClassName("btn_close")[1];

    modals.classList.add("d-flex");
    close.onclick = function () {
        modals.classList.remove("d-flex");
        unhideSidebar();
    }
    modals.onclick = function () {
        modals.classList.remove("d-flex");
        unhideSidebar();
    }
    btnClose.onclick = function () {
        modals.classList.remove("d-flex");
        unhideSidebar();
    }
    let inner = document.getElementById("edit_product");
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

function closeSubSidebar() {
    var close_sub = document.getElementById("sub_sidebar");
    close_sub.onclick = function () {
        close_sub.style.display = "none";
        hideSidebar();
    }
}


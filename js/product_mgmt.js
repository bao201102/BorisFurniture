function closeModal(modals, close, btnClose, str) {
    modals.classList.add("d-flex");
    close.onclick = function () {
        modals.classList.remove("d-flex");
        if (window.innerWidth > 1050) {
            unhideSidebar();
        }
    }
    modals.onclick = function () {
        modals.classList.remove("d-flex");
        if (window.innerWidth > 1050) {
            unhideSidebar();
        }
    }
    btnClose.onclick = function () {
        modals.classList.remove("d-flex");
        if (window.innerWidth > 1050) {
            unhideSidebar();
        }
    }

    let inner = document.getElementById(str);
    inner.onclick = function (e) {
        e.stopPropagation();
    }
}

function addProduct() {
    hideSidebar();
    let modals = document.querySelector(".modal-layout.add_product");
    let close = document.getElementsByClassName("modal-close")[0];
    let btnClose = document.getElementsByClassName("btn_close")[0];

    closeModal(modals, close, btnClose, "add_product");
}

function editProduct() {
    hideSidebar();
    let modals = document.querySelector(".modal-layout.edit_product");
    let close = document.getElementsByClassName("modal-close")[1];
    let btnClose = document.getElementsByClassName("btn_close")[1];

    closeModal(modals, close, btnClose, "edit_product");
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


import "./bootstrap";

import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);

import * as bootstrap from "bootstrap";

const previewImgElem = document.getElementById("preview_image");

document
    .getElementById("project_image")
    .addEventListener("change", function () {
        const selectedFile = this.files[0];
        if (selectedFile) {
            const reader = new FileReader();
            reader.addEventListener("load", function () {
                previewImgElem.src = reader.result;
            });
            reader.readAsDataURL(selectedFile);
        }
    });

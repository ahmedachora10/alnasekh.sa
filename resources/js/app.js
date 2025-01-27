import "./bootstrap";

import Alpine from "alpinejs";

import Cleave from "cleave.js";
import "../../node_modules/cleave.js/dist/addons/cleave-phone.sa.js";

import Dropzone from "dropzone";

if (!window.Alpine) {
    window.Alpine = Alpine;
    Alpine.start();
}


const phoneNumber = $(".phone-number");

if (phoneNumber.length) {
    $cleave = new Cleave(document.querySelector(".phone-number"), {
        phone: true,
        phoneRegionCode: "SA",
    });
}

const view = `
<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"
    <div class="dz-details">
      <div class="dz-thumbnail">
         <img data-dz-thumbnail alt="" src="">
         <span class="dz-nopreview">No preview</span>
         <div class="dz-success-mark"></div>
         <div class="dz-error-mark"></div>
         <div class="dz-error-message"><span data-dz-errormessage></span></div>
         <div class="progress">
            <div class="progress-bar progress-bar-primary"
               role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress
               style="width: 100%;">
            </div>
         </div>
      </div>
      <div class="dz-filename" data-dz-name></div>
      <div class="dz-size" data-dz-size>
      <a class="dz-remove" href="javascript:undefined;" data-dz-remove>Remove file</a>
    </div>
</div>
`;

window.notify = (data) => {
    const notify = document.querySelector(".toast");
    const notifyTitle = document.getElementById("notify-title");
    const notifyIcon = document.getElementById("notify-icon");

    notify.classList.add("show");
    notifyTitle.textContent = data.message;

    if (data.status) {
        notify.classList.add(data.style || "bg-primary");
    } else {
        notify.classList.add(data.style || "bg-danger");
        notifyIcon.classList.add("bx-error-alt");
    }
    setTimeout(() => notify.classList.remove("show"), 5000);
};

if (!window.dropzoneHandler) {
    window.dropzoneHandler = function (target = "", options = {}) {
        const targetElement = document.querySelector(target);

        if (!targetElement)
            return new Error('there is no element selected"' + target + '"');

        let myDropzone = new Dropzone(target, {
            previewTemplate: view,
            parallelUploads: 1,
            addRemoveLinks: true,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
            },
            ...options,
        });

        return myDropzone;
    };
}


import { showFormContact } from "./contact";
const wrapper = document.querySelector(".profile-content");
const profileBar = document.querySelector("#profileBar");
const dropMenu = document.querySelector(".drop-menu");
let timeout;
if (wrapper) {
    wrapper.addEventListener("mouseenter", () => {
        clearTimeout(timeout);
        profileBar.classList.remove("hidden");
        dropMenu.classList.add("hidden");
    });

    wrapper.addEventListener("mouseleave", () => {
        timeout = setTimeout(() => {
            dropMenu.classList.remove("hidden");
            profileBar.classList.add("hidden");
        }, 200);
    });
    const profileEdit = document.querySelector(".profile-edit");
    profileEdit.addEventListener("click", () => {
        window.location.href = "/profile/edit";
    });
    const buttonContact = document.querySelectorAll(".buttonContact");
    buttonContact.forEach((button) => {
        button.addEventListener("click", () => {
            showFormContact();
        });
    });
}

const buttonMenuMob = document.querySelector(".btn-menu-mob");
const menuMob = document.querySelector(".menu-mob-content");
const buttonmenuMobImage = document.querySelector(".btn-menu-mob img");
buttonMenuMob.addEventListener("click", () => {
    menuMob.classList.toggle("hidden");
    if(buttonmenuMobImage.src === buttonMenuMob.dataset.dropped){
        buttonmenuMobImage.src = buttonMenuMob.dataset.undropped;
        return;
    }
    buttonmenuMobImage.src = buttonMenuMob.dataset.dropped;
});

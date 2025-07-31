import { showFormContact } from "./contact";

const wrapper = document.querySelector(".profile-content");
const profileBar = document.querySelector("#profileBar");
const dropMenu = document.querySelector(".drop-menu");
let timeout;

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
})
const buttonContact = document.querySelectorAll(".buttonContact");
buttonContact.forEach((button) => {
    button.addEventListener("click", () => {
        showFormContact();
    })
})

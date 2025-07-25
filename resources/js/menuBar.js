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

const buttonClose = document.querySelector(".button-close");
const contactForm = document.querySelector("#contactForm");
buttonClose.addEventListener("click", () => {
    contactForm.classList.add("hidden");
})

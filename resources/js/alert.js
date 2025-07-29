const contentAlert = document.querySelector(".content-alert");
const buttonOk = document.querySelector(".button-ok");
buttonOk.addEventListener("click", () => {
    contentAlert.classList.add("hidden");
});
export function showAlert(text) {
    contentAlert.classList.remove("hidden");
    const textCard = document.querySelector(".text-card");
    textCard.textContent = text;
}

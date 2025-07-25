const contentAlert = document.querySelector("#contentAlert");
const buttonClose = document.querySelector("#buttonClose");
const inputUrl = document.querySelector("#inputUrl");
const caminho = document.querySelector("#caminho");
const contentCard = document.querySelector(".content-card p");
buttonClose.addEventListener("click", () => {
    contentAlert.classList.add("hidden");
});
const botaoEncurtar = document.querySelector("#buttonEncurtar");
export function showAlert(link) {
    if (verifyUrl(inputUrl.value)) {
        contentAlert.classList.remove("hidden");
        contentCard.textContent = link;
    }
}

const regex = /^(https?:\/\/)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(\/[^\s]*)?$/;
function verifyUrl(url) {
    return regex.test(url);
}

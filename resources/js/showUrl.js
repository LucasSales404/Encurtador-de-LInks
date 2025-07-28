const contentUrl = document.querySelector("#contentUrl");
const buttonClose = document.querySelector("#buttonClose");
const inputUrl = document.querySelector("#inputUrl");
const contentCard = document.querySelector(".content-card p");
if (buttonClose) {
    buttonClose.addEventListener("click", () => {
        contentUrl.classList.add("hidden");
    });
}

export function showUrl(link) {
    if (verifyUrl(inputUrl.value)) {
        contentUrl.classList.remove("hidden");
        contentCard.textContent = link;
    }
}

const regex = /^(https?:\/\/)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(\/[^\s]*)?$/;
function verifyUrl(url) {
    return regex.test(url);
}

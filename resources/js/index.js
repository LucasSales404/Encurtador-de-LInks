import { showAlert } from "./alert.js";

const inputUrl = document.querySelector("#inputUrl");
const personalizarLink = document.querySelector("#personalizarLink");
const caminho = document.querySelector("#caminho");
const screenLoading = document.querySelector("#loadingScreen");
personalizarLink.addEventListener("input", () => {
    caminho.textContent = "https://encurtar.link/" + personalizarLink.value;
});
const buttonCopy = document.querySelector("#buttonCopy");
const formEncurtar = document.querySelector("#formEncurtar");
let urlEncurtada = '';
formEncurtar.addEventListener("submit", async (e) => {
    e.preventDefault();

    const data = {
        url: inputUrl.value,
        caminho: personalizarLink.value,
    };
    screenLoading.classList.remove("hidden");
    try {
        const token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        const response = await fetch("/store/", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify(data),
        });

        if (!response.ok) throw new Error("Erro ao enviar link");

        const resultado = await response.json();
        screenLoading.classList.add("hidden");
        showAlert(resultado.short_url);
        urlEncurtada = resultado.short_url;

    } catch (err) {
        console.error(err);
        showAlert("Erro ao encurtar link");
    }
});

document.addEventListener("click", (e) => {
    if (e.target.id === "buttonCopy") {
        navigator.clipboard.writeText(urlEncurtada);
        buttonCopy.textContent = "Copiado";
        buttonCopy.classList.remove("bg-neutral-700");
        buttonCopy.style.backgroundColor = "gray";
    }
});


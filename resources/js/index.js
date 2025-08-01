import { showAlert } from "./alert.js";
import { hideLoadingScreen } from "./loading-screen.js";
import { showLoadingScreen } from "./loading-screen.js";
import { showUrl } from "./showUrl.js";

const inputUrl = document.querySelector("#inputUrl");
const personalizarLink = document.querySelector("#personalizarLink");
const caminho = document.querySelector("#caminho");
if (personalizarLink) {
    personalizarLink.addEventListener("input", () => {
        caminho.textContent = "https://SnapLink/" + personalizarLink.value;
    });
}
const buttonCopy = document.querySelector("#buttonCopy");
const formEncurtar = document.querySelector("#formEncurtar");
let urlEncurtada = "";
if (formEncurtar) {
    formEncurtar.addEventListener("submit", async (e) => {
        e.preventDefault();

        const data = {
            original_url: inputUrl.value,
            slug: personalizarLink.value,
        };
        showLoadingScreen("Encurtando seu link");
        try {
            const token = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");
            console.log("Dados enviados:", data);

            const response = await fetch("/store/", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": token,
                },
                body: JSON.stringify(data),
            });

            const result = await response.json();
            if (!response.ok) {
                console.log('entrou no erro do response');
                throw new Error(result.message || "Erro ao encurtar linkdddddddd");
            } else if(result.success){
                console.log('Encurtada');
                urlEncurtada = result.short_url;
                showUrl(urlEncurtada);
                buttonCopy.classList.remove("hidden");
            }else if(!result.success){
                showAlert(result.message);
            }
        } catch (err) {
            showAlert(err.message);
            buttonCopy.classList.add("hidden");
        } finally {
            hideLoadingScreen();
        }
    });
}

document.addEventListener("click", (e) => {
    if (e.target.id === "buttonCopy") {
        if (buttonCopy.textContent === "Copiado") {
            return;
        }
        navigator.clipboard.writeText(urlEncurtada);
        buttonCopy.textContent = "Copiado";
        buttonCopy.classList.remove("bg-neutral-700");
        buttonCopy.style.backgroundColor = "gray";
    }
});

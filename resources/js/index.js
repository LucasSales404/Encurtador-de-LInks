import { showAlert } from "./alert.js";

const inputUrl = document.querySelector("#inputUrl");
const personalizarLink = document.querySelector("#personalizarLink");
const caminho = document.querySelector("#caminho");

personalizarLink.addEventListener("input", () => {
    caminho.textContent = "https://encurtar.link/" + personalizarLink.value;
});

const formEncurtar = document.querySelector("#formEncurtar");

formEncurtar.addEventListener("submit", async (e) => {
    e.preventDefault();

    const data = {
        url: inputUrl.value,
        caminho: personalizarLink.value,
    };

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
        showAlert(`Link encurtado: ${resultado.short_url}`);
    } catch (err) {
        console.error(err);
        showAlert("Erro ao encurtar link");
    }
});

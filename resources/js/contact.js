import { showAlert } from "./alert";

const buttonClose = document.querySelector(".button-close");
const contactForm = document.querySelector("#contactForm");
const form = document.querySelector(".form-content form");
buttonClose.addEventListener("click", () => {
    contactForm.classList.add("hidden");
});

export function showFormContact() {
    contactForm.classList.remove("hidden");
}
export function hideFormContact() {
    contactForm.classList.add("hidden");
}
form.addEventListener("submit", async (e) => {
    e.preventDefault();
    if (grecaptcha.getResponse() === "") {
        showAlert("Por favor, confirme que você não é um robô.");
        return;
    }
    try {
        const data = new FormData(form);
        const token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        const response = await fetch("/contact/send", {
            method: "POST",
            headers: {
                "Accept": "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: data,
        });
        console.log("Response status:", response.status);
        const text = await response.text();
        console.log("Response text:", text);
        // Tente converter para json só depois de garantir que veio algo válido
        const result = JSON.parse(text);
        console.log("Parsed JSON:", result);

        if (!response.ok) {
            showAlert(result.message || "Erro ao enviar o formulário");
            throw new Error(result.message || "Erro ao enviar o formulário");
        } else if (result.success) {
            showAlert(result.message);
            hideFormContact();
        }
    } catch (err) {
        console.error("Erro capturado:", err);
        if (err.message) {
            showAlert(err.message);
        }
    }
});

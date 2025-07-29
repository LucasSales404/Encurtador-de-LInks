import { showAlert } from "./alert.js";
import { showLoadingScreen } from "./loading-screen.js";
const screenLoading = document.querySelector("#loadingScreen");
const buttonDelete = document.querySelectorAll(".button-delete");
buttonDelete.forEach((button) => {
    button.addEventListener("click", async () => {
        const id = button.dataset.id;
        if(!confirm("Tem certeza que deseja excluir o link?")) return;
        showLoadingScreen('Excluindo seu link...');
        try {
            const token = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

            const response = await fetch(`links/delete/${id}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": token,
                },
            });

            const result = await response.json(); 

            if (!response.ok) {
                console.error("Erro do backend:", result);
                throw new Error(result.message || "Erro ao excluir link");
            } else {
                document.querySelector(`#link-${id}`).remove();
                showAlert("Link excluído com sucesso!");
            }
        } catch (err) {
            console.error(err);
        }finally {
            screenLoading.classList.add("hidden");
        }
    });
});

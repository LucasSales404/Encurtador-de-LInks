const contentAlert = document.querySelectorAll(".content-alert");

contentAlert.forEach((content) => {
    const  buttonOk = content.querySelector(".button-ok");
    if(buttonOk){
        buttonOk.addEventListener("click", () => {
            content.classList.add("hidden");
        })
    }
})
export function showAlert (text){
  contentAlert.forEach((content) => {
      const cardContent = content.querySelector(".text-card");
      cardContent.textContent = text;
      content.classList.remove("hidden");
  })
};
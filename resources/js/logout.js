const buttonsLogout = document.querySelectorAll(".buttonLogout");
buttonsLogout.forEach((button) => {
    button.addEventListener("click", () => {
        document.querySelector("#logout-form").submit();
    });
})

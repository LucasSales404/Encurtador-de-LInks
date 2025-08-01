const btnLogin = document.querySelector(".btnLogin");
const btnRegister = document.querySelector(".btnRegister");

btnRegister.addEventListener('mouseover', () => {
    btnLogin.classList.remove("bg-white");
    btnLogin.classList.add("bg-transparent");
    btnLogin.classList.remove("text-black");
})
btnRegister.addEventListener('mouseout', () => {
    btnLogin.classList.add("bg-white");
    btnLogin.classList.remove("bg-transparent");
    btnLogin.classList.add("text-black");
})
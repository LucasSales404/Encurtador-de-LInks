const textScreen = document.querySelector("#textScreen");
const screenLoading = document.querySelector("#loadingScreen");
export function showLoadingScreen(screen) {
    screenLoading.classList.remove("hidden");
    textScreen.textContent = screen;
}
export function hideLoadingScreen() {
    screenLoading.classList.add("hidden");
}
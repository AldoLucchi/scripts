let titulo = document.title;
window.addEventListener("blur", () => {
document.title = "Hey a donde vas!! 🙁";
});
window.addEventListener("focus", () => {
document.title = titulo;
});

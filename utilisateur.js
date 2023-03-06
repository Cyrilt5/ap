// Récupérer l'élément de sélection et l'élément à afficher
const selectElement1 = document.getElementById("date");
const selectElement2 = document.getElementById("heure");
const displayElement = document.getElementById("display-element");

// Ajouter un événement de changement à l'élément de sélection
selectElement1.addEventListener("change", () => {
// Si les deux options sont sélectionnées, afficher l'élément
if (selectElement1.value !== "" && selectElement2.value !== "") {
displayElement.style.display = "block";
} else {
// Sinon, masquer l'élément
displayElement.style.display = "none";
}
});

selectElement2.addEventListener("change", () => {
// Si les deux options sont sélectionnées, afficher l'élément
if (selectElement1.value !== "" && selectElement2.value !== "") {
    displayElement.style.display = "block";
} else {
// Sinon, masquer l'élément
    displayElement.style.display = "none";
}
});
const message = "Filter results"; // Try edit me
const indexRange = [
  { id: 1, name: "1" },
  { id: 2, name: "2" },
  { id: 3, name: "3" },
  { id: 4, name: "4" },
  { id: 5, name: "5" },
  { id: 6, name: "6" },
  { id: 7, name: "7" },
  { id: 8, name: "8" },
  { id: 9, name: "9" },
  { id: 10, name: "10" },
];
let filter = document.querySelector("#filter");

filter.addEventListener(
  "click",
  // Ci dessous, c'est la fonction dans laquel tu vas rendre dynamique ta logique. Y a moyen que tu doives écrire ta logique pour regénérer ta liste ici
  (el) =>
    (document.querySelector("#dataRange").textContent =
      indexRange[filter.value].name)
);

// Update header text
document.querySelector("#header").innerHTML = message;
// Log to console
console.log(indexRange[0].name);

//si la value du range est égal à la calcul moyenne
//alors tu affiches la liste des produits avec cette moyenne
//sinon tu affiches la phrase "aucun produit ne possède cette moyenne"

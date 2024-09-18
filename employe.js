// JavaScript pour dynamiser la navigation

// Sélectionner tous les liens de navigation dans la barre latérale
const navLinks = document.querySelectorAll(".nav-link");

// Sélectionner toutes les sections de contenu principal
const sections = document.querySelectorAll(".section");

// Fonction pour masquer toutes les sections
function hideAllSections() {
  sections.forEach((section) => {
    section.classList.remove("active");
  });
}

// Fonction pour afficher la section correspondante
function showSection(sectionId) {
  const sectionToShow = document.getElementById(sectionId);
  if (sectionToShow) {
    sectionToShow.classList.add("active");
  }
}

// Ajouter des événements de clic à chaque lien de navigation
navLinks.forEach((link) => {
  link.addEventListener("click", function (event) {
    // Empêcher le comportement par défaut du lien (qui ferait défiler la page)
    event.preventDefault();

    // Masquer toutes les sections
    hideAllSections();

    // Récupérer l'ID de la section à afficher (en utilisant l'attribut data-section)
    const sectionId = link.getAttribute("data-section");

    // Afficher la section correspondante
    showSection(sectionId);
  });
});

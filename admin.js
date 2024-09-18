document.addEventListener("DOMContentLoaded", function () {
  const menuLinks = document.querySelectorAll(".sidebar ul li a");
  const sections = document.querySelectorAll(".section");

  // Cacher toutes les sections
  sections.forEach((section) => {
    section.classList.remove("active");
  });

  // Afficher par défaut la section Dashboard
  document.querySelector("#dashboard").classList.add("active");

  // Ajouter un gestionnaire de clic pour chaque lien du menu
  menuLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      // Enlever la classe "active" de toutes les sections
      sections.forEach((section) => {
        section.classList.remove("active");
      });

      // Ajouter la classe "active" à la section sélectionnée
      const targetSection = document.querySelector(this.getAttribute("href"));
      targetSection.classList.add("active");
    });
  });
});

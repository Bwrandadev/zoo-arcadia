document.addEventListener("DOMContentLoaded", function () {
  const menuLinks = document.querySelectorAll(".sidebar ul li a");
  const sections = document.querySelectorAll(".section");

  // Ajoute un gestionnaire de clic pour chaque lien du menu
  menuLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      // Cacher toutes les sections
      sections.forEach((section) => section.classList.remove("active"));

      // Afficher par défaut la section Dashboard
      document.querySelector("#page-bienvenue").classList.add("active");

      // Montrer la section correspondante
      const targetSection = document.querySelector(this.getAttribute("href"));
      targetSection.classList.add("active");
    });
  });
});

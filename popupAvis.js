// Attendre que le DOM soit complètement chargé
document.addEventListener("DOMContentLoaded", function () {
  // Sélectionner les éléments nécessaires
  const modal = document.getElementById("modal");
  const openModalBtn = document.getElementById("openModalBtn");
  const closeModalBtn = document.getElementsByClassName("close")[0];

  // Vérifiez que les éléments existent avant de leur attacher des événements
  if (openModalBtn && modal && closeModalBtn) {
    // Ouvrir la modale lorsque le bouton est cliqué
    openModalBtn.onclick = function () {
      modal.style.display = "flex"; // Afficher la modale
    };

    // Fermer la modale lorsque le bouton de fermeture (X) est cliqué
    closeModalBtn.onclick = function () {
      modal.style.display = "none"; // Masquer la modale
    };

    // Fermer la modale si l'utilisateur clique en dehors du contenu de la modale
    window.onclick = function (event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    };
  } else {
    console.error("Un ou plusieurs éléments n'ont pas été trouvés.");
  }
});

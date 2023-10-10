// Sélectionne les liens du menu
const links = document.querySelectorAll('.menu_lien')

// Ajoute un événement pour chaque lien avec une boucle
links.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault() // Annule la redirection par défaut

    const targetId = event.target.getAttribute('href') // Récupère le href
    const targetSection = document.querySelector(targetId) // Sélectionne la section 

    // Met l'effet de smooth scroll
    if (targetSection) {
      targetSection.scrollIntoView({
        behavior: 'smooth' 
      })
    }
  })
})




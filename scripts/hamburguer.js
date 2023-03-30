const toggleButton = document.getElementsByClassName('menuHamburguesa')[0]
const navbarLinks = document.getElementsByClassName('opcionesMenu')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})
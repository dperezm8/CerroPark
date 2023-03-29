const botonHamburguesa = document.getElementsByClassName('menuHamburguesa')[0]
const opcionesMenu = document.getElementsByClassName('opcionesMenu')[0]

botonHamburguesa.addEventListener('click', () => {
    opcionesMenu.classList.toggle('active')
})
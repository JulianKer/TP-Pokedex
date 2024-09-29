let imgLogOut = document.getElementById("logoCerrarSesion")
let popupCerrarSesion = document.getElementById("popUpCerrarSesion");
let btnCancelarCerrarSesion = document.getElementById("botonCancelarCesrrarSesion")
let btnAceptarCerrarSesion = document.getElementById("botonAceptarCesrrarSesion")

console.log(imgLogOut)
console.log(popupCerrarSesion)
console.log(btnCancelarCerrarSesion)
console.log(btnAceptarCerrarSesion)

imgLogOut.addEventListener("click", (e)=>{
    e.preventDefault();
    console.log("AAAAAAAAA")
    popupCerrarSesion.style.display = "flex";

    btnAceptarCerrarSesion.addEventListener("click", (e)=>{
        e.preventDefault()

        popupCerrarSesion.style.display = "none";
        location.href = "/TP-Pokedex/controller/controllerLogOut.php";
    })
})

btnCancelarCerrarSesion.addEventListener("click", (e)=>{
    e.preventDefault();
    popupCerrarSesion.style.display = "none";
})

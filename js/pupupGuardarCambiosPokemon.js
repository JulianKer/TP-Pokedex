let btnGuardar = document.querySelector(".btn_editar")
let formulario = document.getElementById("formulario")

let popupGuardarPokemon = document.querySelector(".fondo-popup")
let btnCancelar = document.querySelector(".btn_cancelar")
let btnAceptar = document.querySelector(".btn_aceptar")

console.log(formulario)
console.log(btnGuardar);
console.log(popupGuardarPokemon)
console.log(btnCancelar)
console.log(btnAceptar)

btnCancelar.addEventListener("click", ()=>{
    popupGuardarPokemon.style.display = "none";
})

btnGuardar.addEventListener("click", (e)=>{
    e.preventDefault();
    popupGuardarPokemon.style.display = "flex";

    btnAceptar.addEventListener("click", ()=>{
        popupGuardarPokemon.style.display = "none";
        formulario.submit();
    })
})


















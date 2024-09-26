let btnEliminar = document.querySelectorAll(".btn_eliminar")

let popupEliminarPokemon = document.querySelector(".fondo-popup")
let btnCancelar = document.querySelector(".btn_cancelar")
let btnAceptar = document.querySelector(".btn_aceptar")

console.log(btnEliminar)
console.log(btnCancelar)
console.log(btnAceptar)


btnEliminar.forEach((btn) =>{
    btn.addEventListener("click", (e)=>{
        e.preventDefault();

        popupEliminarPokemon.style.display = "flex";

        btnAceptar.addEventListener("click", (e)=>{
            e.preventDefault()
            popupEliminarPokemon.style.display = "none";
            location.href = btn.href
        })
    })
})

btnCancelar.addEventListener("click", (e)=>{
    e.preventDefault();
    popupEliminarPokemon.style.display = "none";
})

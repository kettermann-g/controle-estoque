const submitButton = document.getElementById("submit-button")
const referencia = document.getElementById("referencia")
const origem= document.getElementById("origem")

function validation() {
    if (referencia.value == "" || origem.value == "") {
        window.alert("Informe o(s) campo(s) corretamente.")
    }
    else {
        window.alert("Produto cadastrado com sucesso!")
    }
}

submitButton.addEventListener("click", () => {
    validation()
}

)

submitButton.onmouseover = () => {
    submitButton.style.width = "100%";
}

submitButton.onmouseout = () => {
    submitButton.style.width = "120px"
}
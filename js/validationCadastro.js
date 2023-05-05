const submitButton = document.getElementById("submit-button")
const referencia = document.getElementById("referencia")
const produto = document.getElementById("produto")
const vU = document.getElementById("valor_unitario")
const desc = document.getElementById("descricao")

function validation() {
    if (referencia.value == "" || produto.value == "" || vU.value == "" || desc.value == "") {
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
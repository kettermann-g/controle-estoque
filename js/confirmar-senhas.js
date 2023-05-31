
function confirmarSenhas() {
    var confSenha = $("#confirmar-senha-text").val();
    var senha = $("#senha").val();

    console.log("SENHA: " + senha);
    console.log("CONF SENHA: " + confSenha);

    if (confSenha === senha) {
        $("#conf-senha-texto").removeClass("senhas-nao-coincidem");
        $("#conf-senha-texto").addClass("senhas-coincidem");

        $("#id-i-senha-igual").removeClass("fa-circle-xmark");
        $("#id-i-senha-igual").addClass("fa-circle-check");

    } else {
        $("#conf-senha-texto").addClass("senhas-nao-coincidem");
        $("#conf-senha-texto").removeClass("senhas-coincidem");

        $("#id-i-senha-igual").addClass("fa-circle-xmark");
        $("#id-i-senha-igual").removeClass("fa-circle-check");
    }
}

$("#confirmar-senha-text").keyup(confirmarSenhas);
$("#senha").keyup(confirmarSenhas);
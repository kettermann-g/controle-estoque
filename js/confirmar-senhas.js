
function confirmarSenhas() {
    var confSenha = $("#confirmar-senha-text").val();
    var senha = $("#senha").val();

    console.log("SENHA: " + senha);
    console.log("CONF SENHA: " + confSenha);

    if (confSenha === senha && confSenha != "" && senha != "") {
        $("#conf-senha-texto").removeClass("senhas-nao-coincidem");
        $("#conf-senha-texto").addClass("senhas-coincidem");

        $("#id-i-senha-igual").removeClass("fa-circle-xmark");
        $("#id-i-senha-igual").addClass("fa-circle-check");

        var senhasBatem = true;

    } else {
        $("#conf-senha-texto").addClass("senhas-nao-coincidem");
        $("#conf-senha-texto").removeClass("senhas-coincidem");

        $("#id-i-senha-igual").addClass("fa-circle-xmark");
        $("#id-i-senha-igual").removeClass("fa-circle-check");

        var senhasBatem = false;
    }

    if (senha.length >= 8) {
        $("#caracteres-senha").removeClass("senhas-nao-coincidem");
        $("#caracteres-senha").addClass("senhas-coincidem");

        $("#id-i-senha-caracteres").removeClass("fa-circle-xmark");
        $("#id-i-senha-caracteres").addClass("fa-circle-check");

        var senhaOito = true;
    } else {
        $("#caracteres-senha").addClass("senhas-nao-coincidem");
        $("#caracteres-senha").removeClass("senhas-coincidem");

        $("#id-i-senha-caracteres").addClass("fa-circle-xmark");
        $("#id-i-senha-caracteres").removeClass("fa-circle-check");

        var senhaOito = false;
    }

    if (senhaOito && senhasBatem) {
        $("#button-right").prop("disabled", false);
    } else {
        $("#button-right").prop("disabled", true);
    }
}

$("#confirmar-senha-text").keyup(confirmarSenhas);
$("#senha").keyup(confirmarSenhas);
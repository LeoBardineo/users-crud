/* O intuito do validaForm é verificar se os inputs do usuário 
foram inseridos corretamente, e se tiver algum errado,
exibe uma mensagem de erro em um modal */

// Valida o formulário do registro.php
function validaFormRegistro(form){
    var username = formRegistro.username.value.trim();
    var useremail = formRegistro.useremail.value.trim();
    var userpassword = formRegistro.userpassword.value.trim();
    var confirmpassword = formRegistro.confirmpassword.value.trim();
    var errorMessage = 'Ocorreu os seguintes erros: <br>';
    var error = false;
    
    formRegistro.username.style.border = "1px solid #707070";
    formRegistro.useremail.style.border = "1px solid #707070";
    formRegistro.userpassword.style.border = "1px solid #707070";
    formRegistro.confirmpassword.style.border = "1px solid #707070";

    if(username == "" || username == null){
        var errorMessage = errorMessage + '<br>Nome de usuário vazio.';
        formRegistro.username.focus();
        formRegistro.username.style.border = "1px solid red";
        var error = true;
    }
    
    if(username.length < 4){
        var errorMessage = errorMessage + '<br>Nome de usuário muito pequeno.';
        formRegistro.username.focus();
        formRegistro.username.style.border = "1px solid red";
        var error = true;
    }

    if(username.length > 32){
        var errorMessage = errorMessage + '<br>Nome de usuário muito grande.';
        formRegistro.username.focus();
        formRegistro.username.style.border = "1px solid red";
        var error = true;
    }

    if(useremail == "" || useremail == null || useremail.indexOf("@") == -1 || useremail.indexOf(".") == -1){
        var errorMessage = errorMessage + '<br>Email vazio ou inválido.';
        formRegistro.useremail.focus();
        formRegistro.useremail.style.border = "1px solid red";
        var error = true;
    }
    
    if(useremail.length < 8){
        var errorMessage = errorMessage + '<br>Email muito pequeno.';
        formRegistro.useremail.focus();
        formRegistro.useremail.style.border = "1px solid red";
        var error = true;
    }

    if(useremail.length > 64){
        var errorMessage = errorMessage + '<br>Email muito grande.';
        formRegistro.useremail.focus();
        formRegistro.useremail.style.border = "1px solid red";
        var error = true;
    }

    if(userpassword == "" || userpassword == null){
        var errorMessage = errorMessage + '<br>Senha vazia.';
        formRegistro.userpassword.focus();
        formRegistro.userpassword.style.border = "1px solid red";
        var error = true;
    }

    if(userpassword.length < 4){
        var errorMessage = errorMessage + '<br>Senha muito pequena.';
        formRegistro.userpassword.focus();
        formRegistro.userpassword.style.border = "1px solid red";
        var error = true;
    }

    if(userpassword.length > 32){
        var errorMessage = errorMessage + '<br>Senha muito grande.';
        formRegistro.userpassword.focus();
        formRegistro.userpassword.style.border = "1px solid red";
        var error = true;
    }

    if(confirmpassword != userpassword){
        var errorMessage = errorMessage + '<br>Senhas não compatíveis.';
        formRegistro.confirmpassword.focus();
        formRegistro.confirmpassword.style.border = "1px solid red";
        var error = true;
    }

    if(error == true){
        iniciaModal('modal-messagebox','Erro na validação dos dados',errorMessage);
        return false;
    }else{
        var error = false;
        return true;
    }
}

// Valida o formulário do index.php
function validaFormLogin(form) {
    var username = formLogin.username.value.trim();
    var password = formLogin.password.value.trim();
    var errorMessage = 'Ocorreu os seguintes erros: <br>';
    var error = false;

    formLogin.username.style.border = "1px solid #707070";
    formLogin.password.style.border = "1px solid #707070";

    if(username == "" || username == null){
        var errorMessage = errorMessage + '<br>Nome de usuário vazio.';
        formLogin.username.focus();
        formLogin.username.style.border = "1px solid red";
        var error = true;
    }

    if(password == "" || password == null){
        var errorMessage = errorMessage + '<br>Senha vazia.';
        formLogin.password.focus();
        formLogin.password.style.border = "1px solid red";
        var error = true;
    }

    if(error == true){
        iniciaModal('modal-messagebox','Erro na validação dos dados',errorMessage);
        return false;
    }else{
        var error = false;
        return true;
    }
}

function validaFormAtualizar(form){
    var username = formatualizar.username.value.trim();
    var useremail = formatualizar.useremail.value.trim();
    var errorMessage = 'Ocorreu os seguintes erros: <br>';
    var error = false;

    formatualizar.username.style.border = "1px solid #707070";
    formatualizar.useremail.style.border = "1px solid #707070";

    if(username == "" || username == null){
        var errorMessage = errorMessage + '<br>Nome de usuário vazio.';
        formatualizar.username.focus();
        formatualizar.username.style.border = "1px solid red";
        var error = true;
    }

    if(username.length < 4){
        var errorMessage = errorMessage + '<br>Nome de usuário muito pequeno.';
        formatualizar.username.focus();
        formatualizar.username.style.border = "1px solid red";
        var error = true;
    }

    if(username.length > 32){
        var errorMessage = errorMessage + '<br>Nome de usuário muito grande.';
        formatualizar.username.focus();
        formatualizar.username.style.border = "1px solid red";
        var error = true;
    }

    if(useremail == "" || useremail == null || useremail.indexOf("@") == -1 || useremail.indexOf(".") == -1){
        var errorMessage = errorMessage + '<br>Email vazio ou inválido.';
        formatualizar.useremail.focus();
        formatualizar.useremail.style.border = "1px solid red";
        var error = true;
    }
    
    if(useremail.length < 8){
        var errorMessage = errorMessage + '<br>Email muito pequeno.';
        formatualizar.useremail.focus();
        formatualizar.useremail.style.border = "1px solid red";
        var error = true;
    }

    if(useremail.length > 64){
        var errorMessage = errorMessage + '<br>Email muito grande.';
        formatualizar.useremail.focus();
        formatualizar.useremail.style.border = "1px solid red";
        var error = true;
    }

    if(error == true){
        iniciaModal('modal-messagebox','Erro na validação dos dados',errorMessage);
        return false;
    }else{
        var error = false;
        return true;
    }
}
// Btn voltar
function voltar() {
  window.history.back();
}

// Confirmar se as senhas são iguais
function checkPassword() {
  const passwordInput = document.querySelector('input[name=password]');
  const confirmPasswordInput = document.querySelector('input[name=confirmPassword]');

  if (confirmPasswordInput.value === passwordInput.value){
    confirmPasswordInput.setCustomValidity('');
  }else {
    confirmPasswordInput.setCustomValidity('As senhas não conferem');
  }
}

// Padronizar camp cpf - cnpj de acordo com a entidade
document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('entidade').addEventListener('change', function () {
      var entidade = this.value;
      var cpfInput = document.getElementById('cpfCnpj');

      // Limpar o valor atual do campo
      cpfInput.value = '';

      // Remover estilos de validação (se houver)
      cpfInput.classList.remove('is-invalid');
      cpfInput.setCustomValidity('');

      // Define o tamanho de acordo com a entidade
      if (entidade === 'pf') {
          cpfInput.placeholder = 'Digite o CPF, somente números';
          cpfInput.maxLength = 14;
      } else {
          cpfInput.placeholder = 'Digite o CNPJ, somente números';
          cpfInput.maxLength = 17;
      }
  });
});

// Função para adicionnar mascara CPF CNPJ
var CpfCnpjMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length <= 11 ? '000.000.000-009' : '00.000.000/0000-00';
},
cpfCnpjpOptions = {
  onKeyPress: function(val, e, field, options) {
    field.mask(CpfCnpjMaskBehavior.apply({}, arguments), options);
  }
};

$(function() {
$(':input[name=cpfCnpj]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
})


// Validar Cep

const clearAddress = (address) => {
  document.getElementById('address').value = '';
  document.getElementById('city').value = '';
  document.getElementById('state').value = '';
}


const fillForm = (address) => {
  document.getElementById('address').value = address.logradouro;
  document.getElementById('city').value = address.localidade;
  document.getElementById('state').value = address.uf;
}

let isNumber = (number) => /^[0-9]+$/.test(number);
const cepValid = (cep) => cep.length == 8 && isNumber(cep);

const pesquisarCep = async() => {
  clearAddress();

  const cep = document.getElementById('cep').value;
  const url = `https://viacep.com.br/ws/${cep}/json/`;
  if (cepValid(cep)){
    const data = await fetch(url)
    const address = await data.json();
    if (address.hasOwnProperty('erro')){
      document.getElementById('address').value = 'Endereço não encontrado!';
    }else{
      fillForm(address);
    }
  }else{
    document.getElementById('address').value = 'Cep inválido!';
  }
}
document.getElementById('cep').addEventListener('focusout',pesquisarCep);


// Google Auth
function handleCredentialResponse(response) {
  const data = jwt_decode(response.credential)

  // Enviar para BD pelo back-end
  fullName.textContent = data.name
  sub.textContent = data.sub
  given_name.textContent = data.given_name
  family_name.textContent = data.family_name
  email.textContent = data.email
  verifiedEmail.textContent = data.email_verified
  picture.setAttribute("src", data.picture)
}

window.onload = function () {
  
  google.accounts.id.initialize({
    client_id: "535234385509-q1fst7ssi3g2pq3ctg4ab5k8k1ghqoto.apps.googleusercontent.com",
    callback: handleCredentialResponse
  }); 

  google.accounts.id.renderButton(
    document.getElementById("buttonDiv"), {
    theme: "filled_black",
    size: "large",
    type: "standard",
    shape: "rectangular",
    locale: "pt-BR",
    logo_alignment: "left",
    with: "547px"
  } // customization attributes
  );

  google.accounts.id.prompt(); // also display the One Tap dialog
}

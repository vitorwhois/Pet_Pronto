// Btn voltar
function voltar() {
  window.history.back();
}

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

//Register - Cep Validate
const addressForm = document.querySelector("#address-form");
const cepInput = document.querySelector("#cep");
const addressInput = document.querySelector("#logradouro");
const cityInput = document.querySelector("#cidade");
const regionInput = document.querySelector("#estado");
const formInputs = document.querySelectorAll("[data-input]");

const closeButton = document.querySelector("#close-message");

//Cep input
cepInput.addEventListener("keypress", (e) => {
  const onlyNumbers = /[0-9]|\./;
  const key = String.fromCharCode(e.keyCode);

  console.log(key);

  console.log(onlyNumbers.test(key));

  // allow only numbers
  if (!onlyNumbers.test(key)) {
    e.preventDefault();
    return;
  }
});


// Evento to get address
cepInput.addEventListener("keyup", (e) => {
  const inputValue = e.target.value;
  //   Check if we have a CEP
  if (inputValue.length === 8) {
    getAddress(inputValue);
  }
});

// Get address from API
const getAddress = async (cep) => {
  toggleLoader();

  cepInput.blur();

  const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

  const response = await fetch(apiUrl);

  const data = await response.json();

  console.log(data);
  console.log(formInputs);
  console.log(data.erro);

  // Show error and reset form - Msg de erro não esta aparecendo
  if (data.erro === "true") {
    if (!addressInput.hasAttribute("disabled")) {
      toggleDisabled();
    }

    addressForm.reset();
    toggleLoader();

    toggleMessage("CEP Inválido, tente novamente.");
    return;
  }

  
  // Activate disabled attribute if form is empty
  if (addressInput.value === "") {
    toggleDisabled();
  }

  addressInput.value = data.logradouro;
  cityInput.value = data.localidade;
  regionInput.value = data.uf;

  toggleLoader();
};

// Add or remove disable attribute
const toggleDisabled = () => {
  if (regionInput.hasAttribute("disabled")) {
    formInputs.forEach((input) => {
      input.removeAttribute("disabled");
    });
  } else {
    formInputs.forEach((input) => {
      input.setAttribute("disabled", "disabled");
    });
  }
};

// Show or hide loader
const toggleLoader = () => {
  const fadeElement = document.querySelector("#fade");
  const loaderElement = document.querySelector("#loader");

  fadeElement.classList.toggle("hide");
  loaderElement.classList.toggle("hide");
};

// Show or hide message 
const toggleMessage = (msg) => {
  const fadeElement = document.querySelector("#fade");
  const messageElement = document.querySelector("#message");

  const messageTextElement = document.querySelector("#message p");

  messageTextElement.innerText = msg;

  fadeElement.classList.toggle("hide");
  messageElement.classList.toggle("hide");
};

// Close message modal
closeButton.addEventListener("click", () => toggleMessage());

// Save address
addressForm.addEventListener("submit", (e) => {
  e.preventDefault();

  toggleLoader();

  setTimeout(() => {
    toggleLoader();

    toggleMessage("Endereço salvo com sucesso!");

    addressForm.reset();

    toggleDisabled();
  }, 1000);
});
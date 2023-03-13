import './bootstrap';

const menu = document.querySelector(".top-bar");

window.addEventListener("scroll", function() {
  if (window.scrollY > 0) {
    menu.classList.add("white");
    menu.classList.remove("transparent");
  } else {
    menu.classList.add("transparent");
    menu.classList.remove("white");
  }
});

(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()

  function inputHandler(masks, max, event) {
    var c = event.target;
    var v = c.value.replace(/\D/g, '');
    var m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
  }

let docMask = ['999.999.999-99', '99.999.999/9999-99'];
let doc = document.querySelector('.cpf');

if(doc) {
    VMasker(doc).maskPattern(docMask[0]);
    doc.addEventListener('input', inputHandler.bind(undefined, docMask, 14), false);
}

const cepInput = document.querySelector('.cep');
cepInput && VMasker(cepInput).maskPattern('99999-999');


cepInput && cepInput.addEventListener('change', () => {

    const cep = cepInput.value.replace('-', '');

    if (cep.length !== 8) {
      alert('CEP inválido');
      return;
    }

    // Faz uma requisição para a API do ViaCEP
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
      .then(response => response.json())
      .then(data => {

        let rua = document.getElementById('rua');
        let bairro = document.getElementById('bairro');
        let cidade = document.getElementById('cidade');
        let estado =  document.getElementById('estado')

        rua.value = data.logradouro;
        rua.readOnly = true;
        bairro.value = data.bairro;
        bairro.readOnly = true;
        cidade.value = data.localidade;
        cidade.readOnly = true;
        estado.value = data.uf;
        estado.readOnly = true;

      })
      .catch(error => {
        console.error(error);
      });
  });

const inputEmail = document.querySelector('#email');
if(inputEmail) {
    inputEmail.addEventListener('blur', validarEmail);

    function validarEmail() {
        const email = inputEmail.value;

        fetch(`/validar-email/${email}`)
            .then(response => response.json())
            .then(data => {
                if (data.email) {
                inputEmail.classList.add("is-invalid");
                } else {
                    inputEmail.classList.remove("is-invalid");
                }
            })
            .catch(error => console.error(error));
    }
}
const form = document.getElementById('form-funcionario');

document.addEventListener('DOMContentLoaded', function() {
    let deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(button => {

        button.addEventListener('click', function(event) {
          let id = event.target.parentElement.dataset.id

          let confirmButton = document.getElementById('confirm-delete-button');

          confirmButton.addEventListener('click', function() {

            fetch(`/funcionarios/${id}/delete`, {
              method: 'delete',
              headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })

              .then(function(response) {
              if (response.ok) {
                window.location.reload();
              }
            });
          });
        });
    })

});

document.addEventListener('DOMContentLoaded', function() {
    let deleteButtons = document.querySelectorAll('.delete-button-unit');

    deleteButtons.forEach(button => {

        button.addEventListener('click', function(event) {
          let id = event.target.parentElement.dataset.id

          let confirmButton = document.getElementById('confirm-delete-button');

          confirmButton.addEventListener('click', function() {

            fetch(`/unidades/${id}/delete`, {
              method: 'delete',
              headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })

              .then(function(response) {
              if (response.ok) {
                window.location.reload();
              }
            });
          });
        });
    })

});

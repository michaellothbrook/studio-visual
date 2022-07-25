// Webpack Imports
import * as bootstrap from "bootstrap";
import CepService from "./services/CepService";

(function () {
  "use strict";

  // Focus input if Searchform is empty
  [].forEach.call(document.querySelectorAll(".search-form"), (el) => {
    el.addEventListener("submit", function (e) {
      var search = el.querySelector("input");
      if (search.value.length < 1) {
        e.preventDefault();
        search.focus();
      }
    });
  });

  // Initialize Popovers: https://getbootstrap.com/docs/5.0/components/popovers
  var popoverTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="popover"]')
  );
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl, {
      trigger: "focus",
    });
  });

  const cepService = new CepService();
  const cep = document.querySelector("#cep");
  const spinner = document.querySelector(".spinner-border");

  cep.addEventListener("blur", function (e) {
    e.preventDefault();
    document.querySelector("#cep-btn").click();
  });

  document.querySelector("#cep-btn").addEventListener("click", function (e) {
    e.preventDefault();
    const cepValue = cep.value.replace(/\D/g, "");
    if (cepValue !== "") {
      const cepValidation = /^[0-9]{8}$/;

      if (cepValidation.test(cepValue)) {
        spinner.classList.remove("d-none");
        cepService.getCep(cepValue).then((data) => {
          if (data === undefined || data.erro || data.status === 400) {
            alert("CEP não encontrado");
            resetForm();
            spinner.classList.add("d-none");
          }
          const { logradouro, bairro, localidade, uf } = data;
          document.querySelector("#rua").value = logradouro;
          document.querySelector("#bairro").value = bairro;
          document.querySelector("#cidade").value = localidade;
          document.querySelector("#uf").value = uf;
          spinner.classList.add("d-none");
        });
      } else {
        alert("CEP inválido");
        resetForm();
      }
    }
  });

  function resetForm() {
    const form = document.querySelector("#cep-form");
    form.reset();
  }
})();

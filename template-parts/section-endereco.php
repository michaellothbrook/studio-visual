<?php

/**
 * Seção de endereço
 */
$theme_color = $fields['theme_color'];
$title = $fields['title'];
?>

<section class="block-wrapper">
  <div class="container">
    <div class="row justify-content-center">
      <header class="block-header col-12 col-lg-9 text-center">
        <h2 class="block-title h1 text-<?= $theme_color; ?>"><?= $title; ?></h2>
      </header>
      <div class="row justify-content-center">
        <div class="col-10">
          <div class="spinner-border d-none" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <form id="cep-form" action="">
            <div class="form-group">
              <label for="cep">CEP</label>
              <input name="cep" class="form-control" type="text" id="cep" value="" size="10" maxlength="9" placeholder="Digite seu cep">
            </div>
            <div class="form-group">
              <label for="rua">Rua</label>
              <input type="text" class="form-control" name="rua" id="rua" placeholder="Digite sua rua">
            </div>
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite seu bairro">
            </div>
            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite sua cidade">
            </div>
            <div class="form-group">
              <label for="uf">UF</label>
              <input type="text" class="form-control" name="uf" id="uf" placeholder="Digite seu uf">
            </div>
            <div class="text-center text-md-start">
              <button id="cep-btn" type="submit" class="mt-3 btn btn-<?= $theme_color; ?>">Buscar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php

use StudioVisualTeste\Admin\ThemeOptions;

/**
 * Common Blocks
 */

use StudioVisualTeste\Admin\Blocks\CommonBlocks;

include get_template_directory() . '/admin/blocks/CommonBlocks.php';

/**
 * Inicialização do Carbon Fields
 */
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
  require_once get_template_directory() . '/vendor/autoload.php';
  \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'crb_attach');


/**
 * Registra os blocos comuns
 */
function crb_attach()
{
  $theme_options = new ThemeOptions();
  $theme_options->crb_attach_theme_options();

  new CommonBlocks();
}

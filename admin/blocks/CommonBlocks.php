<?php


namespace StudioVisualTeste\Admin\Blocks;

/**
 * Theme Options
 */
include get_template_directory() . '/admin/theme_options.php';


// Carbon Fields Dependency

use Carbon_Fields\Block;
use Carbon_Fields\Field;

// Theme Dependency
use StudioVisualTeste\Admin\ThemeOptions;

class CommonBlocks
{
  private $theme_options;

  public function __construct()
  {
    $this->theme_options = new ThemeOptions();
    $this->crb_attach_common_blocks();
  }

  public function crb_attach_common_blocks()
  {
    Block::make(__('Formulário de endereço'))
      ->add_fields(array(
        Field::make('select', 'theme_color', 'Cor do tema')
          ->set_options($this->theme_options->get_colors())
          ->set_default_value('primary'),
        Field::make('text', 'title', 'Título')
          ->set_required(true),
      ))
      ->set_category('studio-visual-teste', 'Blocos Custom - Studio Visual Teste')
      ->set_icon('location')
      ->set_keywords(['endereço, cep, código postal'])
      ->set_description('Exibe o endereço com base no CEP')
      ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        include(locate_template('/template-parts/section-endereco.php'));
      });
  }
}

<?php

namespace StudioVisualTeste\Admin;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class ThemeOptions
{
  public function get_colors()
  {
    return array(
      'primary' => 'Dark blue',
      'success' => 'Green',
      'warning' => 'Yellow',
      'danger' => 'Red',
      'info' => 'Light blue',
      'dark' => 'Black',
      'light' => 'Light Gray',
    );
  }

  public function crb_attach_theme_options()
  {
    Container::make('theme_options', 'Opções do Tema')
      ->set_page_file('theme_options.php')
      ->add_tab('Opções do Header', array(
        Field::make('select', 'top_bar_color', 'Cor do Top Header')
          ->set_options($this->get_colors())
          ->set_default_value('dark'),
        Field::make('text', 'header_title', 'Título do Top Header')
      ))
      ->add_tab('Opções de redes sociais', array(
        Field::make('select', 'social_icons_color', 'Cor dos ícones')
          ->set_options($this->get_colors())
          ->set_default_value('primary'),
        Field::make('text', 'crb_network_facebook', 'Facebook')
          ->set_help_text('URL do Facebook'),
        Field::make('text', 'crb_network_instagram', 'Instagram')
          ->set_help_text('URL do Instagram'),
        Field::make('text', 'crb_network_linkedin', 'Linkedin')
          ->set_help_text('URL do Linkedin'),
      ))
      ->set_icon('dashicons-admin-generic');
  }
}

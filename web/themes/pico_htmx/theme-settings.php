<?php

/**
 * @file
 * Theme settings form for Pico HTMX theme.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function pico_htmx_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['pico_htmx'] = [
    '#type' => 'details',
    '#title' => t('Pico HTMX'),
    '#open' => TRUE,
  ];

  $form['pico_htmx']['font_size'] = [
    '#type' => 'number',
    '#title' => t('Font size'),
    '#min' => 12,
    '#max' => 18,
    '#default_value' => theme_get_setting('font_size'),
  ];

}

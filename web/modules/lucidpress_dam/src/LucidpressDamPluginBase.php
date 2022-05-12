<?php

namespace Drupal\lucidpress_dam;

use Drupal\Component\Plugin\PluginBase;
use Drupal\lucidpress_dam\Objects\LucidpressFolder;
use Drupal\lucidpress_dam\Objects\LucidpressImage;

/**
 * Base class for lucidpress_dam plugins.
 */
abstract class LucidpressDamPluginBase extends PluginBase implements LucidpressDamInterface {

  /**
   * {@inheritdoc}
   */
  public function getData() {
    $general_folder = new LucidpressFolder('100', 'general');
    $drupal_folder = new LucidpressFolder('101', 'drupal');
    $drupal_folder->addImage(new LucidpressImage(
      '100',
      'drupalTM',
      'https://www.drupal.org/files/drupal-wordmark.png',
      'https://www.drupal.org/files/drupal-wordmark.png',
      ['drupal', 'logo']
    ));
    $drupal_folder->addImage(new LucidpressImage(
      '101',
      'drupal_stacked',
      'https://www.drupal.org/files/Wordmark2_blue_RGB%281%29.png',
      'https://www.drupal.org/files/Wordmark2_blue_RGB%281%29.png',
      ['drupal', 'logo', 'stacked']
    ));
    $general_folder->addFolder($drupal_folder);
    return $general_folder->toArray();
  }

}

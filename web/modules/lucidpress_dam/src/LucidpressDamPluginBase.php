<?php

namespace Drupal\lucidpress_dam;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for lucidpress_dam plugins.
 */
abstract class LucidpressDamPluginBase extends PluginBase implements LucidpressDamInterface {

  /**
   * {@inheritdoc}
   */
  public function getData() {
    return ['example' => 'data'];
  }

}

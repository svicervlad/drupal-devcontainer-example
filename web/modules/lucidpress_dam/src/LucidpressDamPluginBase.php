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
  public function label() {
    // Cast the label to a string since it is a TranslatableMarkup object.
    return (string) $this->pluginDefinition['label'];
  }

}

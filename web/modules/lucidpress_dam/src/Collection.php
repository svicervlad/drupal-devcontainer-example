<?php

namespace Drupal\lucidpress_dam;

/**
 * Generate json media collection.
 */
class Collection {

  /**
   * The Plugin Manager.
   *
   * @var \Drupal\lucidpress_dam\LucidpressDamPluginManager
   */
  protected $pluginManager;

  /**
   * The controller constructor.
   *
   * @param \Drupal\lucidpress_dam\LucidpressDamPluginManager $pluginManager
   *   The plugin.manager service.
   */
  public function __construct(LucidpressDamPluginManager $pluginManager) {
    $this->pluginManager = $pluginManager;
  }

  /**
   * Basic method to generate collection.
   */
  public function generate() {
    $plugins = $this->pluginManager->getDefinitions();
  }

}

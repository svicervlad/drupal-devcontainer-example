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
    $result = [];
    foreach ($plugins as $plugin) {
      /** @var \Drupal\lucidpress_dam\LucidpressDamPluginBase $plugin */
      $plugin = $this->pluginManager->createInstance($plugin['id']);
      $plugin_data = $plugin->getData();
      $result = array_merge($result, $plugin_data);
    }
    $json = json_encode($result);
    return $json;
  }

}

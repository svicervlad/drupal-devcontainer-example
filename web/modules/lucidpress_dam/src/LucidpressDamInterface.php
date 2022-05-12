<?php

namespace Drupal\lucidpress_dam;

/**
 * Interface for lucidpress_dam plugins.
 */
interface LucidpressDamInterface {

  /**
   * Returns data collection.
   *
   * @return array
   *   The data array.
   */
  public function getData();

}

<?php

namespace Drupal\lucidpress_dam;

/**
 * Interface for lucidpress_dam plugins.
 */
interface LucidpressDamInterface {

  /**
   * Returns the translated plugin label.
   *
   * @return string
   *   The translated title.
   */
  public function label();

}

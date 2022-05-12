<?php

namespace Drupal\lucidpress_dam\Commands;

use Drupal\lucidpress_dam\Collection;
use Drush\Commands\DrushCommands;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 *
 * See these files for an example of injecting Drupal services:
 *   - http://cgit.drupalcode.org/devel/tree/src/Commands/DevelCommands.php
 *   - http://cgit.drupalcode.org/devel/tree/drush.services.yml
 */
class LucidpressDamCommands extends DrushCommands {

  /**
   * Lucidpress collection service.
   *
   * @var \Drupal\lucidpress_dam\Collection
   */
  protected $collection;

  /**
   * Construct.
   *
   * @param \Drupal\lucidpress_dam\Collection $collection
   *   Lucidpress collection service.
   */
  public function __construct(Collection $collection) {
    $this->collection = $collection;
  }

  /**
   * Generate media collection for lucidpress.
   *
   * @usage lucidpress_dam:gen
   *   Usage description
   *
   * @command lucidpress_dam:gen
   * @aliases lucidpress-gen
   */
  public function generateCollection() {
    $this->collection->generate();
    $this->logger()->success(dt('Done!.'));
  }

}

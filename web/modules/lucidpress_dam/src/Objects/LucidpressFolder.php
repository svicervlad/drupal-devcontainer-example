<?php

namespace Drupal\lucidpress_dam\Objects;

/**
 * LucidpressFolder object.
 *
 * Store data for lucidpress and return item.
 */
class LucidpressFolder implements \JsonSerializable {
  /**
   * ID of folder object.
   *
   * @var string
   */
  public string $id;

  /**
   * Folder name.
   *
   * @var string
   */
  public string $name;

  /**
   * Internal folders.
   *
   * @var array
   */
  protected array $folders;

  /**
   * Array of lucidpress images.
   *
   * @var array
   */
  protected array $images;

  /**
   * Construct folder object.
   *
   * @param string $id
   *   ID of folder object.
   * @param string $name
   *   Folder name.
   * @param array $folders
   *   Internal folders.
   * @param array $images
   *   Array of lucidpress images.
   */
  public function __construct(string $id = '', string $name = '', array $folders = [], array $images = []) {
    $this->id = $id;
    $this->name = $name;
    $this->folders = $folders;
    $this->images = $images;
  }

  /**
   * Generate array from object.
   *
   * @return array
   *   return associate array with keys: id, name, folders, images
   */
  public function toArray(): array {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'folders' => $this->folders,
      'images' => $this->images,
    ];
  }

  /**
   * Add new folder inside current folder.
   *
   * @param LucidpressFolder $folder
   *   LucidpressFolder object.
   */
  public function addFolder(LucidpressFolder $folder): void {
    $this->folders[] = $folder;
  }

  /**
   * {@inheritdoc}
   */
  public function jsonSerialize() {
    return $this->toArray();
  }

  /**
   * Add new images to current folder.
   *
   * @param LucidpressImage $image
   *   The LucidpressImage object.
   */
  public function addImage(LucidpressImage $image): void {
    $this->images[] = $image;
  }

}

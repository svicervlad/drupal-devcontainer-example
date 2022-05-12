<?php

namespace Drupal\lucidpress_dam\Objects;

/**
 * LucidpressImage object.
 *
 * Store data for lucidpress image and return image item.
 */
class LucidpressImage implements \JsonSerializable {

  /**
   * ID of image object.
   *
   * @var string
   */
  public string $id;

  /**
   * Image name.
   *
   * @var string
   */
  public string $name;

  /**
   * Image url.
   *
   * @var string
   */
  public string $url;

  /**
   * Image url for preview.
   *
   * @var string
   */
  public string $thumbnailUrl;

  /**
   * Image tags.
   *
   * @var array
   */
  public array $tags;

  /**
   * Construct image object.
   *
   * @param string $id
   *   ID of image object.
   * @param string $name
   *   Image name.
   * @param string $url
   *   Image url.
   * @param string $thumbnailUrl
   *   Image url for preview.
   * @param string[] $tags
   *   Image tags.
   */
  public function __construct(string $id = '', string $name = '', string $url = '', string $thumbnailUrl = '', array $tags = []) {
    $this->id = $id;
    $this->name = $name;
    $this->url = $url;
    $this->thumbnailUrl = $thumbnailUrl;
    $this->tags = $tags;
  }

  /**
   * Generate array from object.
   *
   * @return array
   *   return associate array with keys: id, name, url, thumbnailUrl, tags
   */
  public function toArray(): array {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'url' => $this->url,
      'thumbnailUrl' => $this->thumbnailUrl,
      'tags' => $this->tags,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function jsonSerialize() {
    return $this->toArray();
  }

}

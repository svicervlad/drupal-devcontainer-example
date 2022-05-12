<?php

namespace Drupal\lucidpress_dam;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\File\FileUrlGeneratorInterface;
use Drupal\file\FileRepositoryInterface;

/**
 * Generate json media collection.
 */
class Generator {

  // Lucidpress api version.
  const VESRION = 1;

  const MODULE_FILE_DIRECTORY = 'lucidpress_dam';

  /**
   * The Plugin Manager.
   *
   * @var \Drupal\lucidpress_dam\LucidpressDamPluginManager
   */
  protected $pluginManager;

  /**
   * The File Repository.
   *
   * @var \Drupal\file\FileRepository
   */
  protected $fileRepository;

  /**
   * The file system.
   *
   * @var \Drupal\Core\File\FileSystem
   */
  protected $fileSystem;

  /**
   * The file url generator.
   *
   * @var \Drupal\Core\File\FileUrlGenerator
   */
  protected $fileUrlGenerator;

  /**
   * The Config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
  protected $configFactory;

  /**
   * The controller constructor.
   *
   * @param \Drupal\lucidpress_dam\LucidpressDamPluginManager $pluginManager
   *   The plugin.manager service.
   * @param \Drupal\file\FileRepositoryInterface $fileRepository
   *   The file repository.
   * @param \Drupal\Core\File\FileSystemInterface $fileSystem
   *   The file system.
   * @param \Drupal\Core\File\FileUrlGeneratorInterface $fileUrlGenerator
   *   The file url generator.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   The Config factory.
   */
  public function __construct(LucidpressDamPluginManager $pluginManager, FileRepositoryInterface $fileRepository, FileSystemInterface $fileSystem, FileUrlGeneratorInterface $fileUrlGenerator, ConfigFactoryInterface $configFactory) {
    $this->pluginManager = $pluginManager;
    $this->fileRepository = $fileRepository;
    $this->fileSystem = $fileSystem;
    $this->fileUrlGenerator = $fileUrlGenerator;
    $this->configFactory = $configFactory;
  }

  /**
   * Basic method to generate collection.
   *
   * @param string $plugin_id
   *   The plugin id.
   *
   * @return string
   *   The file url.
   */
  public function generate(string $plugin_id): string {
    /** @var \Drupal\lucidpress_dam\LucidpressDamPluginBase $plugin */
    $plugin = $this->pluginManager->createInstance($plugin_id);
    $plugin_data = $plugin->getData();
    $data = json_encode([
      'version' => self::VESRION,
      'data' => $plugin_data,
    ]);

    // Prepare directory.
    $directory = $this->configFactory->get('system.file')->get('default_scheme') . '://' . self::MODULE_FILE_DIRECTORY . '/';
    $this->fileSystem->prepareDirectory($directory, FileSystemInterface::CREATE_DIRECTORY);
    $destination = $directory . $plugin_id . '.json';
    /** @var \Drupal\file\Entity\File $file */
    $file = $this->fileRepository->writeData($data, $destination, FileSystemInterface::EXISTS_REPLACE);
    $file->save();
    $url = $this->fileUrlGenerator->generateString($file->getFileUri());
    return $url;
  }

}

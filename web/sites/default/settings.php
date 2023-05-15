<?php

/**
 * @file
 * Drupal site-specific configuration file.
 */

$databases = [
  "default" => [
    "default" => [
      "database" => 'mariadb',
      "username" => 'mariadb',
      "password" => 'mariadb',
      "host" => "db",
      "port" => "3306",
      "driver" => "mysql",
      "prefix" => "",
    ],
  ],
];

$settings["file_temp_path"] = '/tmp';
$settings['config_sync_directory'] = 'configs';
$settings['file_public_path'] = 'sites/default/files';
$settings['file_private_path'] = __DIR__ . '/files/private';
$settings['trusted_host_patterns'] = ['^localhost$'];
$settings["hash_salt"] = 'dev-hash-salt';

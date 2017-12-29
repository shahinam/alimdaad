<?php

if (file_exists('../../conf/php/settings.php')) {
  include '../../conf/php/settings.php';
}

$config_directories[CONFIG_SYNC_DIRECTORY] = '../config/default';
$settings['file_private_path']  = DRUPAL_ROOT . '/sites/default/files/private';

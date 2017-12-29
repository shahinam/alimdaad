<?php

$config_directories[CONFIG_SYNC_DIRECTORY] = '../config/default';
$settings['file_private_path']  = DRUPAL_ROOT . '/sites/default/files/private';
$settings['install_profile'] = 'shade';

// Overridden below.
$settings['hash_salt'] = 'x71-h0ba8aiSubbiep1Quitach6Keiiekah2MuPaowai6i_I5ttE4ChqTR9eT3WmC4m-fP98mg';

/**
 * Environment specific overrides. like dev, prod
 * Keep this at bottom of file to override variables.
 */
if (file_exists('../../conf/php/settings.php')) {
  include '../../conf/php/settings.php';
}

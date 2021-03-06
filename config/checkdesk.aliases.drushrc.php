<?php
$aliases['prod'] = array(
  'site-list' => array(
    '@prod.7iber', 
    '@prod.alayyam', 
    '@prod.almasryalyoum', 
    '@prod.annahar', 
    '@prod.maan', 
    '@prod.meedan', 
    '@prod.weladelbalad', 
    '@prod.thetribune', 
    '@prod.madamasr', 
    '@prod.smex'
  ),
);
$aliases['qa'] = array(
  'site-list' => array('@qa.meedan'),
);
$aliases['dev'] = array(
  'site-list' => array('@dev.meedan'),
);
$aliases['ooew'] = array(
  'site-list' => array('@ooew.prod', '@ooew.dev'),
);

// prod aliases
$aliases['prod-alias'] = array (
  'remote-host' => 'www2.checkdesk.org',
  'root' => '/var/www/checkdesk.prod/current/drupal',
  'ssh-options' => '-p 43896',
  'path-aliases' =>
  array (
    '%drush' => '/usr/share/php/drush',
  ),
);
$aliases['prod.7iber'] = array (
  'parent' => '@prod-alias',
  'uri' => '7iber.checkdesk.org',
);
$aliases['prod.alayyam'] = array (
  'parent' => '@prod-alias',
  'uri' => 'alayyam.checkdesk.org',
);
$aliases['prod.almasryalyoum'] = array (
  'parent' => '@prod-alias',
  'uri' => 'almasryalyoum.checkdesk.org',
);
$aliases['prod.annahar'] = array (
  'parent' => '@prod-alias',
  'uri' => 'annahar.checkdesk.org',
);
$aliases['prod.maan'] = array (
  'parent' => '@prod-alias',
  'uri' => 'maan.checkdesk.org',
);
$aliases['prod.meedan'] = array (
  'parent' => '@prod-alias',
  'uri' => 'meedan.checkdesk.org',
);
$aliases['prod.weladelbalad'] = array (
  'parent' => '@prod-alias',
  'uri' => 'weladelbalad.checkdesk.org',
);
$aliases['prod.thetribune'] = array (
  'parent' => '@prod-alias',
  'uri' => 'thetribune.checkdesk.org',
);
$aliases['prod.madamasr'] = array (
  'parent' => '@prod-alias',
  'uri' => 'madamasr.checkdesk.org',
);
$aliases['prod.smex'] = array (
  'parent' => '@prod-alias',
  'uri' => 'smex.checkdesk.org',
);
$aliases['prod.smex'] = array (
  'parent' => '@prod-alias',
  'uri' => 'smex.checkdesk.org',
  'root' => '/var/www/checkdesk.prod/current/drupal',
);



// qa aliases
$aliases['qa-alias'] = array (
  'remote-host' => 'qa.checkdesk.org',
  'ssh-options' => '-p 43896',
  'path-aliases' =>
  array (
    '%drush' => '/usr/share/php/drush',
  ),
);

$aliases['qa.meedan'] = array (
  'parent' => '@qa-alias',
  'uri' => 'qa.checkdesk.org',
  'root' => '/var/www/checkdesk.qa/current/drupal',
);

// dev aliases
$aliases['dev-alias'] = array (
  'remote-host' => 'dev.checkdesk.org',
  'ssh-options' => '-p 43896',
  'path-aliases' => array (
    '%drush' => '/usr/share/php/drush',
  ),
);
$aliases['dev.meedan'] = array (
  'parent' => '@dev-alias',
  'uri' => 'dev.checkdesk.org',
  'root' => '/var/www/checkdesk.dev/current/drupal',
);

// ooew aliases
$aliases['ooew-alias'] = array (
  'ssh-options' => '-p 43896',
  'path-aliases' => array (
    '%drush' => '/usr/share/php/drush',
  ),
);
$aliases['ooew.prod'] = array (
  'parent' => '@ooew-alias',
  'remote-host' => 'www2.checkdesk.org',
  'uri' => 'ooew.checkdesk.org',
  'root' => '/var/www/ooew.prod/current/drupal',
);
$aliases['ooew.dev'] = array (
  'parent' => '@ooew-alias',
  'remote-host' => 'dev.checkdesk.org',
  'uri' => 'dev.ooew.checkdesk.org',
  'root' => '/var/www/ooew.dev/current/drupal',
);

// dev template
$aliases['local-alias'] = array(
  'target-command-specific' => array(
    'sql-sync' => array(
      'sanitize' => TRUE,
      'confirm-sanitizations' => TRUE,
      'no-ordered-dump' => TRUE,
      'no-cache' => TRUE,
      'create-db' => TRUE,
      'enable' => array(
        'checkdesk_devel_feature',
      ),
    ),
  ),
);
$aliases['local'] = array(
  'parent' => '@local-alias',
  'uri' => 'checkdesk.local',
  'root' => '/var/www/checkdesk/drupal',
);

include "checkdesk.aliases.local.php"

?>

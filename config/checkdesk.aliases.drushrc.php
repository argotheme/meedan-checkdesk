<?php
$aliases['prod'] = array(
  'site-list' => array('@prod.7iber', '@prod.alayyam', '@prod.almasryalyoum', '@prod.annahar', '@prod.maan', '@prod.meedan', '@prod.weladelbalad', '@prod.thetribune', '@prod.madamasr'),
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
  //'remote-user' => 'checkdeskdeploy',
  '%dump-dir' => '/home/checkdeskdeploy/drush-dumps',
  //'ssh-options' => '-i /home/checkdeskdeploy/.ssh/checkdeskdeploy -p 43896',
  'ssh-options' => '-p 43896',
  'path-aliases' =>
  array (
    '%drush' => '/usr/share/php/drush',
  ),
);
$aliases['prod.7iber'] = array (
  'parent' => '@prod-alias',
  'uri' => 'liveblog.7iber.com',
  'root' => '/var/www/checkdesk.prod/current/drupal',
);
$aliases['prod.alayyam'] = array (
  'parent' => '@prod-alias',
  'uri' => 'checkdesk.synews.info',
  'root' => '/var/www/checkdesk.prod/current/drupal',
);
$aliases['prod.almasryalyoum'] = array (
  'parent' => '@prod-alias',
  'uri' => 'liveblog.almasryalyoum.com',
  'root' => '/var/www/checkdesk.prod/current/drupal',
);
$aliases['prod.annahar'] = array (
  'parent' => '@prod-alias',
  'uri' => 'liveblog.annahar.com.lb',
  'root' => '/var/www/checkdesk.prod/current/drupal',
);
$aliases['prod.maan'] = array (
  'parent' => '@prod-alias',
  'uri' => 'maanblog.org',
  'root' => '/var/www/checkdesk.prod/current/drupal',
);
$aliases['prod.meedan'] = array (
  'parent' => '@prod-alias',
  'uri' => 'meedan.checkdesk.org',
  'root' => '/var/www/checkdesk.prod/current/drupal',
);
$aliases['prod.weladelbalad'] = array (
  'parent' => '@prod-alias',
  'uri' => 'yomaty.weladelbalad.com',
  'root' => '/var/www/checkdesk.prod/current/drupal',
);
$aliases['prod.thetribune'] = array (
  'parent' => '@prod-alias',
  'uri' => 'thetribune.checkdesk.org',
  'root' => '/var/www/checkdesk.prod/current/drupal',
);
$aliases['prod.madamasr'] = array (
  'parent' => '@prod-alias',
  'uri' => 'madamasr.checkdesk.org',
  'root' => '/var/www/checkdesk.prod/current/drupal',
);

// qa aliases
$aliases['qa-alias'] = array (
  'remote-host' => 'qa.checkdesk.org',
  //'remote-user' => 'checkdeskdeploy',
  '%dump-dir' => '/home/checkdeskdeploy/drush-dumps',
  //'ssh-options' => '-i /home/checkdeskdeploy/.ssh/checkdeskdeploy -p 43896',
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
  //'remote-user' => 'checkdeskdeploy',
  '%dump-dir' => '/home/checkdeskdeploy/drush-dumps',
  //'ssh-options' => '-i /home/checkdeskdeploy/.ssh/checkdeskdeploy -p 43896',
  'ssh-options' => '-p 43896',
  'path-aliases' =>
  array (
    '%drush' => '/usr/share/php/drush',
  ),
);
$aliases['dev.meedan'] = array (
  'parent' => '@dev-alias',
  'uri' => 'dev.checkdesk.org',
  'root' => '/var/www/checkdesk.dev/current/drupal',
  '#file' => '/etc/drush/sites.aliases.drushrc.php',
);

// ooew aliases
$aliases['ooew-alias'] = array (
  //'remote-user' => 'checkdeskdeploy',
  '%dump-dir' => '/home/checkdeskdeploy/drush-dumps',
  //'ssh-options' => '-i /home/checkdeskdeploy/.ssh/checkdeskdeploy -p 43896',
  'ssh-options' => '-p 43896',
  'path-aliases' =>
  array (
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
$aliases['defaults.localdev'] = array(
  'target-command-specific' => array(
    'sql-sync' => array(
      'sanitize' => TRUE,
      'confirm-sanitizations' => TRUE,
      'no-ordered-dump' => TRUE,
      'no-cache' => TRUE,
     /* 'enable' => array(
        'devel',
        'stage_file_proxy',
        'ds_ui',
        'fields_ui',
        'views_ui',
    ),*/
    ),
  ),
);
$aliases['localdev'] = array(
  'parent' => '@defaults.localdev',
  'uri' => 'mydev.checkdesk.org',
  'root' => '/Users/BarisW/Sites/company.com',
  'path-aliases' => array(
    '%dump' => '/tmp/checkdesk-dump.sql',
    '%files' => 'files',
  ),
);
?>

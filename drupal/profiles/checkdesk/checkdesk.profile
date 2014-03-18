<?php
/**
 * @file
 * Enables modules and site configuration for a standard site installation.
 */

/**
 * Implements hook_form_FORM_ID_alter() for install_configure_form().
 *
 * Allows the profile to alter the site configuration form.
 */
function checkdesk_form_install_configure_form_alter(&$form, $form_state) {
  // Pre-populate the site name with the server name.
  $form['site_information']['site_name']['#default_value'] = $_SERVER['SERVER_NAME'];
}

/**
 * Implements hook_install_tasks().
 */
function checkdesk_install_tasks($install_state) {
  $tasks['cd_import_translations'] = array(
    'display_name' => st('Import translations'),
    'type' => 'batch',
  );
  $tasks['cd_configration_form'] = array(
    'display_name' => st('Checkdesk Configration'),
    'display' => TRUE,
    'type' => 'form',
    'run' => INSTALL_TASK_RUN_IF_NOT_COMPLETED,
  );
  $tasks['cd_cleanup'] = array(
    'display_name' => st('Cleanup'),
    'type' => 'batch',
  );
 return $tasks;
}

function cd_import_translations() {
  include_once DRUPAL_ROOT . '/includes/locale.inc';
  include_once DRUPAL_ROOT . '/includes/language.inc';
  module_load_include('check.inc', 'l10n_update');
  module_load_include('batch.inc', 'l10n_update');
  //make translation as array to enforce adding multilanguage on future.
  $translations = array('ar');
  // Prepare batch process to enable languages and download translations.
  $operations = array();
  foreach ($translations as $translation) {
    locale_add_language(strtolower($translation));
    // Build batch with l10n_update module.
    $history = l10n_update_get_history();
    $available = l10n_update_available_releases();
    $updates = l10n_update_build_updates($history, $available);
    $operations = array_merge($operations, _l10n_update_prepare_updates($updates, NULL, array()));
  }
  //configure language settings.
  $providers = language_negotiation_info();
  $negotiation = array();
  $negotiation['locale-url'] = $providers['locale-url'];
  $negotiation['language-default'] = $providers['language-default'];
  language_negotiation_set('language', $negotiation);
  //update prefix for english language
  db_update('languages')
    ->fields(array(
      'prefix' => 'en',
    ))   
    ->condition('language', 'en')
    ->execute();
  $batch = l10n_update_batch_multiple($operations, LOCALE_IMPORT_KEEP);
  return $batch;
}


function cd_configration_form($form, &$form_state, &$install_state) {
  $form['cd_information'] = array(
    '#type' => 'fieldset',
    '#title' => st('Checkdesk Information'),
    '#collapsible' => FALSE,
  );
  $form['cd_information']['site_name'] = array(
    '#type' => 'textfield',
    '#title' => t('Site name [English]'),
    '#default_value' => variable_get('site_name', 'Drupal'),
    '#required' => TRUE,
  );
  $form['cd_information']['site_name_ar'] = array(
    '#type' => 'textfield',
    '#title' => t('Site name [Arabic]'),
    '#default_value' => variable_get('site_name', 'Drupal'),
    '#required' => TRUE
  );
  $form['cd_information']['site_slogan'] = array(
    '#type' => 'textfield',
    '#title' => t('Slogan [English]'),
    '#description' => t("How this is used depends on your site's theme."),
  );
  $form['cd_information']['site_slogan_ar'] = array(
    '#type' => 'textfield',
    '#title' => t('Slogan [Arabic]'),
    '#description' => t("How this is used depends on your site's theme."),
  );
  $form['cd_information']['checkdesk_site_owner'] = array(
    '#title' => st('Site owner [English]'),
    '#type' => 'textfield',
  );
  $form['cd_information']['checkdesk_site_owner_ar'] = array(
    '#title' => st('Site owner [Arabic]'),
    '#type' => 'textfield',
  );
  $form['cd_information']['checkdesk_site_owner_url'] = array(
    '#title' => st('Site owner URL'),
    '#type' => 'textfield',
  );
  $form['twitter_oauth'] = array(
    '#type' => 'fieldset',
    '#title' => st('Twitter Configration'),
    '#collapsible' => FALSE,
  );
  $form['twitter_oauth']['twitter_consumer_key'] = array(
    '#type' => 'textfield',
    '#title' => t('OAuth Consumer key'),
    '#default_value' => variable_get('twitter_consumer_key', NULL),
  );  
  $form['twitter_oauth']['twitter_consumer_secret'] = array(
    '#type' => 'textfield',
    '#title' => t('OAuth Consumer secret'),
    '#default_value' => variable_get('twitter_consumer_secret', NULL),
  ); 
  $form['facebook'] = array(
    '#type' => 'fieldset',
    '#title' => st('Facebook Configration'),
    '#collapsible' => FALSE,
  );
  $form['facebook']['fboauth_id'] = array(
    '#type' => 'textfield',
    '#title' => t('App ID'),
    '#size' => 20, 
    '#maxlengh' => 50, 
    '#description' => t('To use Facebook connect, a Facebook Application must be created. Set up your app in <a href="http://www.facebook.com/developers/apps.php">my apps</a> on Facebook.') . ' ' . t('Enter your App ID here.'),
    '#default_value' => variable_get('fboauth_id', ''),
  );  
  $form['facebook']['fboauth_secret'] = array(
    '#type' => 'textfield',
    '#title' => t('App Secret'),
    '#size' => 40, 
    '#maxlengh' => 50, 
    '#description' => t('To use Facebook connect, a Facebook Application must be created. Set up your app in <a href="http://www.facebook.com/developers/apps.php">my apps</a> on Facebook.') . ' ' . t('Enter your App Secret here.'),
    '#default_value' => variable_get('fboauth_secret', ''),
  ); 
  $form['cd_multilingual'] = array(
    '#type' => 'fieldset',
    '#title' => st('Multilingual feature'),
    '#collapsible' => FALSE,
  );
  $form['cd_multilingual']['enable_multilingual'] = array(
    '#type' => 'checkboxes',
    '#options' => array(
      1 => st('Enable multilingual feature'),
    ),
  );
  $form['actions'] = array('#type' => 'actions');
  $form['actions']['submit'] = array(
    '#type' => 'submit',
    '#value' => st('Save and continue'),
    '#weight' => 15,
  );
  return $form;
}

function cd_configration_form_submit($form, &$form_state) {
  $values = $form_state['values'];
  if(isset($values['site_name'])) {
    i18n_variable_set('site_name', $values['site_name'], 'en');
  }
  if (isset($values['site_name_ar'])) {
    i18n_variable_set('site_name', $values['site_name_ar'], 'ar');
  }
  if (isset($values['site_slogan'])) {
    i18n_variable_set('site_slogan', $values['site_slogan'], 'en');
  }
  if (isset($values['site_slogan_ar'])) {
    i18n_variable_set('site_slogan', $values['site_slogan_ar'], 'ar');
  }
  if (isset($values['checkdesk_site_owner'])) {
    i18n_variable_set('checkdesk_site_owner', $values['checkdesk_site_owner'], 'en');
  }
  if (isset($values['checkdesk_site_owner_ar'])) {
    i18n_variable_set('checkdesk_site_owner', $values['checkdesk_site_owner_ar'], 'ar');
  }
  variable_set('checkdesk_site_owner_url', $values['checkdesk_site_owner_url']);
  variable_set('twitter_consumer_key', $values['twitter_consumer_key']);
  variable_set('twitter_consumer_secret', $values['twitter_consumer_secret']);
  variable_set('fboauth_id', $values['fboauth_id']);
  variable_set('fboauth_secret', $values['fboauth_secret']);
  //enable core feature
  module_enable(array('checkdesk_core_feature'));
  if ($form_state['values']['enable_multilingual'][1]) {
    module_enable(array('checkdesk_multilingual_feature'));
  }
  //change l18n_update setting to import translation from local server.
  variable_set('l10n_update_download_store', 'sites/all/translations');
  variable_set('l10n_update_check_mode', '2');
}


function cd_cleanup() {
  $operations = array();
  $operations[] = array('_cd_cleanup_install_batch', array('checkdesk_featured_stories_feature', 'Checkdesk Featured Stories'));
  //$components = array('translations', 'menu_links', 'uuid_node');
  $components = array('translations');
  foreach ($components as $component) {
    $operations[] = array('_cd_cleanup_revert_batch', array('checkdesk_core_feature', $component));
  }
  $batch = array(
    'operations' => $operations,
    'title' => st('Cleanup installation'),
    'error_message' => st('The installation has encountered an error.'),
    'finished' => '_cd_cleanup_finished',
  );
  return $batch;
}

/**
 * 
 */
function _cd_cleanup_install_batch($module, $module_name, &$context) {
  module_enable(array($module), FALSE);
  $context['results'][] = $module;
  $context['message'] = st('Installed %module module.', array('%module' => $module_name));
}

/**
 * Revert overridden component
 */
function _cd_cleanup_revert_batch($feature, $component, &$context) {
  features_revert(array($feature => array($component)));
  $context['results'][] = $component;
  $context['message'] = st('Reverted %feature -- %component.', array('%feature' => $feature, '%component' => $component));
}

function _cd_cleanup_finished($success, $results, $operations) {
  //revert features
  //drupal_flush_all_caches();
  //update language settings
}


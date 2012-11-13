<?php
/**
 * @file
 * checkdesk_core_feature.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function checkdesk_core_feature_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "context" && $api == "context") {
    return array("version" => "3");
  }
  list($module, $api) = func_get_args();
  if ($module == "heartbeat" && $api == "heartbeat") {
    return array("version" => "1");
  }
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function checkdesk_core_feature_views_api() {
  return array("version" => "3.0");
}

/**
 * Implements hook_flag_default_flags().
 */
function checkdesk_core_feature_flag_default_flags() {
  $flags = array();
  // Exported flag: "Fact-checking".
  $flags['factcheck'] = array(
    'content_type' => 'node',
    'title' => 'Fact-checking',
    'global' => '1',
    'types' => array(
      0 => 'media',
      1 => 'discussion',
    ),
    'flag_short' => 'Flag for fact-checking',
    'flag_long' => '',
    'flag_message' => 'This report was flagged for fact-checking.',
    'unflag_short' => 'Unflag for fact-checking',
    'unflag_long' => '',
    'unflag_message' => 'This report was unflagged for fact-checking.',
    'unflag_denied_text' => '',
    'link_type' => 'toggle',
    'roles' => array(
      'flag' => array(
        0 => '2',
      ),
      'unflag' => array(
        0 => '2',
      ),
    ),
    'weight' => 0,
    'show_on_form' => 0,
    'access_author' => '',
    'show_on_page' => 1,
    'show_on_teaser' => 0,
    'show_contextual_link' => 1,
    'i18n' => 0,
    'module' => 'checkdesk_core_feature',
    'locked' => array(
      0 => 'name',
    ),
    'api_version' => 2,
  );
  // Exported flag: "Fact-checking on".
  $flags['factcheckon'] = array(
    'content_type' => 'node',
    'title' => 'Fact-checking on',
    'global' => '1',
    'types' => array(
      0 => 'media',
      1 => 'discussion',
    ),
    'flag_short' => 'Turn on fact-checking',
    'flag_long' => '',
    'flag_message' => '',
    'unflag_short' => 'Turn off fact-checking',
    'unflag_long' => '',
    'unflag_message' => '',
    'unflag_denied_text' => '',
    'link_type' => 'toggle',
    'roles' => array(
      'flag' => array(
        0 => '4',
      ),
      'unflag' => array(
        0 => '4',
      ),
    ),
    'weight' => 0,
    'show_on_form' => 0,
    'access_author' => '',
    'show_on_page' => 1,
    'show_on_teaser' => 1,
    'show_contextual_link' => 0,
    'i18n' => 0,
    'module' => 'checkdesk_core_feature',
    'locked' => array(
      0 => 'name',
    ),
    'api_version' => 2,
  );
  // Exported flag: "Graphic content".
  $flags['graphic'] = array(
    'content_type' => 'node',
    'title' => 'Graphic content',
    'global' => '1',
    'types' => array(
      0 => 'media',
    ),
    'flag_short' => 'Flag graphic content',
    'flag_long' => '',
    'flag_message' => 'This report was flagged as containing graphic content.',
    'unflag_short' => 'Unflag graphic content',
    'unflag_long' => '',
    'unflag_message' => 'This report was unflagged as containing graphic content.',
    'unflag_denied_text' => '',
    'link_type' => 'toggle',
    'roles' => array(
      'flag' => array(
        0 => '2',
      ),
      'unflag' => array(
        0 => '2',
      ),
    ),
    'weight' => 0,
    'show_on_form' => 0,
    'access_author' => '',
    'show_on_page' => 1,
    'show_on_teaser' => 0,
    'show_contextual_link' => 1,
    'i18n' => 0,
    'module' => 'checkdesk_core_feature',
    'locked' => array(
      0 => 'name',
    ),
    'api_version' => 2,
  );
  // Exported flag: "Spam".
  $flags['spam'] = array(
    'content_type' => 'node',
    'title' => 'Spam',
    'global' => '1',
    'types' => array(
      0 => 'media',
    ),
    'flag_short' => 'Flag spam',
    'flag_long' => '',
    'flag_message' => 'This report was flagged as spam.',
    'unflag_short' => 'Unflag spam',
    'unflag_long' => '',
    'unflag_message' => 'This report was unflagged as spam.',
    'unflag_denied_text' => '',
    'link_type' => 'toggle',
    'roles' => array(
      'flag' => array(
        0 => '2',
      ),
      'unflag' => array(
        0 => '2',
      ),
    ),
    'weight' => 0,
    'show_on_form' => 0,
    'access_author' => '',
    'show_on_page' => 1,
    'show_on_teaser' => 0,
    'show_contextual_link' => 1,
    'i18n' => 0,
    'module' => 'checkdesk_core_feature',
    'locked' => array(
      0 => 'name',
    ),
    'api_version' => 2,
  );
  return $flags;

}

/**
 * Implements hook_image_default_styles().
 */
function checkdesk_core_feature_image_default_styles() {
  $styles = array();

  // Exported image style: navigation_avatar.
  $styles['navigation_avatar'] = array(
    'name' => 'navigation_avatar',
    'effects' => array(
      2 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => '24',
          'height' => '24',
        ),
        'weight' => '1',
      ),
    ),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function checkdesk_core_feature_node_info() {
  $items = array(
    'post' => array(
      'name' => t('Liveblog Post'),
      'base' => 'node_content',
      'description' => t('A liveblog post.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
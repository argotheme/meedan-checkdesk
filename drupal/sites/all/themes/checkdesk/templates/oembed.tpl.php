<?php
/**
 * @file
 * Custom template file for oembed data
 * This is the template that is used to display rendered embedded media
 * It includes Youtube, Twitter etc.
 */
  if(isset($embed->provider_name)) {
    $provider = strtolower($embed->provider_name);
    $provider_class_name = str_replace('.', '_', $provider);
  }
?>
<div class="<?php print $classes . ' ' . $provider_class_name; ?>"<?php print $attributes; ?>>
  <?php if (isset($embed->geo) && is_array($embed->geo->coordinates)): ?>
    <p class="embed-geo-data"><?php print l('<i class="icon-pushpin"></i> ' . implode(', ', $embed->geo->coordinates), 'http://maps.google.com/?ie=UTF8&hq=&ll=' . $embed->geo->coordinates[0] . ',' . $embed->geo->coordinates[1] . '&z=13', array('html' => TRUE, 'attributes' => array('target' => '_blank'))); ?></p>
  <?php endif; ?> 

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <a href="<?php print $original_url; ?>"<?php print $title_attributes; ?>><?php print render($title); ?></a>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div<?php print $content_attributes; ?>>
    <?php print render($content); ?>
  </div>

  <?php if (isset($embed_error)) : ?>
    <div class="embederror"><?php print $embed_error ?></div>
  <?php endif ?>
</div>

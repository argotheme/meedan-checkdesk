<section class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <article class="update <?php if (isset($title)) { print ' with-title'; } else { ' no-title'; }?>">
    <div class="update-body">
      <?php print render($content['body']); ?>
    </div>
    <div class="added-by">
      <?php if (isset($user_avatar)) : ?>
          <?php print $user_avatar; ?>
      <?php endif; ?>
      <?php print $post_creation_info; ?>
    </div>
  </article>
</section>

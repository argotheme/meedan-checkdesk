<?php
  // dsm($content);
  // dsm($node);
?>
<section id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <article class="story">

    <?php if (isset($updates)) { ?>
      <div class="story-updates-wrapper">
        <?php print $updates; ?>
      </div>
    <?php } ?>

  </article>
</section>

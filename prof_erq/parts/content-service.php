<div class="propose">

  <?php if (has_post_thumbnail()): ?>
    <div class="propose__img">
      <?php the_post_thumbnail('full') ?>
    </div>
  <?php endif ?>
  
  <div class="propose__info">
    <h5><?php the_title() ?></h5>
    <?php the_excerpt() ?>
    <a href="<?php the_permalink() ?>" class="propose__btn btn btn--transparent">Узнать подробнее</a>
  </div>
</div>
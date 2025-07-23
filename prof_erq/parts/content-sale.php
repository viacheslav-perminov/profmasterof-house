<div class="stock-wrapper">
  <div class="flag">
    <span></span>
    <p>Акция</p>
  </div>
  <div class="stock">
    <?php the_post_thumbnail('full') ?>
    <h6><?php the_title() ?></h6>
    <?php the_excerpt() ?>
    <a href="<?php the_permalink() ?>" class="stock__btn btn">Узнать подробнее
      <span>
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 11L11 1M11 1H3.91667M11 1V8.08333" stroke="#654F1A" stroke-width="1.5"
          stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </span>
    </a>
  </div>
</div>
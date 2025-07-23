<div class="reviewte swiper-slide">
	<picture>
		<?php the_post_thumbnail('full') ?>
	</picture>
	<strong><?php the_title() ?></strong>
	<?php the_content() ?>
	<small><?= get_the_date('d.m.Y') ?></small>
</div>
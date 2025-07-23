<?php if ($field = get_field('video')): ?>
	<a href="<?= $field ?>" class="reviewvi swiper-slide" data-fancybox="gallary-customersvi">
		<?php the_post_thumbnail('full') ?>
		<span></span>
	</a>
	<?php endif ?>
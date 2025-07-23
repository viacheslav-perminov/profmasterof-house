<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php
	$featured_posts = get_field('objects_8', 'option');
	if($featured_posts): ?>

		<section class="care">
			<div class="container">
				<div class="care__content">
					<div class="care__title title show">

						<?php if ($field = get_field('title_8', 'option')): ?>
							<h3><?= $field ?></h3>
						<?php endif ?>

						<?php if ($field = get_field('text_8', 'option')): ?>
							<strong><?= $field ?></strong>
						<?php endif ?>

					</div>
					<div class="slider-container slider-container--care">
						<div class="care__slider-prev slider-btn slider-btn--prev">
							<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6 1L1 6L6 11" stroke="#FFD575" />
							</svg>
						</div>
						<div class="care__slider-next slider-btn slider-btn--next">
							<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 1L6 6L1 11" stroke="#FFD575" />
							</svg>
						</div>
						<div class="care__slider swiper">
							<div class="swiper-wrapper">

								<?php foreach($featured_posts as $post): 

									global $post;
									setup_postdata($post); ?>
									<?php get_template_part('parts/content', 'project', ['is_slider' => true, 'is_whole_card_link' => true]) ?>
								<?php endforeach; ?>

								<?php wp_reset_postdata(); ?>

							</div>
						</div>
					</div>

					<?php if ($field = get_field('link_8', 'option')): ?>
						<a href="<?= $field['url'] ?>" class="care__btn btn"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
					<?php endif ?>

				</div>
			</div>
		</section>

	<?php endif; ?>

	<?php endif; ?>
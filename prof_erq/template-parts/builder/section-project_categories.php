<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($terms_ids = get_field('categories_4', 'option')): ?>
		<section class="ideal">
			<div class="container">
				<div class="ideal__content">

					<?php if ($field = get_field('title_4', 'option')): ?>
						<div class="ideal__info">
							<div class="ideal__title title show">
								<h3><?= $field ?></h3>
							</div>
						</div>
					<?php endif ?>

					<div class="slider-container slider-container--ideal">
						<div class="ideal__slider-prev slider-btn slider-btn--prev">
							<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6 1L1 6L6 11" stroke="#FFD575" />
							</svg>
						</div>
						<div class="ideal__slider-next slider-btn slider-btn--next">
							<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 1L6 6L1 11" stroke="#FFD575" />
							</svg>
						</div>
						<div class="ideal__slider swiper">
							<div class="swiper-wrapper">

								<?php foreach ($terms_ids as $term_id): ?>
									<?php get_template_part('parts/content', 'project_cat', ['term_id' => $term_id]) ?>
								<?php endforeach ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>
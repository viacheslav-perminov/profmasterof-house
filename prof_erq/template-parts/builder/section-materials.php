<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if(have_rows('items_14', 'option')): ?>

		<section class="materials">
			<div class="container">
				<div class="materials__content">
					<div class="materials__title title show">

						<?php if ($field = get_field('title_14', 'option')): ?>
							<h3><?= $field ?></h3>
						<?php endif ?>

						<?php if ($field = get_field('text_14', 'option')): ?>
							<b><?= $field ?></b>
						<?php endif ?>

					</div>
					<div class="slider-container slider-container--materials">
						<div class="materials__slider-prev slider-btn slider-btn--prev">
							<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6 1L1 6L6 11" stroke="#FFD575" />
							</svg>
						</div>
						<div class="materials__slider-next slider-btn slider-btn--next">
							<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 1L6 6L1 11" stroke="#FFD575" />
							</svg>
						</div>
						<div class="materials__slider swiper">
							<div class="swiper-wrapper">

								<?php while(have_rows('items_14', 'option')): the_row() ?>

									<div class="materials__slider-item swiper-slide">

										<?php if ($field = get_sub_field('logo')): ?>
											<picture>
												<?= wp_get_attachment_image($field['ID'], 'full') ?>
											</picture>
										<?php endif ?>
										
										<?php if ($field = get_sub_field('name')): ?>
											<small><?= $field ?></small>
										<?php endif ?>
										
									</div>

								<?php endwhile ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php endif ?>

	<?php endif; ?>
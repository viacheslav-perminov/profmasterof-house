<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php $images = get_field('gallery_17', 'option');
	if($images): ?>

		<section class="certificates">
			<div class="container">
				<div class="certificates__content">

					<?php if ($field = get_field('title_17', 'option')): ?>
						<div class="certificates__title title show">
							 <?php if (is_front_page()): ?>
								<h3><?= $field ?></h3>
							<?php else: ?>
								<h1><?= $field ?></h1>
							<?php endif; ?>
						</div>
					<?php endif ?>

					<div class="slider-container slider-container--certificates">
						<div class="certificates__slider-prev slider-btn slider-btn--prev">
							<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6 1L1 6L6 11" stroke="#FFD575" />
							</svg>
						</div>
						<div class="certificates__slider-next slider-btn slider-btn--next">
							<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 1L6 6L1 11" stroke="#FFD575" />
							</svg>
						</div>
						<div class="certificates__slider swiper">
							<div class="swiper-wrapper">

								<?php foreach($images as $image): ?>

									<a class="certificates__slider-item swiper-slide">
										<?= wp_get_attachment_image($image['ID'], 'full') ?>
									</a>

								<?php endforeach; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php endif; ?>

	<?php endif; ?>
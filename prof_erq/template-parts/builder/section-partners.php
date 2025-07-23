<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php $images = get_field('gallery_16', 'option');
	if($images): ?>

		<section class="partners">
			<div class="container">
				<div class="partners__content">

					<?php if ($field = get_field('title_16', 'option')): ?>
						<div class="partners__title title show">
							<h3><?= $field ?></h3>
						</div>
					<?php endif ?>
					
					<div class="partners__items">

						<?php foreach($images as $image): ?>

							<div class="partners__item">
								<?= wp_get_attachment_image($image['ID'], 'full') ?>
							</div>

						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</section>

	<?php endif; ?>

	<?php endif; ?>
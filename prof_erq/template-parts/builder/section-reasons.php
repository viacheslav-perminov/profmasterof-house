<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if(have_rows('items_15', 'option')): ?>

		<section class="trust">
			<div class="container">
				<div class="trust__content">
					<div class="trust__title title show">

						<?php if ($field = get_field('title_15', 'option')): ?>
							<h3><?= $field ?></h3>
						<?php endif ?>

						<?php if ($field = get_field('text_15', 'option')): ?>
							<b><?= $field ?></b>
						<?php endif ?>

					</div>
					<div class="trust__items">

						<?php if ($field = get_field('image_15', 'option')): ?>
							<?= wp_get_attachment_image($field['ID'], 'full') ?>
						<?php endif ?>

						<?php while(have_rows('items_15', 'option')): the_row() ?>

							<div class="trust__item">

								<?php if ($field = get_sub_field('icon')): ?>
									<span>
										<?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
											<img class="img-svg" src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
										<?php else: ?>
											<?= wp_get_attachment_image($field['ID'], 'full') ?>
										<?php endif ?>
									</span>
								<?php endif ?>

								<?php if ($field = get_sub_field('title')): ?>
									<strong><?= $field ?></strong>
								<?php endif ?>

								<?php the_sub_field('text') ?>

							</div>

						<?php endwhile ?>

					</div>
				</div>
			</div>
		</section>

	<?php endif ?>

	<?php endif; ?>
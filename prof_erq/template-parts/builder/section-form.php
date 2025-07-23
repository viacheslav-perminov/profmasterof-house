<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="decoration">
		<div class="container">
			<div class="decoration__content">
				<div class="decoration__info">

					<?php if ($field = get_field('title_13', 'option')): ?>
						<div class="decoration__title title title--left show">
							<h3><?= $field ?></h3>
						</div>
					<?php endif ?>

					<?php if ($field = get_field('subtitle_13', 'option')): ?>
						<strong><?= $field ?></strong>
					<?php endif ?>

					<?php if(have_rows('items_13', 'option')): ?>

						<ul>

							<?php while(have_rows('items_13', 'option')): the_row() ?>

								<li>

									<?php if ($field = get_sub_field('icon')): ?>
										<span>
											<?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
												<img class="img-svg" src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
											<?php else: ?>
												<?= wp_get_attachment_image($field['ID'], 'full') ?>
											<?php endif ?>
										</span>
									<?php endif ?>
									
									<?php if ($field = get_sub_field('text')): ?>
										<p><?= $field ?></p>
									<?php endif ?>
									
								</li>

							<?php endwhile ?>

						</ul>

					<?php endif ?>

					<?php if ($field = get_field('text_13', 'option')): ?>
						<div class="decoration__label"><?= $field ?></div>
					<?php endif ?>

				</div>

				<?php if ($field = get_field('form_13', 'option')): ?>
					<?= do_shortcode('[contact-form-7 id="' . $field. '" html_class="decoration__form"]') ?>
					<div class="gratitude gratitude-2">
						<span>
							<svg width="32" height="24" viewBox="0 0 32 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 14L9.5 22.5L31 1" stroke="#65BC54" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
							</svg>
						</span>
						<strong>Заявка успешно отправлена!</strong>
						<p>Наш менеджер свяжется с вами в ближайшее время!</p>
					</div>
				<?php endif ?>

			</div>
		</div>
	</section>

	<?php endif; ?>
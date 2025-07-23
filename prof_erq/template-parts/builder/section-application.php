<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="application"<?php if($field = get_field('image_7', 'option')) echo ' style="background-image: url(' . $field['url'] . ');"' ?>>
		<div class="container">
			<div class="application__content">

				<?php if ($field = get_field('title_7', 'option')): ?>
					<div class="application__title title show">
						<h3><?= $field ?></h3>
					</div>
				<?php endif ?>
				
				<?php if ($field = get_field('form_7', 'option')): ?>
					<?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="feedback__form feedback__form--application"]') ?>
					<div class="gratitude gratitude-4">
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
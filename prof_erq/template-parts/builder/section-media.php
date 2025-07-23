<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="interview">
		<div class="container">
			<div class="interview__content">
				<div class="interview__info">

					<?php if ($field = get_field('title_23', 'option')): ?>
						<div class="interview__title title title--left show">
							<h3><?= $field ?></h3>
						</div>
					<?php endif ?>

					<?php the_field('text_23', 'option') ?>

				</div>
				<div class="interview__img">

					<?php if ($field = get_field('logo_23', 'option')): ?>
						<span>
							<?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
								<img class="img-svg" src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
							<?php else: ?>
								<?= wp_get_attachment_image($field['ID'], 'full') ?>
							<?php endif ?>
						</span>
					<?php endif ?>

					<?php if ($field = get_field('video_23', 'option')): ?>
						<a href="<?= $field ?>" data-fancybox>

							<?php if ($image = get_field('image_23', 'option')): ?>
								<?= wp_get_attachment_image($image['ID'], 'full') ?>
							<?php endif ?>

							<span></span>
						</a>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>
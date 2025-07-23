<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="faq">
		<div class="container">
			<div class="faq__content">
				<img src="<?= get_stylesheet_directory_uri() ?>/img/main-faq-1.png" alt="image">
				<img src="<?= get_stylesheet_directory_uri() ?>/img/main-faq-2.png" alt="image">

				<?php if ($field = get_field('title_21', 'option')): ?>
					<div class="faq__title title show">
						<h3><?= $field ?></h3>
					</div>
				<?php endif ?>

				<?php if(have_rows('items_21', 'option')): ?>

					<div class="faq__accordion accordion">

						<?php while(have_rows('items_21', 'option')): the_row() ?>

							<div class="accordion__item">
								<div class="accordion__label">
									<b>?</b>
									<strong><?php the_sub_field('title') ?></strong>
									<span></span>
								</div>
								<div class="accordion__info">
									<div class="accordion__info-text">
										<p><?php the_sub_field('text') ?></p>
									</div>
								</div>
							</div>

						<?php endwhile ?>

					</div>

				<?php endif ?>

				<?php if (($field = get_field('bottom_21', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
				<div class="faq__messendger">

					<?php if ($field['title']): ?>
						<strong><?= $field['title'] ?></strong>
					<?php endif ?>
					
					<?php if ($field['text']): ?>
						<p><?= $field['text'] ?></p>
					<?php endif ?>
					
					<?php if ($field['link']): ?>
						<a href="<?= $field['link']['url'] ?>" class="messedger-btn"<?php if($field['link']['target']) echo ' target="_blank"' ?>>

							<?php if ($field['icon']): ?>
								<?php if (pathinfo($field['icon']['url'])['extension'] == 'svg'): ?>
									<img class="img-svg" src="<?= $field['icon']['url'] ?>" alt="<?= $field['icon']['alt'] ?>">
								<?php else: ?>
									<?= wp_get_attachment_image($field['icon']['ID'], 'full') ?>
								<?php endif ?>
							<?php endif ?>
							
							<?= $field['link']['title'] ?>
						</a>
					<?php endif ?>

				</div>
			<?php endif ?>
			
		</div>
	</div>
</section>

<?php endif; ?>
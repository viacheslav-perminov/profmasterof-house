<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$page_id = 38;
	$is_page = is_page($page_id);
	?>

	<section class="personally<?php if($is_page) echo ' personally--about' ?>">

		<?php if ($field = get_field('image_10', 'option')): ?>
			<?= wp_get_attachment_image($field['ID'], 'full') ?>
		<?php endif ?>

		<div class="container">
			<div class="personally__content">
				<div class="personally__img">
					<div class="personally__img-name">

						<?php if ($field = get_field('name_10', 'option')): ?>
							<strong><?= $field ?></strong>
						<?php endif ?>

						<?php if ($field = get_field('position_10', 'option')): ?>
							<small><?= $field ?></small>
						<?php endif ?>

					</div>
					<div class="personally__img-feedback">

						<?php if ($field = get_field('text_10', 'option')): ?>
							<p><?= $field ?></p>
						<?php endif ?>

						<div class="personally__img-contact">

							<?php if ($field = get_field('phone_10', 'option')): ?>
								<a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a>
							<?php endif ?>

							<?php if (($field = get_field('socials_10', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
							<div class="socials">

								<?php foreach ($field['items'] as $item): ?>
									<?php if ($item['link'] && $item['icon']): ?>
										<a href="<?= $item['link']['url'] ?>" class="social social--<?= basename($item['icon']['url'], '.svg') ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
											<?php if (pathinfo($item['icon']['url'])['extension'] == 'svg'): ?>
												<img class="img-svg" src="<?= $item['icon']['url'] ?>" alt="<?= $item['icon']['alt'] ?>">
											<?php else: ?>
												<?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
											<?php endif ?>
										</a>
									<?php endif ?>
								<?php endforeach ?>

							</div>
						<?php endif ?>

					</div>

					<?php if ($field = get_field('link_10', 'option')): ?>
						<a href="<?= $field['url'] ?>" class="personally__btn btn"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
					<?php endif ?>

				</div>
			</div>
			<div class="personally__info show">

				<?php if (is_page($page_id)): ?>
					<h1>О нас</h1>
				<?php endif; ?>
						
				<?php the_field('description_10', 'option') ?>

				<?php if (($field = get_field('doc_10', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
				<div class="personally__certificate">

					<?php if ($field['image']): ?>
						<a>
							<?= wp_get_attachment_image($field['image']['ID'], 'full') ?>
						</a>
					<?php endif ?>

					<?php if ($field['text']): ?>
						<small><?= $field['text'] ?></small>
					<?php endif ?>
					
				</div>
			<?php endif ?>

		</div>
	</div>
</div>
</section>

<?php endif; ?>
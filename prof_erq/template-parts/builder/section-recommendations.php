<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$page_id = 52;
	$is_page = is_page($page_id);
	$posts_per_page = $is_page ? 99999 : 4;
	?>

	<?php if(have_rows('items_19', 'option')): ?>

		<section class="recommendations">
			<div class="container">
				<div class="recommendations__content">

					<?php if ($field = get_field('title_19', 'option')): ?>
						<div class="recommendations__title title show">
							<?php if (is_front_page()): ?>
								<h3><?= $field ?></h3>
							<?php else: ?>
								<h1><?= $field ?></h1>
							<?php endif; ?>
							</div>
					<?php endif ?>

					<div class="recommendations__items">

						<?php while(have_rows('items_19', 'option')): the_row() ?>

							<?php if (($video = get_sub_field('video')) && get_row_index() <= $posts_per_page): ?>
								<div class="recommendation">
									<a href="<?= $video ?>" data-fancybox="gallary-recommendations">

										<?php if ($field = get_sub_field('image')): ?>
											<?= wp_get_attachment_image($field['ID'], 'full') ?>
										<?php endif ?>

										<span></span>
									</a>

									<?php if ($field = get_sub_field('text')): ?>
										<p><?= $field ?></p>
									<?php endif ?>

								</div>
							<?php endif ?>

						<?php endwhile ?>

					</div>

					<?php if (($field = get_field('link_19', 'option')) && !$is_page): ?>
						<a href="<?= $field['url'] ?>" class="recommendations__btn btn"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
					<?php endif ?>

				</div>
			</div>
		</section>

	<?php endif ?>

	<?php endif; ?>
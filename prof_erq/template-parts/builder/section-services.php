<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$page_id = 34;
	$is_page = is_page($page_id);
	?>

	<?php
	$featured_posts = $is_page ? get_posts(array('post_type' => 'service', 'posts_per_page' => -1)) : get_field('services_3', 'option');
	if($featured_posts): ?>

		<section class="proposes">
			<div class="container">
				<div class="proposes__content">

					<?php if ($field = get_field('title_3', 'option')): ?>
						<div class="proposes__title title show">
							<?php if (is_front_page()): ?>
								<h2><?= $field ?></h2>
							<?php else: ?>
								<h1><?= $field ?></h1>
                    		<?php endif; ?>
						</div>
					<?php endif ?>
					
					<div class="proposes__items">

						<?php foreach($featured_posts as $post): 

							global $post;
							setup_postdata($post); ?>
							<?php get_template_part('parts/content', 'service') ?>
						<?php endforeach; ?>
						
						<?php wp_reset_postdata(); ?>

					</div>
					<div class="proposes__img"<?php if($field = get_field('image_3', 'option')) echo ' style="background-image: url(' . $field['url'] . ');"' ?>></div>
				</div>
			</div>
		</section>

	<?php endif; ?>

	<?php endif; ?>
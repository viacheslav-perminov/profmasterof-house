<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$page_id = 54;
	$is_page = is_page($page_id);
	?>

	<section class="relevant">
		<div class="container">
			<div class="relevant__content">

				<?php if ($field = get_field('title_9', 'option')): ?>
					<div class="relevant__title title show">
						<?php if (is_front_page()): ?>
							<h3><?= $field ?></h3>
						<?php else: ?>
							<h1><?= $field ?></h1>
						<?php endif; ?>
					</div>
				<?php endif ?>

				<?php if ($is_page): ?>

					<?php 
					$args = array(
						'post_type' => 'sale',  
						'paged' => get_query_var('paged')
					);
					$wp_query = new WP_Query($args);
					if($wp_query->have_posts()): 
						?>

						<div class="stocks__items">
							<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
								<?php get_template_part('parts/content', 'sale') ?>
							<?php endwhile; ?>
						</div>
						
						<?php 
					endif;
					kama_pagenavi([], $wp_query);
					wp_reset_query(); 
					?>

				<?php else: ?>

					<?php
					$featured_posts = get_field('sales_9', 'option');
					if($featured_posts): ?>

						<div class="relevant__items">

							<?php foreach($featured_posts as $post): 

								global $post;
								setup_postdata($post); ?>
								<?php get_template_part('parts/content', 'sale') ?>
							<?php endforeach; ?>

							<?php wp_reset_postdata(); ?>

						</div>

					<?php endif; ?>

				<?php endif ?>

			</div>
		</div>
	</section>

	<?php endif; ?>
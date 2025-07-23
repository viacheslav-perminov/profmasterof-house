<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$page_id = 44;
	$is_page = is_page($page_id);
	?>

	<section class="news">
		<div class="container">
			<div class="news__content">

				<?php if ($field = get_field('title_18', 'option')): ?>
					<div class="news__title title show<?php if($is_page) echo ' title--left' ?>">
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
						'post_type' => 'post', 
						'paged' => get_query_var('paged')
					);
					$wp_query = new WP_Query($args);
					if($wp_query->have_posts()): 
						?>

						<div class="news__items">

							<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
								<?php get_template_part('parts/content', 'post') ?>
							<?php endwhile; ?>

						</div>

						<?php 
					endif;
					kama_pagenavi([], $wp_query);
					wp_reset_query(); 
					?>

				<?php else: ?>

					<?php
					$featured_posts = get_field('articles_18', 'option');
					if($featured_posts): ?>

						<div class="news__items">

							<?php foreach($featured_posts as $post): 

								global $post;
								setup_postdata($post); ?>
								<?php get_template_part('parts/content', 'post') ?>
							<?php endforeach; ?>

							<?php wp_reset_postdata(); ?>

						</div>

						<?php if ($field = get_field('link_18', 'option')): ?>
							<a href="<?= $field['url'] ?>" class="news__btn btn"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
						<?php endif ?>

					<?php endif; ?>

				<?php endif ?>

			</div>
		</div>
	</section>

	<?php endif; ?>
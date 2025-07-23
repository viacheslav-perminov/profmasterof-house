<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$page_id = 40;
	$is_page = is_page($page_id);
	$posts_per_page = $is_page ? -1 : 4;
	?>

	<?php 
	$terms = get_terms( [
		'taxonomy' => 'testimonial_cat',
	] );
	?>

	<?php if ($terms): ?>

		<?php if ($is_page): ?>
			<section class="reviews">
				<div class="container">
					<div class="reviews__content">

						<?php if ($field = get_field('title_20', 'option')): ?>
							<div class="customers__title title show">
								<h3><?= $field ?></h3>
							</div>
						<?php endif ?>

						<div class="customers__tabs" data-tabs="customers-tabs">
							<div class="tabs__nav">

								<?php foreach ($terms as $term): ?>
									<div class="tabs__nav-btn"><?= $term->name ?></div>
								<?php endforeach ?>

							</div>
							<div class="tabs__panels">

								<?php foreach ($terms as $term): ?>
									<div class="tabs__panel">

										<?php 
										$args = array(
											'post_type' => 'testimonial', 
											'posts_per_page' => $posts_per_page, 
											'tax_query' => array(
												array(
													'taxonomy' => 'testimonial_cat',
													'field'    => 'id',
													'terms'    => $term->term_id,
												)
											),
											'paged' => get_query_var('paged')
										);
										$wp_query = new WP_Query($args);
										if($wp_query->have_posts()): 
											?>

											<?php if ($term->term_id == 10): ?>
												<div class="reviews__items-video">

													<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
														<?php get_template_part('parts/content', 'testimonial_video') ?>
													<?php endwhile; ?>

												</div>
											<?php endif ?>

											<?php if ($term->term_id == 11): ?>
												<div class="reviews__items-text">

													<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
														<?php get_template_part('parts/content', 'testimonial_text') ?>
													<?php endwhile; ?>

												</div>
											<?php endif ?>

											<?php 
										endif;
										wp_reset_query(); 
										?>

									</div>
								<?php endforeach ?>

							</div>
						</div>
					</div>
				</div>
			</section>
		<?php else: ?>
			<section class="customers">
				<div class="container">
					<div class="customers__content">

						<?php if ($field = get_field('title_20', 'option')): ?>
							<div class="customers__title title show">
								<h3><?= $field ?></h3>
							</div>
						<?php endif ?>

						<div class="customers__tabs" data-tabs="customers-tabs">
							<div class="tabs__nav">

								<?php foreach ($terms as $term): ?>
									<div class="tabs__nav-btn"><?= $term->name ?></div>
								<?php endforeach ?>

							</div>
							<div class="tabs__panels">

								<?php foreach ($terms as $term): ?>
									<div class="tabs__panel">

										<?php 
										$args = array(
											'post_type' => 'testimonial', 
											'posts_per_page' => $posts_per_page, 
											'tax_query' => array(
												array(
													'taxonomy' => 'testimonial_cat',
													'field'    => 'id',
													'terms'    => $term->term_id,
												)
											),
											'paged' => get_query_var('paged')
										);
										$wp_query = new WP_Query($args);
										if($wp_query->have_posts()): 
											?>

											<?php if ($term->term_id == 10): ?>
												<div class="slider-container slider-container--customersvi">
													<div class="customersvi__slider-prev slider-btn slider-btn--prev">
														<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M6 1L1 6L6 11" stroke="#FFD575" />
														</svg>
													</div>
													<div class="customersvi__slider-next slider-btn slider-btn--next">
														<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M1 1L6 6L1 11" stroke="#FFD575" />
														</svg>
													</div>
													<div class="customersvi__slider swiper">
														<div class="swiper-wrapper">

															<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
																<?php get_template_part('parts/content', 'testimonial_video') ?>
															<?php endwhile; ?>

														</div>
													</div>
												</div>
											<?php endif ?>

											<?php if ($term->term_id == 11): ?>
												<div class="slider-container slider-container--customerste">
													<div class="customerste__slider-prev slider-btn slider-btn--prev">
														<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M6 1L1 6L6 11" stroke="#FFD575" />
														</svg>
													</div>
													<div class="customerste__slider-next slider-btn slider-btn--next">
														<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M1 1L6 6L1 11" stroke="#FFD575" />
														</svg>
													</div>
													<div class="customerste__slider swiper">
														<div class="swiper-wrapper">

															<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
																<?php get_template_part('parts/content', 'testimonial_text') ?>
															<?php endwhile; ?>

														</div>
													</div>
												</div>
											<?php endif ?>

											<?php 
										endif;
										wp_reset_query(); 
										?>

									</div>
								<?php endforeach ?>

							</div>
						</div>

						<?php if ($field = get_field('link_20', 'option')): ?>
							<a href="<?= $field['url'] ?>" class="customers__btn btn btn--transparent"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
						<?php endif ?>

					</div>
				</div>
			</section>
		<?php endif ?>
		
	<?php endif ?>

	<?php endif; ?>
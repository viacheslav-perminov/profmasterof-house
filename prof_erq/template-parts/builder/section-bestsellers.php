<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$terms = get_terms( [
		'taxonomy' => 'object_cat',
	] );
	?>

	<?php if ($terms): ?>
		<section class="hits">
			<div class="container">
				<div class="hits__content">
					<div class="hits__tabs" data-tabs="hits-tabs">
						<div class="hits__title title title--left show">

							<?php if ($field = get_field('title_6', 'option')): ?>
								<h3><?= $field ?></h3>
							<?php endif ?>

							<div class="slider-container slider-container--hits-tabs">
								<div class="tabs-nav__slider-prev slider-btn slider-btn--prev">
									<svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11 1L1 11L11 21" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
								<div class="tabs-nav__slider swiper">
									<div class="swiper-wrapper tabs__nav">

										<?php foreach ($terms as $term): ?>
											<div class="tabs__nav-btn swiper-slide"><?= $term->name ?></div>
										<?php endforeach ?>

									</div>
								</div>
								<div class="tabs-nav__slider-next slider-btn slider-btn--next">
									<svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 1L11 11L1 21" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
							</div>
						</div>
						<div class="tabs__panels">

							<?php foreach ($terms as $term): ?>	
								<div class="tabs__panel">

									<?php 
									$args = array(
										'post_type' => 'object', 
										'posts_per_page' => -1,
										'tax_query' => array(
											array(
												'taxonomy' => 'object_cat',
												'field'    => 'id',
												'terms'    => $term->term_id,
											)
										),
										'meta_query' => array(
											array(
												'key' => 'is_bestseller',
												'value'    => true,
											)
										),
										'paged' => get_query_var('paged')
									);
									$wp_query = new WP_Query($args);
									if($wp_query->have_posts()): 
										?>

										<div class="slider-container slider-container--hits">
											<div class="tabs__slider-prev slider-btn slider-btn--prev">
												<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M6 1L1 6L6 11" stroke="#FFD575" />
												</svg>
											</div>
											<div class="tabs__slider-next slider-btn slider-btn--next">
												<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M1 1L6 6L1 11" stroke="#FFD575" />
												</svg>
											</div>
											<div class="tabs__slider swiper">
												<div class="swiper-wrapper">

													<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
														<?php get_template_part('parts/content', 'object', ['is_slider' => true, 'is_bestsellers' => true]) ?>
													<?php endwhile; ?>

												</div>
											</div>
										</div>

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
	<?php endif ?>

	<?php endif; ?>
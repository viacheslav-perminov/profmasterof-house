<?php get_header(); ?>

<?php 
$post_id = get_the_ID();
track_post_views($post_id);
$views = get_post_views($post_id);
update_field('popularity', $views);
?>

<section class="house-card">
	<div class="container">
		<div class="house-card__content">
			<div class="house-card__row">

				<?php $images = get_field('gallery');
				if($images): ?>

					<div class="house-card__img">
						<div class="house-card__slider-main swiper">
							<div class="swiper-wrapper">

								<?php foreach($images as $image): ?>

									<a href="<?= wp_get_attachment_url($image['ID']) ?>" class="swiper-slide" data-fancybox="gallery-house-card">
										<?= wp_get_attachment_image($image['ID'], 'full') ?>
										<span>
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path
												d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z"
												stroke="#FFD575" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M18.9992 18.9992L14.6992 14.6992" stroke="#FFD575" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round" />
											</svg>
										</span>
									</a>

								<?php endforeach; ?>

							</div>
						</div>
						<div class="slider-container slider-container--house-card-slider-thumbs">
							<div class="house-card__slider-thumbs swiper">
								<div class="swiper-wrapper">

									<?php foreach($images as $image): ?>
										<div class="slider-thumbs__item swiper-slide">
											<?= wp_get_attachment_image($image['ID'], 'full') ?>
										</div>
									<?php endforeach; ?>
									
								</div>
							</div>
							<div class="house-card__navigation">
								<div class="house-card__slider-prev slider-btn slider-btn--prev">
									<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M6 1L1 6L6 11" stroke="#FFD575" />
									</svg>
								</div>
								<div class="house-card__slider-next slider-btn slider-btn--next">
									<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 1L6 6L1 11" stroke="#FFD575" />
									</svg>
								</div>
							</div>
						</div>
					</div>

				<?php endif; ?>

				<div class="house-card__info">
					<h1><?php the_title() ?></h1>

					<?php if(have_rows('items')): ?>

						<strong>Характеристики дома:</strong>
						<ul class="card-list">

							<?php while(have_rows('items')): the_row() ?>

								<li>
									<p><?php the_sub_field('title') ?></p>
									<span></span>
									<p><?php the_sub_field('text') ?></p>
								</li>

							<?php endwhile ?>

						</ul>

					<?php endif ?>

					<div class="house-card__links">
						<!-- <a href="#popup" class="house-card__btn-popup btn popup-link get_object">Заказать этот проект</a> -->
						<a href="#popup" class="house-card__btn-popup btn popup-link get_object">Узнать цену</a>
						<!--<a href="#description" class="house-card__btn btn btn--transparent">Смотреть комплектацию</a>-->
					</div>
				</div>
			</div>
			
			<!-- this tabs old -->

		</div>
	</div>
</section>

<?php $terms = get_terms([
	'taxonomy' => 'project_cat',
]) ?>

<?php if ($terms): ?>
	<section class="ideal">
		<div class="container">
			<div class="ideal__content">
				<div class="ideal__info">
					<div class="ideal__title title show">
						<h3>Наши работы</h3>
					</div>
				</div>
				<div class="slider-container slider-container--ideal">
					<div class="ideal__slider-prev slider-btn slider-btn--prev">
						<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6 1L1 6L6 11" stroke="#FFD575" />
						</svg>
					</div>
					<div class="ideal__slider-next slider-btn slider-btn--next">
						<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 1L6 6L1 11" stroke="#FFD575" />
						</svg>
					</div>
					<div class="ideal__slider swiper">
						<div class="swiper-wrapper">

							<?php foreach ($terms as $term): ?>
								<?php get_template_part('parts/content', 'project_cat', ['term_id' => $term->term_id]) ?>
							<?php endforeach ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php 
$args = array(
	'post_type' => 'object', 
	'posts_per_page' => -1, 
	'post__not_in' => [get_the_ID()],  
	'paged' => get_query_var('paged')
);
$wp_query = new WP_Query($args);
if($wp_query->have_posts()): 
	?>

	<section class="another">
		<div class="container">
			<div class="another__content">
				<div class="another__title title show">
					<h3>Другие проекты</h3>
				</div>
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
								<?php get_template_part('parts/content', 'object', ['is_slider' => true]) ?>
							<?php endwhile; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php 
endif;
wp_reset_query(); 
?>

<?php get_footer(); ?>
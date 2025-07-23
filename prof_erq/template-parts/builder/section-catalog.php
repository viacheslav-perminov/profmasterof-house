<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$page_id = 48;
	$is_page = is_page($page_id);
	?>

	<?php if ($is_page): ?>

		<section class="catalog">
			<div class="container">
				<form action="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>" method="GET" class="catalog__content" id="filter_objects">
					<div class="catalog__title title title--left show">
						<h3><?= get_the_title($page_id) ?></h3>

						<?php if ($field = get_field('text_2', 'option')): ?>
							<strong><?= $field ?></strong>
						<?php endif ?>

					</div>
					<div class="categories">

						<?php 
						$terms = get_terms( [
							'taxonomy' => 'object_tag',
							'hide_empty' => false,
						] );
						?>

						<?php if ($terms): ?>
							<div class="slider-container slider-container--categories">
								<div class="categories__slider-prev slider-btn slider-btn--prev">
									<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M6 1L1 6L6 11" stroke="#FFD575" />
									</svg>
								</div>
								<div class="categories__slider swiper">
									<div class="swiper-wrapper">

										<?php foreach ($terms as $index => $term): ?>
											<label class="categories__slider-item swiper-slide">
												<input type="checkbox" name="tax_object_tag[]" checked value="<?= $term->term_id ?>">
												<p><?= $term->name ?></p>
											</label>
										<?php endforeach ?>

									</div>
								</div>
								<div class="categories__slider-next slider-btn slider-btn--next">
									<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 1L6 6L1 11" stroke="#FFD575" />
									</svg>
								</div>
							</div>
						<?php endif ?>
						
						<button class="categories__more" type="button">
							<p>Смотреть все</p>
							<span>
								<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 1L6 6L1 11" stroke="#FFD575" stroke-width="2" />
								</svg>
							</span>
						</button>

						<?php $taxonomies = ['object_area' => 'Популярные площади', 'object_feature' => 'Особенности', 'object_type' => 'Вид строения', 'object_size' => 'Популярные габариты',] ?>

						<div class="subcategories">
							<div class="subcategories__items">

								<?php foreach ($taxonomies as $taxonomy => $title): ?>

									<?php 
									$terms = get_terms( [
										'taxonomy' => $taxonomy,
										'hide_empty' => false,
									] );
									?>

									<?php if ($terms): ?>
										<div class="subcategories__item">
											<strong><?= $title ?></strong>
											<div class="subcategories__item-links">

												<?php foreach ($terms as $term): ?>
													<label>
														<input type="checkbox" name="tax_<?= $taxonomy ?>[]" value="<?= $term->term_id ?>">
														<p><?= $term->name ?></p>
													</label>
												<?php endforeach ?>

											</div>
										</div>
									<?php endif ?>
									
								<?php endforeach ?>
								
							</div>
						</div>
					</div>
					<div class="selects-wrapper">
						<div class="selects-wrapper__title">
							<strong>Поиск проектов по характеристикам</strong>
							<strong>Сортировать проекты:</strong>
						</div>
						<div class="selects">
							<!--<div class="select select--price">
								<div class="select__head">
									<input class="select__input" type="radio" value="" name="order">
									<strong class="select__head-field"></strong>
									<span class="select__arrow">
										<svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M5 0V11M5 11L1 7.22857M5 11L9 7.22857" stroke="white" stroke-width="1.5" />
										</svg>
									</span>
								</div>
								<ul class="select__list">
									<li class="placeholder">По цене</li>
									<li data-value="price_asc">По возрастанию</li>
									<li data-value="price_desc">По убыванию</li>
								</ul>
							</div>-->
							<div class="select select--area">
								<div class="select__head">
									<input class="select__input" type="radio" value="" name="order">
									<strong class="select__head-field"></strong>
									<span class="select__arrow">
										<svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M5 0V11M5 11L1 7.22857M5 11L9 7.22857" stroke="white" stroke-width="1.5" />
										</svg>
									</span>
								</div>
								<ul class="select__list">
									<li class="placeholder">По площади</li>
									<li data-value="area_asc">По возрастанию</li>
									<li data-value="area_desc">По убыванию</li>
								</ul>
							</div>
							<div class="select select--popularity">
								<div class="select__head">
									<input class="select__input" type="radio" value="" name="order">
									<strong class="select__head-field"></strong>
									<span class="select__arrow">
										<svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M5 0V11M5 11L1 7.22857M5 11L9 7.22857" stroke="white" stroke-width="1.5" />
										</svg>
									</span>
								</div>
								<ul class="select__list">
									<li class="placeholder">По популярности</li>
									<li data-value="popularity_asc">По возрастанию</li>
									<li data-value="popularity_desc">По убыванию</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="catalog__row">
						<aside class="catalog__filters-wrapper">
							<div class="catalog__filters-title">
								<strong>Воспользуйтесь фильтром</strong>
								<span>
									<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path
										d="M27.5 23.2566C27.5 23.5052 27.4012 23.7437 27.2254 23.9195C27.0496 24.0953 26.8111 24.1941 26.5625 24.1941H20.1875C19.9787 24.9727 19.5189 25.6606 18.8793 26.1513C18.2397 26.642 17.4561 26.9079 16.65 26.9079C15.8439 26.9079 15.0603 26.642 14.4207 26.1513C13.7811 25.6606 13.3213 24.9727 13.1125 24.1941H3.4375C3.18886 24.1941 2.9504 24.0953 2.77459 23.9195C2.59877 23.7437 2.5 23.5052 2.5 23.2566C2.5 23.0079 2.59877 22.7695 2.77459 22.5937C2.9504 22.4179 3.18886 22.3191 3.4375 22.3191H13.1125C13.3213 21.5405 13.7811 20.8525 14.4207 20.3619C15.0603 19.8712 15.8439 19.6053 16.65 19.6053C17.4561 19.6053 18.2397 19.8712 18.8793 20.3619C19.5189 20.8525 19.9787 21.5405 20.1875 22.3191H26.5625C26.8111 22.3191 27.0496 22.4179 27.2254 22.5937C27.4012 22.7695 27.5 23.0079 27.5 23.2566ZM27.5 6.74409C27.5 6.99273 27.4012 7.23119 27.2254 7.407C27.0496 7.58282 26.8111 7.68159 26.5625 7.68159H23.5C23.2912 8.46019 22.8314 9.14814 22.1918 9.6388C21.5522 10.1295 20.7686 10.3954 19.9625 10.3954C19.1564 10.3954 18.3728 10.1295 17.7332 9.6388C17.0936 9.14814 16.6338 8.46019 16.425 7.68159H3.4375C3.31439 7.68159 3.19248 7.65734 3.07873 7.61023C2.96499 7.56311 2.86164 7.49406 2.77459 7.407C2.68753 7.31995 2.61848 7.2166 2.57136 7.10286C2.52425 6.98911 2.5 6.8672 2.5 6.74409C2.5 6.62098 2.52425 6.49907 2.57136 6.38532C2.61848 6.27158 2.68753 6.16823 2.77459 6.08118C2.86164 5.99412 2.96499 5.92507 3.07873 5.87795C3.19248 5.83084 3.31439 5.80659 3.4375 5.80659H16.425C16.6338 5.028 17.0936 4.34004 17.7332 3.84938C18.3728 3.35872 19.1564 3.09277 19.9625 3.09277C20.7686 3.09277 21.5522 3.35872 22.1918 3.84938C22.8314 4.34004 23.2912 5.028 23.5 5.80659H26.5625C26.6861 5.80491 26.8087 5.82801 26.9232 5.87453C27.0377 5.92105 27.1418 5.99004 27.2292 6.07743C27.3166 6.16482 27.3855 6.26884 27.4321 6.38334C27.4786 6.49785 27.5017 6.62051 27.5 6.74409ZM27.5 14.9941C27.5017 15.1177 27.4786 15.2403 27.4321 15.3548C27.3855 15.4693 27.3166 15.5734 27.2292 15.6608C27.1418 15.7481 27.0377 15.8171 26.9232 15.8637C26.8087 15.9102 26.6861 15.9333 26.5625 15.9316H11.9375C11.7287 16.7102 11.2689 17.3981 10.6293 17.8888C9.9897 18.3795 9.20611 18.6454 8.4 18.6454C7.59389 18.6454 6.8103 18.3795 6.17072 17.8888C5.53114 17.3981 5.0713 16.7102 4.8625 15.9316H3.4375C3.18886 15.9316 2.9504 15.8328 2.77459 15.657C2.59877 15.4812 2.5 15.2427 2.5 14.9941C2.5 14.7455 2.59877 14.507 2.77459 14.3312C2.9504 14.1554 3.18886 14.0566 3.4375 14.0566H4.8625C5.0713 13.278 5.53114 12.59 6.17072 12.0994C6.8103 11.6087 7.59389 11.3428 8.4 11.3428C9.20611 11.3428 9.9897 11.6087 10.6293 12.0994C11.2689 12.59 11.7287 13.278 11.9375 14.0566H26.5625C26.8111 14.0566 27.0496 14.1554 27.2254 14.3312C27.4012 14.507 27.5 14.7455 27.5 14.9941Z"
										fill="#323232" />
									</svg>
								</span>
							</div>
							<div class="catalog__filters">
								<div class="catalog__filters-items">
									<button class="catalog__filters-btn btn" type="submit">Применить</button>
									<button class="catalog__filters-btn btn btn--transparent reset_form">Сбросить</button>
									<div class="filter filter--area filter--numbers">
										<strong>Площадь</strong>
										<div class="filter__inputs">
											<div class="input-wrapper">
												<div class="input-wrapper__icon">
													<small>От</small>
												</div>
												<input class="input" type="number" placeholder="104" name="min_area" value="<?= $_GET['min_area'] ?: '' ?>">
											</div>
											<hr>
											<div class="input-wrapper">
												<div class="input-wrapper__icon">
													<small>До</small>
												</div>
												<input class="input" type="number" placeholder="1000" name="max_area" value="<?= $_GET['max_area'] ?: '' ?>">
											</div>
										</div>
									</div>
									<!--<div class="filter filter--price filter--numbers">
										<strong>Цена (руб.)</strong>
										<div class="filter__inputs">
											<div class="input-wrapper">
												<div class="input-wrapper__icon">
													<small>От</small>
												</div>
												<input class="input" type="number" placeholder="10000" name="min_price" value="<?= $_GET['min_price'] ?: '' ?>">
											</div>
											<hr>
											<div class="input-wrapper">
												<div class="input-wrapper__icon">
													<small>До</small>
												</div>
												<input class="input" type="number" placeholder="10000000" name="max_price" value="<?= $_GET['max_price'] ?: '' ?>">
											</div>
										</div>
									</div>-->

									<?php $taxonomies = ['object_floor' => 'Этажность', 'object_detail' => 'Конструктивные детали', 'object_style' => 'Архитектурный стиль', 'object_option' => 'Дополнительные опции', 'object_roof' => 'Форма крыши',] ?>

									<?php foreach ($taxonomies as $taxonomy => $title): ?>

										<?php 
										$terms = get_terms( [
											'taxonomy' => $taxonomy,
											'hide_empty' => false,
										] );
										?>

										<?php if ($terms): ?>
											<div class="filter filter--checkboxes">
												<strong><?= $title ?></strong>
												<ul class="filter__checkboxes">

													<?php foreach ($terms as $term): ?>
														<li>
															<label>
																<input type="checkbox" name="tax_<?= $taxonomy ?>[]" value="<?= $term->term_id ?>"<?php if($_GET['tax_' . $taxonomy] && in_array($term->term_id, $_GET['tax_' . $taxonomy])) echo ' checked' ?>>
																<p class="filter__text"><?= $term->name ?></p>
															</label>
														</li>
													<?php endforeach ?>

												</ul>
											</div>
										<?php endif ?>

									<?php endforeach ?>

									<div class="filter filter--bedrooms filter--checkboxes">
										<strong>Количество спален</strong>
										<ul class="filter__checkboxes">

											<?php for ($i = 1; $i <= 6; $i++) { ?>
												<li>
													<label>
														<input type="radio" name="bedrooms" value="<?= $i ?>"<?php if($_GET['bedrooms'] && $_GET['bedrooms'] == $i) echo ' checked' ?>>
														<p class="filter__text"><?= $i ?><?php if($i == 6) echo '+' ?></p>
													</label>
												</li>
											<?php } ?>

										</ul>
									</div>
									<div class="filter filter--lavatory filter--checkboxes">
										<strong>Количество санузлов</strong>
										<ul class="filter__checkboxes">

											<?php for ($i = 1; $i <= 4; $i++) { ?>
												<li>
													<label>
														<input type="radio" name="bath" value="<?= $i ?>"<?php if($_GET['bath'] && $_GET['bath'] == $i) echo ' checked' ?>>
														<p class="filter__text"><?= $i ?><?php if($i == 4) echo '+' ?></p>
													</label>
												</li>
											<?php } ?>

										</ul>
									</div>
									<input type="hidden" name="sorting" value="">
									<input type="hidden" name="action" value="filter_objects">
								</div>
							</div>
						</aside>

						<?php 
						$args = array(
							'post_type' => 'object',  
							'paged' => get_query_var('paged')
						);
						$wp_query = new WP_Query($args);
						if($wp_query->have_posts()): 
							?>

							<div class="catalog__items-wrapper">
								<div class="catalog__items" id="response_objects">

									<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
										<?php get_template_part('parts/content', 'object') ?>
									<?php endwhile; ?>

								</div>

								<?php kama_pagenavi(null, $wp_query) ?>

							</div>

							<?php 
						endif;
						wp_reset_query(); 
						?>

					</div>
				</form>
			</div>
		</section>

	<?php else: ?>

		<?php
		$featured_posts = get_field('objects_2', 'option');
		if($featured_posts): ?>

					<div style="padding-top:150px" id="mainquiz"><div  data-marquiz-id="66d58867241a3400264e8e5f"></div></div>
<script>(function(t, p) {window.Marquiz ? Marquiz.add([t, p]) : document.addEventListener('marquizLoaded', function() {Marquiz.add([t, p])})})('Inline', {id: '66d58867241a3400264e8e5f', buttonText: '«Старт»', bgColor: '#d34085', textColor: '#ffffff', rounded: true, shadow: 'rgba(211, 64, 133, 0.5)', blicked: true})</script>



			<section class="houses">
				<div class="container">
					<div class="houses__content">

						<?php if ($field = get_field('title_2', 'option')): ?>
							<div class="houses__title title show">
								<h2><?= $field ?></h2>
							</div>
						<?php endif ?>

						<div class="houses__items">

							<?php foreach($featured_posts as $post): 

								global $post;
								setup_postdata($post); ?>
								<?php get_template_part('parts/content', 'object') ?>
							<?php endforeach; ?>

							<?php wp_reset_postdata(); ?>

						</div>

						<?php if ($field = get_field('link_2', 'option')): ?>
							<a href="<?= $field['url'] ?>" class="houses__btn btn"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
						<?php endif ?>

					</div>
				</div>
			</section>

		<?php endif; ?>

	<?php endif ?>

	<?php endif; ?>
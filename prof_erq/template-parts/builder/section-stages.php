<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if(have_rows('items_11', 'option')): ?>

		<section class="stages">
			<img src="<?= get_stylesheet_directory_uri() ?>/img/main-stages-1.png" alt="image">
			<img src="<?= get_stylesheet_directory_uri() ?>/img/main-stages-2.png" alt="image">
			<div class="container">
				<div class="stages__content">
					<div class="stages__title title show">

						<?php if (get_field('title_1_11', 'option') || get_field('title_2_11', 'option')): ?>
						<h3>

							<?php the_field('title_1_11', 'option') ?>

							<span>
								<svg width="50" height="44" viewBox="0 0 50 44" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
									d="M49.9827 21.957C49.9827 23.5039 48.6807 24.7156 47.205 24.7156H44.4272L44.488 38.4828C44.488 38.7148 44.4706 38.9469 44.4446 39.1789V40.5711C44.4446 42.4703 42.8907 44.0086 40.9723 44.0086H39.5834C39.488 44.0086 39.3925 44.0086 39.297 44C39.1755 44.0086 39.0539 44.0086 38.9324 44.0086L36.1112 44H34.0279C32.1095 44 30.5557 42.4617 30.5557 40.5625V33C30.5557 31.4789 29.3143 30.25 27.7779 30.25H22.2223C20.6859 30.25 19.4446 31.4789 19.4446 33V40.5625C19.4446 42.4617 17.8907 44 15.9723 44H11.1199C10.9897 44 10.8595 43.9914 10.7293 43.9828C10.6251 43.9914 10.5209 44 10.4168 44H9.02789C7.10948 44 5.55566 42.4617 5.55566 40.5625V30.9375C5.55566 30.8602 5.55566 30.7742 5.56434 30.6969V24.707H2.78657C1.22407 24.707 0.00878906 23.5039 0.00878906 21.9484C0.00878906 21.175 0.269206 20.4875 0.876845 19.8859L23.1251 0.6875C23.7327 0.0859375 24.4272 0 25.0348 0C25.6425 0 26.3369 0.171875 26.8577 0.601562L49.0279 19.8945C49.7223 20.4961 50.0696 21.1836 49.9827 21.957Z"
									fill="#2B2C33" />
								</svg>
							</span> 
							
							<?php the_field('title_2_11', 'option') ?>

						</h3>
					<?php endif ?>
					
					<?php if ($field = get_field('text_11', 'option')): ?>
						<strong><?= $field ?></strong>
					<?php endif ?>
					
				</div>
				<div class="slider-container slider-container--stages">
					<div class="swiper-pagination swiper-pagination--stages"></div>
					<div class="stages__slider swiper">
						<div class="swiper-wrapper">

							<?php while(have_rows('items_11', 'option')): the_row() ?>

								<div class="stages__slider-item swiper-slide">
									<div class="stages__title-hidden">
										<div class="pagination-image">

											<?php if ($field = get_sub_field('icon_1')): ?>
												<?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
													<img class="img-svg" src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
												<?php else: ?>
													<?= wp_get_attachment_image($field['ID'], 'full') ?>
												<?php endif ?>
											<?php endif ?>

											<?php if ($field = get_sub_field('icon_2')): ?>
												<?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
													<img class="img-svg" src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
												<?php else: ?>
													<?= wp_get_attachment_image($field['ID'], 'full') ?>
												<?php endif ?>
											<?php endif ?>

										</div>

										<?php if ($field = get_sub_field('title_1')): ?>
											<div class="pagination-name"><?= $field ?></div>
										<?php endif ?>

										<?php if ($field = get_sub_field('title_2')): ?>
											<div class="pagination-subname"><?= $field ?></div>
										<?php endif ?>

									</div>
									<div class="stages__row">

										<?php if ($field = get_sub_field('image')): ?>
											<div class="stages__img">
												<?= wp_get_attachment_image($field['ID'], 'full') ?>
											</div>
										<?php endif ?>

										<div class="stages__info">
											<div class="stages__info-label">
												<b><?= get_row_index() ?> этап</b>
												<span>
													<svg width="20" height="21" viewBox="0 0 20 21" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
													d="M20 10.5C20 13.1522 18.9464 15.6957 17.0711 17.5711C15.1957 19.4464 12.6522 20.5 10 20.5C7.34784 20.5 4.8043 19.4464 2.92893 17.5711C1.05357 15.6957 0 13.1522 0 10.5C0 7.84784 1.05357 5.3043 2.92893 3.42893C4.8043 1.55357 7.34784 0.5 10 0.5C12.6522 0.5 15.1957 1.55357 17.0711 3.42893C18.9464 5.3043 20 7.84784 20 10.5ZM10 4.875C10 4.70924 9.93415 4.55027 9.81694 4.43306C9.69973 4.31585 9.54076 4.25 9.375 4.25C9.20924 4.25 9.05027 4.31585 8.93306 4.43306C8.81585 4.55027 8.75 4.70924 8.75 4.875V11.75C8.75004 11.8602 8.77919 11.9684 8.83451 12.0636C8.88982 12.1589 8.96934 12.2379 9.065 12.2925L13.44 14.7925C13.5836 14.8701 13.7518 14.8885 13.9087 14.8437C14.0657 14.7989 14.1988 14.6944 14.2798 14.5527C14.3608 14.4111 14.3831 14.2433 14.342 14.0854C14.301 13.9274 14.1997 13.7918 14.06 13.7075L10 11.3875V4.875Z"
													fill="#949498" />
												</svg>
											</span>

											<?php if ($field = get_sub_field('period')): ?>
												<p><strong>Срок:</strong> <?= $field ?></p>
											<?php endif ?>

										</div>
										
										<?php the_sub_field('text') ?>

									</div>
								</div>
							</div>

						<?php endwhile ?>

					</div>
				</div>
				<div class="stages__slider-navigation">
					<div class="stages__slider-prev btn">
						<span>
							<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M16 5H0.999999M0.999999 5L5.23913 1M0.999999 5L5.23913 9" stroke="#654F1A" />
							</svg>
						</span>
						Назад
					</div>
					<div class="stages__slider-next btn">
						Далее
						<span>
							<svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 4.5H15M15 4.5L10.7609 0.5M15 4.5L10.7609 8.5" stroke="#654F1A" />
							</svg>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php endif ?>

<?php endif; ?>
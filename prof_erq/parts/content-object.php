<div class="house<?php if(isset($args['is_slider']) && $args['is_slider']) echo ' swiper-slide' ?>">
	<div class="house__img">

		<?php if (isset($args['is_bestsellers']) && $args['is_bestsellers']): ?>
			<span>Хит продаж</span>
		<?php endif ?>
		
		<?php the_post_thumbnail('full') ?>
	</div>
	<div class="house__info">

		<?php $terms = wp_get_object_terms(get_the_ID(), 'object_cat') ?>

		<?php if ($terms): ?>
			<?php foreach ($terms as $term): ?>
				<?php if ($field = get_field('label', 'term_' . $term->term_id)): ?>
					<small><?= $field ?></small>
				<?php endif ?>
			<?php endforeach ?>
		<?php endif ?>
		
		<strong><?php the_title() ?></strong>
		<ul>

			<?php if ($field = get_field('area')): ?>
				<li>
					<span>
						<img src="<?= get_stylesheet_directory_uri() ?>/img/main-houses-icon-1.png" alt="image">
					</span>
					<small><?= get_field_object('area')['label'] ?>:</small>
					<strong><?= $field ?>м2</strong>
				</li>
			<?php endif ?>
			
			<?php if ($field = get_field('size')): ?>
				<li>
					<span>
						<img src="<?= get_stylesheet_directory_uri() ?>/img/main-houses-icon-2.png" alt="image">
					</span>
					<small><?= get_field_object('size')['label'] ?>:</small>
					<strong><?= $field ?></strong>
				</li>
			<?php endif ?>

			<?php if ($field = get_field('rooms')): ?>
				<li>
					<span>
						<img src="<?= get_stylesheet_directory_uri() ?>/img/main-houses-icon-3.png" alt="image">
					</span>
					<small><?= get_field_object('rooms')['label'] ?>:</small>
					<strong><?= $field ?></strong>
				</li>
			<?php endif ?>

			<?php if ($field = get_field('bedrooms')): ?>
				<li>
					<span>
						<img src="<?= get_stylesheet_directory_uri() ?>/img/main-houses-icon-4.png" alt="image">
					</span>
					<small><?= get_field_object('bedrooms')['label'] ?>:</small>
					<strong><?= $field ?></strong>
				</li>
			<?php endif ?>

			<?php if ($field = get_field('bath')): ?>
				<li>
					<span>
						<img src="<?= get_stylesheet_directory_uri() ?>/img/main-houses-icon-5.png" alt="image">
					</span>
					<small><?= get_field_object('bath')['label'] ?>:</small>
					<strong><?= $field ?></strong>
				</li>
			<?php endif ?>

		</ul>
		<!--<ol>
			<li>

				<?php if ($field = get_field('price')): ?>
					<small><?= get_field_object('price')['label'] ?>: </small>
					<strong><?= number_format($field, 0, ',', ' ') ?> ₽</strong>
				</li>
			<?php endif ?>

			<?php if ($field = get_field('period')): ?>
				<li>
					<small><?= get_field_object('period')['label'] ?>:</small>
					<strong><?= $field ?></strong>
				</li>
			<?php endif ?>

		</ol>-->
		<a href="<?php the_permalink() ?>" class="house__btn btn btn--transparent">Подробнее о проекте</a>
	</div>
</div>
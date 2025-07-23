<?php if (isset($args['is_whole_card_link']) && $args['is_whole_card_link']): ?>
	<a href="<?php the_permalink() ?>" class="ideal__house<?php if(isset($args['is_slider']) && $args['is_slider']) echo ' swiper-slide' ?>">
	<?php else: ?>
		<div class="ideal__house<?php if(isset($args['is_slider']) && $args['is_slider']) echo ' swiper-slide' ?>">
		<?php endif ?>

		<div class="ideal__house-img">
			<?php the_post_thumbnail('full') ?>
		</div>
		<div class="ideal__house-info">

			<?php $terms = wp_get_object_terms(get_the_ID(), 'project_cat') ?>

			<?php if ($terms): ?>
				<?php foreach ($terms as $term): ?>
					<?php if ($field = get_field('label', 'term_' . $term->term_id)): ?>
						<small><?= $field ?></small>
					<?php endif ?>
				<?php endforeach ?>
			<?php endif ?>

			<strong><?php the_title() ?></strong>
			<ol>
				<li>

					<?php if ($field = get_field('price')): ?>
						<small><?= get_field_object('price')['label'] ?>: </small>
						<strong><?= $field ?> руб/м<sup>2</sup></strong>
					</li>
				<?php endif ?>

				<?php if ($field = get_field('period')): ?>
					<li>
						<small><?= get_field_object('period')['label'] ?>:</small>
						<strong><?= $field ?></strong>
					</li>
				<?php endif ?>
				<?php if ($field = get_field('srok_sdachi')): ?>
					<li>
						<small><?= get_field_object('srok_sdachi')['label'] ?>:</small>
						<strong><?= $field ?></strong>
					</li>
				<?php endif ?>

			</ol>

			<?php if (!isset($args['is_whole_card_link']) || !$args['is_whole_card_link']): ?>
				<a href="<?php the_permalink() ?>" class="ideal__house-btn btn btn--transparent">Смотреть проект</a>
			<?php endif ?>

		</div>

		<?php if (isset($args['is_whole_card_link']) && $args['is_whole_card_link']): ?>
		</a>
	<?php else: ?>
	</div>
	<?php endif ?>
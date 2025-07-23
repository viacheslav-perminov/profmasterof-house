<div class="ideal__house swiper-slide">
	<div class="ideal__house-img">

		<?php if ($field = get_field('objects_count', 'term_' . $args['term_id'])): ?>
			<span><?= $field ?></span>
		<?php endif ?>

		<?php if ($field = get_field('image', 'term_' . $args['term_id'])): ?>
			<?= wp_get_attachment_image($field['ID'], 'full') ?>
		<?php endif ?>

	</div>
	<div class="ideal__house-info">
		<strong><?= get_term($args['term_id'])->name ?></strong>
		<ol>

			<?php if ($field = get_field('price', 'term_' . $args['term_id'])): ?>
				<li>
					<small><?= get_field_object('field_66c4c51b12320')['label'] ?>:</small>
					<strong><?= $field ?> руб/м<sup>2</sup></strong>
				</li>
			<?php endif ?>

			<?php if ($field = get_field('period', 'term_' . $args['term_id'])): ?>
				<li>
					<small><?= get_field_object('field_66c4c52b12321')['label'] ?>:</small>
					<strong><?= $field ?></strong>
				</li>
			<?php endif ?>

		</ol>
		<a href="<?= get_term_link($args['term_id']) ?>" class="ideal__house-btn btn btn--transparent">Посмотреть проекты</a>
	</div>
</div>
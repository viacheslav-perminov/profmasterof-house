<?php get_header(); ?>

<section class="error-page">
	<div class="container">
		<div class="error-page__content">

			<?php if ($field = get_field('title_404', 'option')): ?>
				<strong><?= $field ?></strong>
			<?php endif ?>
			
			<?php if ($field = get_field('text_404', 'option')): ?>
				<small><?= $field ?></small>
			<?php endif ?>

			<?php if ($field = get_field('link_404', 'option')): ?>
				<a href="<?= get_home_url() ?>" class="error-page__btn btn"><?= $field ?></a>
			<?php endif ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>
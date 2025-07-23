<?php get_header(); ?>

<?php $term_id = get_queried_object_id() ?>

<?php if (($field = get_field('banner', 'term_' . $term_id)) && is_array($field) && checkArrayForValues($field)): ?>
<section class="label label--houses"<?php if($image = get_field('image', 'term_' . $term_id)) echo ' style="background-image: url(' . $image['url'] . ');"' ?>>
	<div class="label__img">
		<div class="container">
			<div class="label__img-content">

				<?php if ($field['title']): ?>
					<div class="label__title title title--left show">
						<h1><?= $field['title'] ?></h1>
					</div>
				<?php endif ?>

				<?php if (is_array($field['items']) && checkArrayForValues($field['items'])): ?>
				<ul>

					<?php foreach ($field['items'] as $item): ?>
						<?php if ($item['text']): ?>
							<li>
								<span>
									<svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 4L4.33333 7L11 1" stroke="#654F1A" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" />
									</svg>
								</span>
								<p><?= $item['text'] ?></p>
							</li>
						<?php endif ?>
					<?php endforeach ?>

				</ul>
			<?php endif ?>

		</div>
	</div>
</div>
</section>
<?php endif ?>

<?php if (have_posts()) : ?>
	<section class="completed">
		<div class="container">
			<div class="completed__content">
				<div class="completed__items">

					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part('parts/content', 'project') ?>
					<?php endwhile; ?>

				</div>
				<?php kama_pagenavi() ?>

			</div>
		</div>
	</section>
<?php endif ?>

<?php get_footer(); ?>
<?php get_header(); ?>

<section class="label label--articles-card"<?php if(has_post_thumbnail()) echo ' style="background-image: url(' . get_the_post_thumbnail_url(null, 'full') . ');"' ?>>
	<div class="label__img">
		<div class="container">
			<div class="label__img-content">
				<div class="label__title title title--left show">
					<h1><?php the_title() ?></h1>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="label-info">
	<div class="container">
		<div class="label-info__content info">
			<?php the_content() ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
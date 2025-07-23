<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="welcome"<?php if($field = get_field('image_1', 'option')) echo ' style="background-image: url(' . $field['url'] . ');"' ?>>
		<div class="container">
			<div class="welcome__content show">
				<div class="welcome__info up">

					<?php if ($field = get_field('title_1', 'option')): ?>
						<h1><?= $field ?></h1>
					<?php endif ?>

					<?php if ($field = get_field('text_1', 'option')): ?>
						<p><?= $field ?></p>
					<?php endif ?>

					<?php if ($field = get_field('link_1', 'option')): ?>
						<a href="<?= $field['url'] ?>" class="welcome__btn btn"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
					<?php endif ?>

				</div>

				<?php if (($field = get_field('items_1', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
				<ul class="welcome__items">

					<?php foreach ($field as $item): ?>
						<?php if ($item['text']): ?>
							<li><?= $item['text'] ?></li>
						<?php endif ?>
					<?php endforeach ?>

				</ul>
			<?php endif ?>

		</div>
	</div>
</section>

<?php endif; ?>
<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if(have_rows('items_12', 'option')): ?>

		<section class="reasons">
			<div class="container">

				<?php if ($field = get_field('title_12', 'option')): ?>
					<div class="reasons__content">
						<div class="reasons__title title show">
							<h2><?= $field ?></h2>
						</div>
					</div>
				<?php endif ?>
				
				<div class="reasons__items">

					<?php while(have_rows('items_12', 'option')): the_row() ?>

						<div class="reasons__item">
							<span><?= get_row_index() ?></span>

							<?php if ($field = get_sub_field('title')): ?>
								<strong><?= $field ?></strong>
							<?php endif ?>
							
							<?php if ($field = get_sub_field('text')): ?>
								<p><?= $field ?></p>
							<?php endif ?>
							
						</div>

					<?php endwhile ?>

				</div>
			</div>
		</section>

	<?php endif ?>

	<?php endif; ?>
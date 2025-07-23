<?php if(have_rows('items')): ?>

	<ul>

		<?php while(have_rows('items')): the_row() ?>

			<?php if ($field = get_sub_field('text')): ?>
				<li>
					<span>
						<svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 4L4.33333 7L11 1" stroke="#654F1A" stroke-width="2" stroke-linecap="round"
							stroke-linejoin="round" />
						</svg>
					</span>
					<p><?= $field ?></p>
				</li>
			<?php endif ?>

		<?php endwhile ?>

	</ul>

	<?php endif ?>			
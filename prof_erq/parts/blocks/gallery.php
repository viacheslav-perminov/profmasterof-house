<?php $images = get_field('gallery');
if($images): ?>

	<div class="info__images">

		<?php foreach($images as $image): ?>

			<a href="<?= $image['url'] ?>" data-fancybox="gallary-articles-card">
				<?= wp_get_attachment_image($image['ID'], 'full') ?>
				<span>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z"
						stroke="#FFD575" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M18.9992 18.9992L14.6992 14.6992" stroke="#FFD575" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round" />
					</svg>
				</span>
			</a>

		<?php endforeach; ?>

	</div>

	<?php endif; ?>
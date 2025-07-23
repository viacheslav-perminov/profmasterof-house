<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="label label--catalog"<?php if($image) echo ' style="background-image: url(' . $image['url'] . ');"' ?>>
		<div class="label__img">
			<div class="container">
				<div class="label__img-content">

					<?php if ($subtitle): ?>
						<strong><?= $subtitle ?></strong>
					<?php endif ?>

					<?php if ($title): ?>
						<div class="label__title title title--left show">
							<h1><?= $title ?></h1>
						</div>
					<?php endif ?>

					<?php if (is_array($items) && checkArrayForValues($items)): ?>
					<ul>

						<?php foreach ($items as $item): ?>
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

				<?php if ($link): ?>
					<a href="<?= $link['url'] ?>" class="label__btn btn"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?></a>
				<?php endif ?>

			</div>
		</div>
	</div>
</section>

<?php endif; ?>
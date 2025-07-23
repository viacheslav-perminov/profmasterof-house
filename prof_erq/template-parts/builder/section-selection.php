<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="compilation">
		<div class="container">
			<form class="compilation__content" id="link_to_catalog">

				<?php if (($field = get_field('left_5', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
				<div class="compilation__info">
					<div class="compilation__info-text">

						<?php if ($field['text_1']): ?>
							<strong><?= $field['text_1'] ?></strong>
						<?php endif ?>

						<?php if ($field['text_2']): ?>
							<p><?= $field['text_2'] ?></p>
						<?php endif ?>

						<?php if ($field['button']): ?>
							<a href="#popup" class="compilation__info-btn btn btn--transparent popup-link"><?= $field['button'] ?></a>
						<?php endif ?>

					</div>

					<?php if (is_array($field['boss']) && checkArrayForValues($field['boss'])): ?>
					<figure class="compilation__info-img">

						<?php if ($field['boss']['photo']): ?>
							<?= wp_get_attachment_image($field['boss']['photo']['ID'], 'full') ?>
						<?php endif ?>

						<figcaption>

							<?php if ($field['boss']['position']): ?>
								<small><?= $field['boss']['position'] ?></small>
							<?php endif ?>

							<?php if ($field['boss']['name']): ?>
								<strong><?= $field['boss']['name'] ?></strong>
							<?php endif ?>

						</figcaption>
					</figure>
				<?php endif ?>

			</div>
		<?php endif ?>

		<div class="compilation__filter">

			<?php if ($field = get_field('right_5', 'option')['title']): ?>
				<strong><?= $field ?></strong>
			<?php endif ?>
			
			<div class="compilation__filter-items">
				<div class="filter filter--area filter--numbers">
					<strong>Площадь</strong>
					<div class="filter__inputs">
						<div class="input-wrapper">
							<div class="input-wrapper__icon">
								<small>От</small>
							</div>
							<input class="input" type="number" placeholder="104" name="min_area">
						</div>
						<hr>
						<div class="input-wrapper">
							<div class="input-wrapper__icon">
								<small>До</small>
							</div>
							<input class="input" type="number" placeholder="1000" name="max_area">
						</div>
					</div>
				</div>

				<?php $taxonomies = ['object_floor' => 'Этажность', 'object_detail' => 'Конструктивные детали', 'object_style' => 'Архитектурный стиль', 'object_option' => 'Дополнительные опции', 'object_roof' => 'Форма крыши',] ?>

				<?php foreach ($taxonomies as $taxonomy => $title): ?>

					<?php 
					$terms = get_terms( [
						'taxonomy' => $taxonomy,
						'hide_empty' => false,
					] );
					?>

					<?php if ($terms): ?>
						<div class="filter filter--checkboxes">
							<strong><?= $title ?></strong>
							<ul class="filter__checkboxes">

								<?php foreach ($terms as $term): ?>
									<li>
										<label>
											<input type="checkbox" name="tax_<?= $taxonomy ?>[]" value="<?= $term->term_id ?>">
											<p class="filter__text"><?= $term->name ?></p>
										</label>
									</li>
								<?php endforeach ?>

							</ul>
						</div>
					<?php endif ?>

				<?php endforeach ?>

				<div class="filter filter--bedrooms filter--checkboxes">
					<strong>Количество спален</strong>
					<ul class="filter__checkboxes">
						
						<?php for ($i = 2; $i <= 6; $i++) { ?>
							<li>
								<label>
									<input type="radio" name="bedrooms" value="<?= $i ?>">
									<p class="filter__text"><?= $i ?><?php if($i == 6) echo '+' ?></p>
								</label>
							</li>
						<?php } ?>

					</ul>
				</div>
				<div class="filter filter--lavatory filter--checkboxes">
					<strong>Количество санузлов</strong>
					<ul class="filter__checkboxes">
						
						<?php for ($i = 2; $i <= 4; $i++) { ?>
							<li>
								<label>
									<input type="radio" name="bath" value="<?= $i ?>">
									<p class="filter__text"><?= $i ?><?php if($i == 4) echo '+' ?></p>
								</label>
							</li>
						<?php } ?>

					</ul>
				</div>
				<div class="filter filter--price filter--numbers">
					<strong>Цена (руб.)</strong>
					<div class="filter__inputs">
						<div class="input-wrapper">
							<div class="input-wrapper__icon">
								<small>От</small>
							</div>
							<input class="input" type="number" placeholder="10000" name="min_price">
						</div>
						<hr>
						<div class="input-wrapper">
							<div class="input-wrapper__icon">
								<small>До</small>
							</div>
							<input class="input" type="number" placeholder="10000000" name="max_price">
						</div>
					</div>
				</div>
			</div>

			<?php if ($field = get_field('right_5', 'option')['button']): ?>
				<button data-href="<?= $field['url'] ?>" class="compilation__filter-btn btn" type="submit"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></button>
			<?php endif ?>

		</div>
	</form>
</div>
</section>

<?php endif; ?>
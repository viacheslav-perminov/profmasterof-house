<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="connection">
		<div class="container">
			<div class="connection__content">
				<div class="connection__info show">

					<?php if ($field = get_field('title_22', 'option')): ?>
						<?php if (is_front_page()): ?>
							<h4><?= $field ?></h4>
						<?php else: ?>
							<h1><?= $field ?></h1>
						<?php endif; ?>
					<?php endif ?>
					
					<?php if (($field = get_field('phone_hm', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
					<div class="connection__item connection__item--phone">
						<span>
							<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
								d="M12.0006 12.6604L13.2923 11.3682C13.4663 11.1964 13.6864 11.0787 13.9259 11.0295C14.1654 10.9804 14.414 11.0019 14.6416 11.0913L16.2158 11.7201C16.4457 11.8135 16.6429 11.9729 16.7825 12.1782C16.922 12.3835 16.9977 12.6256 17 12.8738V15.7581C16.9987 15.927 16.9632 16.0939 16.8957 16.2487C16.8282 16.4035 16.73 16.5431 16.6072 16.6589C16.4844 16.7748 16.3394 16.8646 16.1809 16.923C16.0225 16.9813 15.8539 17.007 15.6853 16.9984C4.6544 16.3119 2.42862 6.96679 2.00768 3.39026C1.98814 3.21462 2.00599 3.03684 2.06006 2.86861C2.11414 2.70037 2.2032 2.5455 2.3214 2.41417C2.4396 2.28285 2.58426 2.17805 2.74585 2.10666C2.90745 2.03528 3.08232 1.99894 3.25896 2.00002H6.04407C6.29261 2.00076 6.53523 2.07586 6.74075 2.21567C6.94627 2.35548 7.10528 2.5536 7.19733 2.78455L7.82585 4.35938C7.91826 4.58613 7.94183 4.83509 7.89363 5.07516C7.84543 5.31523 7.7276 5.53577 7.55484 5.70923L6.26319 7.0014C6.26319 7.0014 7.00704 12.0374 12.0006 12.6604Z"
								fill="#654F1A" />
							</svg>
						</span>
						
						<?php if ($field['title']): ?>
							<small><?= $field['title'] ?></small>
						<?php endif ?>

						<?php if ($field['text']): ?>
							<a href="tel:+<?= preg_replace('/[^0-9]/', '', $field['text']) ?>"><?= $field['text'] ?></a>
						<?php endif ?>

					</div>
				<?php endif ?>

				<?php if (($field = get_field('address_hm', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
				<div class="connection__item connection__item--address">
					<span>
						<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
							d="M9 1C5.68286 1 3 3.6605 3 6.95C3 11.4125 9 18 9 18C9 18 15 11.4125 15 6.95C15 3.6605 12.3171 1 9 1ZM9 9.075C8.43168 9.075 7.88663 8.85112 7.48477 8.4526C7.08291 8.05409 6.85714 7.51359 6.85714 6.95C6.85714 6.38642 7.08291 5.84591 7.48477 5.4474C7.88663 5.04888 8.43168 4.825 9 4.825C9.56832 4.825 10.1134 5.04888 10.5152 5.4474C10.9171 5.84591 11.1429 6.38642 11.1429 6.95C11.1429 7.51359 10.9171 8.05409 10.5152 8.4526C10.1134 8.85112 9.56832 9.075 9 9.075Z"
							fill="#654F1A" />
						</svg>
					</span>
					
					<?php if ($field['title']): ?>
						<small><?= $field['title'] ?></small>
					<?php endif ?>

					<?php if ($field['text']): ?>
						<strong><?= $field['text'] ?></strong>
					<?php endif ?>

				</div>
			<?php endif ?>

			<?php if (($field = get_field('email_hm', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
			<div class="connection__item connection__item--mail">
				<span>
					<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M17 6.456V12.5625C17 13.1851 16.7618 13.7841 16.3342 14.2367C15.9067 14.6892 15.3221 14.961 14.7005 14.9963L14.5625 15H4.4375C3.8149 15 3.21588 14.7618 2.76333 14.3342C2.31078 13.9067 2.039 13.3221 2.00375 12.7005L2 12.5625V6.456L9.239 10.248C9.31953 10.2902 9.40909 10.3122 9.5 10.3122C9.59091 10.3122 9.68047 10.2902 9.761 10.248L17 6.456ZM4.4375 3H14.5625C15.1667 2.99993 15.7494 3.22425 16.1975 3.62945C16.6457 4.03465 16.9274 4.59186 16.988 5.193L9.5 9.1155L2.012 5.193C2.07014 4.61573 2.33229 4.07814 2.75131 3.67685C3.17034 3.27556 3.71876 3.03689 4.298 3.00375L4.4375 3Z"
						fill="#654F1A" />
					</svg>
				</span>
				
				<?php if ($field['title']): ?>
					<small><?= $field['title'] ?></small>
				<?php endif ?>

				<?php if ($field['text']): ?>
					<a href="mailto:<?= $field['text'] ?>"><?= $field['text'] ?></a>
				<?php endif ?>

			</div>
		<?php endif ?>

		<?php if (($field = get_field('schedule_hm', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
		<div class="connection__item connection__item--time">
			<span>
				<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
					d="M9 1C7.94943 1 6.90914 1.20693 5.93853 1.60896C4.96793 2.011 4.08601 2.60028 3.34315 3.34315C1.84285 4.84344 1 6.87827 1 9C1 11.1217 1.84285 13.1566 3.34315 14.6569C4.08601 15.3997 4.96793 15.989 5.93853 16.391C6.90914 16.7931 7.94943 17 9 17C11.1217 17 13.1566 16.1571 14.6569 14.6569C16.1571 13.1566 17 11.1217 17 9C17 7.94943 16.7931 6.90914 16.391 5.93853C15.989 4.96793 15.3997 4.08601 14.6569 3.34315C13.914 2.60028 13.0321 2.011 12.0615 1.60896C11.0909 1.20693 10.0506 1 9 1ZM12.36 12.36L8.2 9.8V5H9.4V9.16L13 11.32L12.36 12.36Z"
					fill="#654F1A" />
				</svg>
			</span>
			
			<?php if ($field['title']): ?>
				<small><?= $field['title'] ?></small>
			<?php endif ?>
			
			<?php if ($field['text']): ?>
				<strong><?= $field['text'] ?></strong>
			<?php endif ?>
			
		</div>
	<?php endif ?>

	<?php if (($field = get_field('socials_hm', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
	<div class="connection__item connection__item--socials">

		<?php if ($field['title']): ?>
			<small><?= $field['title'] ?></small>
		<?php endif ?>

		<?php if (is_array($field['items']) && checkArrayForValues($field['items'])): ?>
		<div class="socials">

			<?php foreach ($field['items'] as $item): ?>
				<?php if ($item['link'] && $item['icon']): ?>
					<a href="<?= $item['link']['url'] ?>" class="social social--<?= basename($item['icon']['url'], '.svg') ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
						<?php if (pathinfo($item['icon']['url'])['extension'] == 'svg'): ?>
							<img class="img-svg" src="<?= $item['icon']['url'] ?>" alt="<?= $item['icon']['alt'] ?>">
						<?php else: ?>
							<?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
						<?php endif ?>
					</a>
				<?php endif ?>
			<?php endforeach ?>

		</div>
	<?php endif ?>

</div>
<?php endif ?>

</div>
<div class="connection__map map-container">
	<div class="map" id="map"></div>
</div>
</div>
</div>
</section>

<?php endif; ?>
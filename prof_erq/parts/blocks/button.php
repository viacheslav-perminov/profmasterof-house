<?php if ($field = get_field('link')): ?>

	<?php 
	$is_popup = get_field('is_popup'); 
	$post_type = get_post_type();
	?>
	
	<a href="<?= $is_popup ? '#popup' : $field['url'] ?>" class="participation__btn btn<?php if($is_popup) echo ' popup-link'; if($post_type == 'service' || $post_type == 'sale') echo ' get_' . $post_type ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
	<?php endif ?>
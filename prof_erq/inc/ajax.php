<?php

$actions = [
	'filter_objects',

];
foreach ($actions as $action) {
	add_action("wp_ajax_{$action}", $action);
	add_action("wp_ajax_nopriv_{$action}", $action);
}

function filter_objects(){

	$args = array(
		'post_type' => 'object',
		'posts_per_page' => -1,
		'post_status' => 'publish',
	);

	if($_GET){
		foreach ($_GET as $key => $value) {
			if (str_contains($key, 'tax_')) {
				$$key = $value ?
				array(
					'taxonomy' => substr($key, 4),
					'field'    => 'id',
					'terms'    => $value
				) :
				'';
			}
		}
	}

	$args['tax_query'] = array(
		'relation' => 'AND',
		$tax_object_tag,
		$tax_object_area,
		$tax_object_feature,
		$tax_object_type,
		$tax_object_size,
		$tax_object_floor,
		$tax_object_detail,
		$tax_object_style,
		$tax_object_option,
		$tax_object_roof,
	);

	$fields = ['area', 'price'];

	foreach ($fields as $field) {
		$$field = ($_GET['min_' . $field] || $_GET['max_' . $field]) ? array(
			'key' => $field,
			'value' => array($_GET['min_' . $field], $_GET['max_' . $field] > 0 ? ($_GET['max_' . $field] > $_GET['min_' . $field] ? $_GET['max_' . $field] : $_GET['min_' . $field]) : 1000000000000),
			'type'    => 'numeric',
			'compare' => 'BETWEEN'
		) : '';
	}

	$fields = ['bedrooms' => 6, 'bath' => 4];

	foreach ($fields as $key => $value) {
		$$key = isset($_GET[$key]) ?
		array(
			'key' => $key,
			'value' => $_GET[$key],
			'type'    => 'numeric',
		) :
		'';
		if(isset($_GET[$key]) && (int)$_GET[$key] == $value){
			$$key['value'] = $value;
			$$key['meta_compare'] = '>=';
		}
	}

	$args['meta_query'] = array(
		'relation' => 'AND',
		$area,
		$price,
		$bedrooms,
		$bath,
	);

	if (isset($_GET['sorting'])) {
		switch ($_GET['sorting']) {
			case 'price_asc':
			$args['meta_key'] = 'price';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'ASC';
			break;
			case 'price_desc':
			$args['meta_key'] = 'price';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			break;
			case 'area_asc':
			$args['meta_key'] = 'area';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'ASC';
			break;
			case 'area_desc':
			$args['meta_key'] = 'area';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			break;
			case 'popularity_asc':
			$args['meta_key'] = 'popularity';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'ASC';
			break;
			case 'popularity_desc':
			$args['meta_key'] = 'popularity';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			break;

			default:
			break;
		}
	}

	$query = new WP_Query($args);

	if( $query->have_posts() ) :
		while($query->have_posts() ): $query->the_post() ?>

			<?php get_template_part('parts/content', 'object') ?>

		<?php endwhile;
		wp_reset_postdata();
	else :
		echo 'Объекты не найдены';
	endif;

	die();
}
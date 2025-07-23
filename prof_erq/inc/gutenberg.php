<?php 
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {

        $post_types = ['post', 'service', 'sale', 'object'];
        $names = ['list' => 'Список', 'gallery' => 'Галерея', 'button' => 'Кнопка'];

        foreach ($names as $key => $value) {
            acf_register_block_type(array(
                'name'              => 'my_' . $key,
                'title'             => __($value . ' (Profmasterof)'),
                'render_template'   => 'parts/blocks/' . $key . '.php',
                'category'          => 'common',
                'post_types'        => $post_types,
            ));
        }
        
    }
}
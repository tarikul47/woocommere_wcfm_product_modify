<?php

/**
 * Product type add on Shop page after product title 
 */
function change_product_titles($title, $id = null)
{
    $prod = get_post($id);

    if (!empty($prod->ID) and $prod->post_type == 'product') {
        return $title . ' </br> Extra content';
    }
    return $title;
}
add_filter('the_title', 'change_product_titles', 10, 2);



// shop page 

function aq_display_brand_before_title()
{
    global $product;
    $product_id = $product->get_id();
    $product_type = $product->get_type();
    echo 'Product type: ' . $product_type . "</br>";
}
//add_action('woocommerce_before_shop_loop_item_title', 'aq_display_brand_before_title');
add_action('woocommerce_shop_loop_item_title', 'aq_display_brand_before_title');


// single product 
function single_product_display_brand_before_title()
{
    global $product;
    $product_id = $product->get_id();
    $product_type = $product->get_type();
    echo 'Product type: ' . $product_type . "</br>";
}
add_action('woocommerce_single_product_summary', 'single_product_display_brand_before_title');


/**
 * Simple product chnage course product 
 */

function simple_rename_course_type($product_types){
    $product_types['simple'] = 'Course (€ per project)';
    return $product_types;
}
add_filter( 'product_type_selector', 'simple_rename_course_type' );























/**
 * Product type check box add and save 
 */

// add_filter('product_type_options', 'add_e_visa_product_option');
// function add_e_visa_product_option($product_type_options)
// {
//     $product_type_options['evisa'] = array(
//         'id'            => '_evisa',
//         'wrapper_class' => 'show_if_simple show_if_variable',
//         'label'         => __('eVisa', 'woocommerce'),
//         'description'   => __('', 'woocommerce'),
//         'default'       => 'no'
//     );

//     return $product_type_options;
// }

// add_action('woocommerce_process_product_meta_simple', 'save_evisa_option_fields');
// add_action('woocommerce_process_product_meta_variable', 'save_evisa_option_fields');
// function save_evisa_option_fields($post_id)
// {
//     $is_e_visa = isset($_POST['_evisa']) ? 'yes' : 'no';
//     update_post_meta($post_id, '_evisa', $is_e_visa);
// }

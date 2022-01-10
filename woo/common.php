<?php

/**
 * Product title with type show
 */
function action_manage_product_posts_custom_column($column, $postid)
{
    if ($column == 'name') {
        // Get product
        $product = wc_get_product($postid);
        // Get type
        $product_type = $product->get_type();
        $text = '';
        if ('consulting' == $product_type) {
            $text = 'Consulting (€ per project)';
        } else if ('mentoring' == $product_type) {
            $text = 'Mentoring (€ per hour)';
        } else if ('downloadable' == $product_type) {
            $text = 'Downloadable (€ per deliverable)';
        } else {
            $text = 'Course (€ per participent)';
        }

        // Output
        //echo '&nbsp;<span>&ndash; ' .  ucfirst($product_type) . '</span>';
        echo '&nbsp;<span>&ndash; <span class="product_type">' . $text . '</span></span></span>';
    }
}
add_action('manage_product_posts_custom_column', 'action_manage_product_posts_custom_column', 20, 2);

/**
 * product type name change
 */
function misha_rename_variable_type($product_types)
{

    $product_types['simple'] = 'Course (€ per participent)';
    return $product_types;
}
add_filter('product_type_selector', 'misha_rename_variable_type');


/**
 * Default Product type remove 
 */
function remove_product_types($types)
{
    unset($types['grouped']);
    unset($types['external']);
    unset($types['variable']);
    //unset($types['simple']);
    return $types;
}
add_filter('product_type_selector', 'remove_product_types');

/**
 * shop page product type add 
 * Single product show product type 
 */
function welearnt_product_type_display()
{
    global $product;
    $pType = $product->get_type();
    if ('consulting' == $pType) {
        printf("<span class='product_type'>Product type: %s</spanm><br>", 'Consulting (€ per project)');
    } else if ('mentoring' == $pType) {
        printf("<span class='product_type'>Product type: %s</spanm><br>", 'Mentoring (€ per hour)');
    } else if ('downloadable' == $pType) {
        printf("<span class='product_type'>Product type: %s</spanm><br>", 'Downloadable (€ per deliverable)');
    } else {
        printf("<span class='product_type'>Product type: %s</spanm><br>", 'Course (€ per participent)');
    }
}
add_action('woocommerce_single_product_summary', 'welearnt_product_type_display');
add_action('woocommerce_shop_loop_item_title', 'welearnt_product_type_display');

/**
 * Custom product type add to cart buton enable 
 */
add_action("woocommerce_consulting_add_to_cart", function () {
    do_action('woocommerce_simple_add_to_cart');
});
add_action("woocommerce_mentoring_add_to_cart", function () {
    do_action('woocommerce_simple_add_to_cart');
});
add_action("woocommerce_course_add_to_cart", function () {
    do_action('woocommerce_simple_add_to_cart');
});
add_action("woocommerce_downloadable_add_to_cart", function () {
    do_action('woocommerce_simple_add_to_cart');
});

/*
 * Apply same settings as virtual / downloadable files
*/
function wc_custom_product_type_options($options)
{
    $options['downloadable']['wrapper_class'] = 'show_if_simple show_if_course';
    $options['virtual']['wrapper_class'] = 'show_if_simple show_if_consulting show_if_course show_if_mentoring ow_if_downloadable';
    return $options;
}
add_action('product_type_options', 'wc_custom_product_type_options');

function custom_js()
{
?>
    <script type='text/javascript'>
        document.querySelector('#product_type').addEventListener('change', function(e) {

            let ptype = e.target.value;
            if ('downloadable' === ptype) {
                console.log('yes');
                document.querySelector('#is_downloadable').checked = true;
            }else{
                document.querySelector('#is_downloadable').checked = false;
            }
        })
    </script>
<?php
}
//add_action('wp_footer', 'custom_js')

?>
<?php

/**
 * Consulting product type 
 */
function course_register_demo_product_type()
{
    class WC_Product_Course extends WC_Product
    {
        public function __construct($product)
        {
            $this->product_type = 'course';
            parent::__construct($product);
        }
    }
}
add_action('init', 'course_register_demo_product_type');

/**
 * Course Product Name Assign 
 */

function course_add_demo_product_type($types)
{
    $types['course'] = __('Course (€ per participent)', 'dm_product');
    return $types;
}
add_filter('product_type_selector', 'course_add_demo_product_type');


/**
 * General and Inventor tab active for custom consulting product type 
 */
function course_admin_custom_js()
{
    if ('product' != get_post_type()) :
        return;
    endif;
?>
    <script type='text/javascript'>
        jQuery(document).ready(function() {
            //for Price tab
            jQuery('.product_data_tabs .general_tab').addClass('show_if_course').show();
            jQuery('#general_product_data .pricing').addClass('show_if_course').show();
            //for Inventory tab
            jQuery('.inventory_options').addClass('show_if_course').show();
            jQuery('#inventory_product_data ._manage_stock_field').addClass('show_if_course').show();
            jQuery('#inventory_product_data ._sold_individually_field').parent().addClass('show_if_course').show();
            jQuery('#inventory_product_data ._sold_individually_field').addClass('show_if_course').show();
        });
    </script>
<?php

}
add_action('admin_footer', 'course_admin_custom_js');

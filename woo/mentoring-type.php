<?php

/**
 * Consulting product type 
 */
function mentoring_register_demo_product_type()
{
    class WC_Product_Mentoring extends WC_Product
    {
        public function __construct($product)
        {
            $this->product_type = 'mentoring';
            parent::__construct($product);
        }
    }
}
add_action('init', 'mentoring_register_demo_product_type');

function mentoring_add_product_type($types)
{
    $types['mentoring'] = __('Mentoring (€ per hour)', 'dm_product');
    return $types;
}
add_filter('product_type_selector', 'mentoring_add_product_type');

/**
 * General and Inventor tab active for custom consulting product type 
 */
function mentoring_admin_custom_js()
{
    if ('product' != get_post_type()) :
        return;
    endif;
?>
    <script type='text/javascript'>
        jQuery(document).ready(function() {
            //for Price tab
            jQuery('.product_data_tabs .general_tab').addClass('show_if_mentoring').show();
            jQuery('#general_product_data .pricing').addClass('show_if_mentoring').show();
            //for Inventory tab
            jQuery('.inventory_options').addClass('show_if_mentoring').show();
            jQuery('#inventory_product_data ._manage_stock_field').addClass('show_if_mentoring').show();
            jQuery('#inventory_product_data ._sold_individually_field').parent().addClass('show_if_mentoring').show();
            jQuery('#inventory_product_data ._sold_individually_field').addClass('show_if_mentoring').show();
        });
    </script>
<?php

}
add_action('admin_footer', 'mentoring_admin_custom_js');

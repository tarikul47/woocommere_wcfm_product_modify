<?php

/**
 * Consulting product type 
 */
function downloadable_register_demo_product_type()
{
    class WC_Product_Downloadable extends WC_Product
    {
        public function __construct($product)
        {
            $this->product_type = 'downloadable';
            parent::__construct($product);
        }
    }
}
add_action('init', 'downloadable_register_demo_product_type');

function downloadable_add_demo_product_type($types)
{
    $types['downloadable'] = __('Downloadable (€ per deliverable)', 'dm_product');
    return $types;
}
add_filter('product_type_selector', 'downloadable_add_demo_product_type');

/**
 * General and Inventor tab active for custom consulting product type 
 */
function downloadable_admin_custom_js()
{
    if ('product' != get_post_type()) :
        return;
    endif;
?>
    <script type='text/javascript'>
        jQuery(document).ready(function() {
            //for Price tab
            jQuery('.product_data_tabs .general_tab').addClass('show_if_downloadable').show();
            jQuery('#general_product_data .pricing').addClass('show_if_downloadable').show();
            //for Inventory tab
            jQuery('.inventory_options').addClass('show_if_downloadable').show();
            jQuery('#inventory_product_data ._manage_stock_field').addClass('show_if_downloadable').show();
            jQuery('#inventory_product_data ._sold_individually_field').parent().addClass('show_if_downloadable').show();
            jQuery('#inventory_product_data ._sold_individually_field').addClass('show_if_downloadable').show();
        });
    </script>
<?php

}
add_action('admin_footer', 'downloadable_admin_custom_js', 1);

<?php

/**
 * Consulting product type 
 */
function consulting_register_demo_product_type()
{
    class WC_Product_Consulting extends WC_Product
    {
        public function __construct($product)
        {
            $this->product_type = 'consulting';
            parent::__construct($product);
        }
    }
}
add_action('init', 'consulting_register_demo_product_type');

function consulting_add_demo_product_type($types)
{
    $types['consulting'] = __('Consulting (€ per project)', 'dm_product');
    return $types;
}
add_filter('product_type_selector', 'consulting_add_demo_product_type');

/**
 * General and Inventor tab active for custom consulting product type 
 */
function consulting_admin_custom_js()
{
    if ('product' != get_post_type()) :
        return;
    endif;
?>
    <script type='text/javascript'>
        jQuery(document).ready(function() {
            //for Price tab
            jQuery('.product_data_tabs .general_tab').addClass('show_if_consulting').show();
            jQuery('#general_product_data .pricing').addClass('show_if_consulting').show();
            //for Inventory tab
            jQuery('.inventory_options').addClass('show_if_consulting').show();
            jQuery('#inventory_product_data ._manage_stock_field').addClass('show_if_consulting').show();
            jQuery('#inventory_product_data ._sold_individually_field').parent().addClass('show_if_consulting').show();
            jQuery('#inventory_product_data ._sold_individually_field').addClass('show_if_consulting').show();
        });
    </script>
<?php

}
add_action('admin_footer', 'consulting_admin_custom_js', 1);

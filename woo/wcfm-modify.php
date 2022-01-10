<?php

/**
 * Wcfm Product remove and add our expected product type 
 */

add_filter('wcfm_product_types', function ($producttyps) {
    // Product type remove 
    unset($producttyps['variable']);
    unset($producttyps['grouped']);
    unset($producttyps['external']);
    // Product type modify 
    $producttyps['simple'] = __('Course (€ per participent)', 'woocommerce');
    // Product type add 
    $producttyps['consulting'] = __('Consulting (€ per project)', 'woocommerce');
    $producttyps['downloadable'] = __('Downloadable (€ per deliverable)', 'woocommerce');
    $producttyps['mentoring'] = __('Mentoring (€ per hour)', 'woocommerce');
    return $producttyps;
}, 50);

/**
 * Product Type manage field
 */

function wcfm_custom_product_manage_fields_1110_general($general_fileds, $product_id, $product_type)
{
    global $WCFM;
    if (isset($general_fileds['is_virtual'])) {
        $general_fileds['is_virtual']['dfvalue'] = 'enable';
    }
    if (isset($general_fileds['is_downloadable'])) {
        $general_fileds['is_downloadable']['dfvalue'] = 'enable';
    }
    return $general_fileds;
}
//add_filter('wcfm_product_manage_fields_general', 'wcfm_custom_product_manage_fields_1110_general', 150, 3);

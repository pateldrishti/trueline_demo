   <?php
   defined('BASEPATH') or exit('No direct script access allowed');
   /*
       Module Name: shipping_address
       Description: Custom module is developed for Your module description
       Version: 1.0
       Requires at least: 2.3.*
       Author: <a href="https://truelineinfotech.com" target="_blank">Chirag Jagani<a/>
   */

   /*
   * Define module name
   * Module Name Must be in CAPITAL LETTERS
   */
   define('SHIPPING_ADDRESS_MODULE', 'shipping_address');

   //get codeigniter instance
   $CI = &get_instance();

   /*
    *  Register activation module hook
    */
    register_activation_hook(SHIPPING_ADDRESS_MODULE, 'shipping_address_module_activation_hook');
    function shipping_address_module_activation_hook()
    {
       $CI = &get_instance();
       require_once __DIR__.'/install.php';
    }

   /*
   *  Register language files, must be registered if the module is using languages
   */
   register_language_files(SHIPPING_ADDRESS_MODULE, [SHIPPING_ADDRESS_MODULE]);

    /*
     *  Load module helper file
    */
    $CI->load->helper(SHIPPING_ADDRESS_MODULE.'/shipping_address');

    /*
     *  Load module Library file
    */
    $CI->load->library(SHIPPING_ADDRESS_MODULE.'/shipping_address_lib');

    /*
     *  Inject css file for shipping_address module
    */
    hooks()->add_action('app_admin_head', 'shipping_address_add_head_components');
    function shipping_address_add_head_components()
    {
        //check module is enable or not (refer install.php)
        if ('1' == get_option('shipping_address_enabled')) {
            $CI = &get_instance();
            echo '<link href="'.module_dir_url('shipping_address', 'assets/css/shipping_address.css').'?v='.$CI->app_scripts->core_version().'"  rel="stylesheet" type="text/css" />';
        }
    }

    /*
     *  Inject Javascript file for shipping_address module
    */
    hooks()->add_action('app_admin_footer', 'shipping_address_load_js');
    function shipping_address_load_js()
    {
        if ('1' == get_option('SHIPPING_ADDRESS_enabled')) {
            $CI = &get_instance();
            echo '<script src="'.module_dir_url('shipping_address', 'assets/js/shipping_address.js').'?v='.$CI->app_scripts->core_version().'"></script>';
        }
    }

    hooks()->add_action('admin_init','shipping_address');
function shipping_address(){
    $CI = &get_instance();
    $CI->app_menu->add_sidebar_menu_item('shipping_address',[
        'slug' => 'shipping_address',
        'name' => 'shipping address',
        'icon' => 'fa fa-address-card',
        'href' => admin_url('shipping_address/index'),
        'position' => 23,
    ]);
}


hooks()->add_filter('staff_permissions', 'shipping');
function shipping($permissions)
{
  $viewGlobalName      = _l('permission_view').'('._l('permission_global').')';
  $allPermissionsArray = [
    'view'     => $viewGlobalName,
    'create'   => _l('permission_create'),
    'edit'     => _l('permission_edit'),
    'delete'   => _l('permission_delete'),
  ];
  $permissions['shipping_address'] = [
    'name'         => _l('shipping_address'),
    'capabilities' => $allPermissionsArray,
  ];

  return $permissions;
}

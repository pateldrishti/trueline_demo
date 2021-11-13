<?php
defined('BASEPATH') or exit('No direct script access allowed');

$aColumns = ['address','city','state','zip'];

$sIndexColumn = 'id';
$sTable       = db_prefix().'customer_shipping_address';

$result  = data_tables_init($aColumns, $sIndexColumn, $sTable, [], [], ['id']);
$output  = $result['output'];
$rResult = $result['rResult'];

foreach ($rResult as $aRow) 
{
    $row = [];
    for ($i = 0; $i < count($aColumns); $i++) 
    {
        $_data = $aRow[$aColumns[$i]];
        $_data='<span class="mbot10 display-block">' . $_data . '</span>';
        $row[] = $_data;
    }
    $options = "<a href='javascript:void(0);'' class='btn btn-info edit_custom_shipping_address btn-icon' data-row='".json_encode($aRow,ENT_QUOTES)."' ><i class='fa fa-pencil'></i></a>";
    $row[]   = $options .= icon_btn(admin_url('shipping_address/delete_data/'). $aRow['id'], 'remove', 'btn-danger _delete');
    $output['aaData'][] = $row;
}
?>
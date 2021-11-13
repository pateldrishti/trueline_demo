<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php 
if($view=="tab")
{
    ?>
    <li role="presentation">
      <a href="#bulk_shipping_address" aria-controls="bulk_shipping_address" role="tab" data-toggle="tab">
          <?php echo _l( 'shipping_address'); ?>
      </a>
  </li>
  <?php
}

if($view=="content")
{
    ?>    
    <div role="tabpanel" class="tab-pane" id="bulk_shipping_address">
        <div class="form-group">
            <button type="button" class="btn btn-primary" onclick="init_shipping_modal()">
              <?php echo _l('new_shipping_address') ?>
          </button>
      </div>
      <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <?php   
                render_datatable(array(
                    _l('shipping_name'),
                    _l('shipping_street'),
                    _l('shipping_city'),
                    _l('shipping_state'),
                    _l('pur_shipping_zip'),
                    _l('shipping_country'),
                    _l('action')
                ),'bulk-shipping-address');
                ?>
            </div>
        </div>
    </div> 
</div>    
<?php
}

?>

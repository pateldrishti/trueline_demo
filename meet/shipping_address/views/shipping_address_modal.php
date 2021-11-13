<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal fade" id="custom_shipping_address_modal" tabindex="-1" role="dialog">
   <div class="modal-dialog">
        <?php echo form_open($add_form_url,['id'=>'shipping_address_frm']); ?>
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">
               <span class="edit-title"><?php echo _l('edit_shipping_address'); ?></span>
               <span class="add-title"><?php echo _l('add_shipping_address'); ?></span>
            </h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12">                    
                    <?php echo form_hidden('client_id',$client_id) ?> 
                    <?php echo form_hidden('shipping_address_id') ?> 
                    <?php echo render_input('name', 'Shipping Name'); ?>                
                    <?php echo render_textarea( 'street', 'shipping_street'); ?>                
                    <?php echo render_input( 'city', 'shipping_city'); ?>                
                    <?php echo render_input( 'state', 'shipping_state'); ?>                    
                    <?php echo render_input( 'zip', 'shipping_zip'); ?>                
                    <?php 
                        $countries = $this->clients_model->get_clients_distinct_countries();
                        echo render_select( 'country',$countries,array( 'country_id',array( 'short_name')), 'shipping_country','',array('data-none-selected-text'=>_l('dropdown_non_selected_tex'))); 
                    ?>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>
            <button type="submit" class="btn btn-info"><?php echo _l('submit'); ?></button>
         </div>
      </div><!-- /.modal-content -->
        <?php echo form_close(); ?>
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
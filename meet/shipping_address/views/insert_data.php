<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
  	<div class="content">
    	<div class="row">
      		<div class="col-md-12">
        
	        <div class="panel_s "  style="margin-top: 50px">
	          <div class="panel-body">
	           
	          	<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter">
				  New Shipping Address
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Add New Shipping Address</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">

				        <form method="post" id="shipping_address_frm" action="<?php echo admin_url('shipping_address/insert_data') ?>">
					      	<div class="form-group row">
							  <label class="col-sm-4 control-label" for="address">Address</label>
							  <div class="col-sm-8">                     
							    <textarea id="address" name="address" class="form-control"></textarea>
							  </div>
							</div>

							<div class="form-group row">
							  <label class="col-sm-4 control-label" for="city">City</label>
							  <div class="col-sm-8">
							    <input id="city" name="city" type="text" placeholder="" class="form-control input-md">
							  </div>
							</div>

							<div class="form-group row">
							  <label class="col-sm-4 control-label" for="city">State</label>
							  <div class="col-sm-8">
							    <input id="state" name="state" type="text" placeholder="" class="form-control input-md">
							  </div>
							</div>

							<div class="form-group row">
							  <label class="col-sm-4 control-label" for="city">Zip Code</label>
							  <div class="col-sm-8">
							    <input id="zip" name="zip" type="text" placeholder="" class="form-control input-md">
							  </div>
							</div>

							<div class="form-group row">
								<div class="col-md-12">
									<input type="hidden" value="" id="hd" class="form-control">
								</div>
							</div>

					    <div class="modal-footer">
						    <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
						     <input type="submit" name="" class="btn btn-success update" value="Submit" id="sbt">
					    </div>
					    </form>
					   </div>
				  </div>
				</div>
	     </div>  

	          <hr width="100%">

	          <?php 
	            $data=array('Address','City','State','Zip Code','Action');
	            render_datatable($data,'shipping_table');
	          ?>

	        </div>
	      </div>
    </div>
  </div>
</div>
</div>
<?php init_tail(); ?>

<script type="text/javascript">
	
	$(document).ready(function() {

			
			$(document).on('click','.edit_custom_shipping_address',function(){
				var row = $(this).data('row'); 
		 		$('#exampleModalCenter').modal('show');
		 		$('#address').val(row.address);
		 		$('#city').val(row.city);
		 		$('#state').val(row.state);
		 		$('#zip').val(row.zip);
		 		$('#hd').val(row.id);
		 		$('#sbt').val('Update');
		 		$('#sbt').prop('class','btn btn-info update');
		 		$('#close').remove();
		 		$('#shipping_address_frm').add('id','#update_form');
			});

			$(document).on('click','.update',function(e){
				e.preventDefault();
				var address=$('#address').val();
				var city=$('#city').val();
				var state=$('#state').val();
				var zip=$('#zip').val();
				var id=$('#hd').val();
				$.ajax({
					url: '<?php echo admin_url('shipping_address/update_address'); ?>',
					type: 'POST',
					data: {address:address,city:city,state:state,zip:zip,id:id},
					success : function(res){
						console.log(res);
						$('#exampleModalCenter').modal('hide');
						$('.table-shipping_table').DataTable().ajax.reload();
						$('#update_form').remove();
					}
				})
			});

			$('#sbt').prop('class','btn btn-success');
			$('#sbt').prepend('<button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>');
	});

</script>
<script>
   $(function(){
     initDataTable('.table-shipping_table',admin_url+"shipping_address/table", [1], [1]);
  });
</script> 
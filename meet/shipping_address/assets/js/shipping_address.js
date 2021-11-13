$(function(){
	initDataTable('.table-bulk-shipping-address',admin_url+"shipping_address/table/"+customer_id,undefined,undefined);
	appValidateForm($('#shipping_address_frm'), {
		shipping_name:'required',
		shipping_street:'required',
		shipping_city:'required',
		shipping_state:'required',
		shipping_zip:'required',
		shipping_country:'required',
	});
});

$('#shipping_address_frm').on('submit',function(e){
	e.preventDefault();
	var dataString = $(this).serialize();
	var url = $(this).attr('action')
	if($(this).valid()){
		$.post(url,dataString, function(data, textStatus, xhr) {
		  
		}).done(function(response){
			$('#custom_shipping_address_modal').modal('hide');
			var data = JSON.parse(response);
			if(data.success=="success"){
				alert_float('success',data.message)
			}else{
				alert_float('danger',data.message)
			}
		});
		$('.table-bulk-shipping-address').DataTable().ajax.reload();
	}
	
});

$(document).on('click','.edit_custom_shipping_address',function(e){
	 var row = $(this).data('row'); 
	 $('#custom_shipping_address_modal').modal('show');

	 $.each(row,function(key,val){
	    var elem = "#shipping_address_frm #"+key;
	    if($(elem).length > 0){
	       $(elem).val(val);
	    }
	    if (key == "country") {
	    	$("#shipping_address_frm #country").selectpicker('val',$.parseJSON(val));
	    }
	    if (key == "id") {
	    	$("#shipping_address_frm input[name='shipping_address_id']").val(val);
	    }
	 });
})

function init_shipping_modal()
{
	$('#custom_shipping_address_modal').modal('show');
	$('.edit-title').hide();
}

function edit_custom_shipping_address(data)
{
	var dataString = JSON.parse(response);
	console.log(dataString);
}
$(document).ready(function(){
	$("#filter").click(function() {
		//var keywords = $('#keywords').val();
		getData('search', name, event);
	});

});
function getData(type, name, event) {
	$.ajax({
		type: 'POST',
		url: 'action2.php',
		data: 'name='+name+'&event='+event,
		beforeSend:function(html){
			//$('.loading-overlay').show();
		},
		success:function(html){
			//$('.loading-overlay').hide();
			//$('#userData').html(html);
		}
	});
}
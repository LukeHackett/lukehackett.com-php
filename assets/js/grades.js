jQuery(function($){
	
	$('.grade').on('click', function(){
		var self = $(this);
		var parentRow = self.parents('tr');
		var module = "." + parentRow.data('module');
		parentRow.siblings(module).toggle();
	});
	
});
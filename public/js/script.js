// xu li div
var x = $('.side-box .row .col-md-banner');
var x_nx = $(x[1]).next()[0];
$(document).ready(function(){
	swap(x[1] , x_nx);
	$("#add-to-cart").click(function(event) {
		let id = $(this).attr('item-buy');
	    addCart(id);
	});
	let input = $("input[data-click]").each(function() {
		let value = parseInt($(this).val());
		if(value >= 5) {
			$(this).parent().find("button[clicked='plus']").attr('disabled', true);
			$(this).parent().find("button[clicked='minus']").attr('disabled', false);
		}
		else if(value <= 1){
			$(this).parent().find("button[clicked='plus']").attr('disabled', false);
			$(this).parent().find("button[clicked='minus']").attr('disabled', true);
		}
	});
	$("button[clicked='plus']").click(function(event) {
		let id = $(this).parents('tr').attr('data-product-id');
		let input = $("input[data-click='"+id+"']");
		let number = parseInt(input.val());
		if(number < 5) {
			$("input[data-click='"+id+"']").val(number+1);
			addCart(id, input.val());
			$(this).attr('disabled', false);
			$(this).parent().find("button[clicked='minus']").attr('disabled', false);
		} else {
			$(this).attr('disabled', true);
		}
	});
	$("button[clicked='minus']").click(function(event) {
		let id = $(this).parents('tr').attr('data-product-id');
		let input = $("input[data-click='"+id+"']");
		let number = parseInt(input.val());
		if(number > 1) {
			input.val(number-1);
			addCart(id, input.val());
			$(this).attr('disabled', false);
			$(this).parent().find("button[clicked='plus']").attr('disabled', false);
		} else {
			$(this).attr('disabled', true);
		}
	});
});
function addCart(id, num = 0) {
	$('.loading').css('display', 'flex');
	$.ajax({
		url: '/add-to-cart/' + id + '/' + num,
		type: 'POST',
		dataType: 'json'
	})
	.done(function(data) {
		if(data.status == 200) {
			window.location.replace('/cart');
		}
		else {
			console.log('loi');
		}
	})
	.fail(function(xhr, textStatus, errorThrown) {
		var errorMessage = xhr.status + ': ' + xhr.statusText
        console.log('Error:' + errorMessage);
	});
}
function swap(el1 , el2){
    var $window = $(window);
    if($window.width() <= 768){
        $(el2).insertBefore(el1);
    }else{
        $(el2).insertAfter(el1);
    }
}
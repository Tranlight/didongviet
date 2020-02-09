$(function() {
	// Process Pagination
	let pagePagination = $('.products-pag .page-item');
	let pageIndex = pagePagination.not(':first').not(':last');
	let pageCurrentIndex = null;
	pagePagination.click(function(event) {
		if($(this).is('#next-pag')) {
			pageCurrentIndex = pageIndex.find('.disabled');
		} else if($(this).is('#prev-pag')) {
			pageCurrentIndex = pageIndex.find('.disabled');
		} else {
			pageCurrentIndex = $(this);
		}
		let numPage = pageCurrentIndex.find('a').html();
		console.log(numPage);
		$.ajax({
			url: '/products/' + numPage,
			type: 'POST',
			dataType: 'json'
		})
		.done(function(data) {
			if(data.status == 200) {
				$('.tb tbody').html(data.html);
				pageIndex.removeClass('disabled');
				pageCurrentIndex.addClass('disabled');
				if($(this).is('#prev-pag')) {
					pagePagination.first().addClass('disabled');
					pagePagination.last().removeClass('disabled');
				} else if($(this).is('#next-pag')){
					pagePagination.last().addClass('disabled');
					pagePagination.first().removeClass('disabled');
				} else {
					pagePagination.first().removeClass('disabled');
					pagePagination.last().removeClass('disabled');
				}
			}
			else {
				console.log('loi');
			}
		})
		.fail(function(xhr, textStatus, errorThrown) {
			var errorMessage = xhr.status + ': ' + xhr.statusText
		    console.log('Error:' + errorThrown);
		});
	});


});
function getPage(index) {
	
}
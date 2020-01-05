// xu li div
var x = $('.side-box .row .col-md-banner');
var x_nx = $(x[1]).next()[0];
$(document).ready(function(){
    swap(x[1] , x_nx);
});

function swap(el1 , el2){
    var $window = $(window);
    if($window.width() <= 768){
        $(el2).insertBefore(el1);
    }else{
        $(el2).insertAfter(el1);
    }
}

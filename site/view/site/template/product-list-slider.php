<div class="container-fluid">
	<div class="side-box">
		<div class="header-box">
			<h3 class="title-box"><?php echo $title; ?></h3>
			<ul class="option-box-right">
				<li><a href="#">iPhone</a></li>
				<li><a href="#">Samsung</a></li>
				<li><a href="#">Xiaomi</a></li>
				<li><a href="#">Xem tất cả</a></li>
			</ul>
		</div>
		<div class="owl-carousel" id=<?php echo '"owl-'.md5($title).'"'; ?>>
			<?php foreach ($list_product as $p) {$this->loadView('site/template/product-item',array('feature' => false, 'p' => $p));}?>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$(<?php echo '"#owl-'.md5($title).'"' ?>).owlCarousel({
					lazyLoad: true,
					items: 5,
					dots: false,
					responsive:{
						0:{
							items:2
						},
						576:{
							items:3
						},
						768:{
							items:3
						},
						992:{
							items:5
						}
					},
					nav: true,
					navigationText: [
					"‹",
					">"
					]
				});
			});
		</script>
	</div>
	<!-- list-item -->
</div>
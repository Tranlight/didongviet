<div class="container-fluid">
	<div class="side-box">
		<div class="header-box">
			<h3 class="title-box"><?php echo $title ?></h3>
			<ul class="option-box-right">
				<li><a href="#">iPhone</a></li>
				<li><a href="#">Samsung</a></li>
				<li><a href="#">Xiaomi</a></li>
				<li><a href="#">Xem tất cả</a></li>
			</ul>
		</div>
		<div class="row">
			<?php foreach ($list_product as $p) {
				$image_size = getimagesize(asset($p['url_images'],1));
				$feature = (boolean) ($image_size[0]>=$image_size[1]*2);
				if($feature) { 
					echo '<div class="col-xs-12 col-sm-6  col-md-banner">';
			 	} else {
					echo '<div class="col-xs-6 col-sm-3 col-lg-2 col-md-12-5">';
				}
				$this->loadView('site/template/product-item',array('feature'=>$feature,'p' => $p));
				echo '</div>';
			} ?>
		</div>
	</div>
	<!-- list-item -->
</div>
<div class="container-fluid">
	<div class="product-detail">
		<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
			<div class="outer">
				<div id="owl-big" class="owl-carousel owl-theme">
					<?php
					$img = explode('|', $url_images);
					foreach ($img as $value): ?>
						<div class="item" style=<?php echo '"background-image: url('.asset($value).'); background-size: contain;
    						background-repeat: no-repeat; "'; ?>></div>
					<?php endforeach ?>
				</div>
				<div id="thumbs" class="owl-carousel owl-theme">
					<?php foreach ($img as $value): ?>
						<div class="item" style=<?php echo '"width: 60px;background-image: url('.asset($value).')"'; ?>></div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<script type="text/javascript" src=<?php echo asset('/js/product-detail.js') ?>></script>
		<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 pl-0">
			<div class="wrap-border">
				<h3 class="name"><?php echo $name ?></h3>
				<div class="rate">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-alt"></i>
					<i class="fal fa-star"></i>
				</div>
				<div class="price">
					<strong><?php echo currency_format($price_sale) ?></strong>
					<del><?php echo !empty($price_original)?currency_format($price_original):'' ?></del>
				</div>
				<div class="attr">
					<div class="color">
						<label>Màu sắc: </label>
						<select class="form-control">
							<option class="form-control">Đỏ</option>
							<option class="form-control">Xanh Ngọc Bích</option>
							<option class="form-control">Đen</option>
						</select>
					</div>

				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Khuyến mãi</div>
					<div class="panel-body">
						<li>Hỗ trợ trả góp 0% dành cho các chủ thẻ tín dụng VPBank,Sacombank, VIB và Shinhan Bank</li>
						<li>Máy mới 100% do Apple Việt Nam phân phối chính hãng</li>
					</div>
				</div>
				<button type="button" id="add-to-cart" item-buy=<?php echo "\"$id\"" ?>class="btn btn-large btn-block btn-info">
					<div><strong>Mua ngay</strong></div>
					<span>Miễn phí giao hàng trong nội thành</span>
				</button>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 ml-0">
		</div>
	</div>
</div>
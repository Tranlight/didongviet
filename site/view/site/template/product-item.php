<div class=<?php echo '"product-item'.($feature?' feature"':'"')?>>
	<a href=<?php echo '"/product'.$p['alias'].'"' ?>>
		<div class="product-thumbnail">
			<img src=<?php echo asset(explode('|', $p['url_images'])[0])?>>
		</div>
	</a>
	<div class="product-box">
		<h4 class="product-title"><a href=<?php echo '"/product'.$p['alias'].'"' ?>><?php echo $p['name'] ?></a></h4>
		<div class="product-price">
			<strong><?php echo currency_format($p['price_original'])?></strong>
			<span><?php echo !empty($p['price_sale'])?currency_format($p['price_sale']):'' ?></span>
		</div>
	</div>
</div>
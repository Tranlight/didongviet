<div class="container-fluid">
	<?php if(count($list_products) == 0):?>
	<div class="empty-cart">
		<img src="public/image/Logo/logo.png" style="margin: 0 auto;">
		<h4 style="text-align: center;">Không có gì trong giỏ</h4>
		<button class="btn btn-primary" onclick="location.replace('http://didongvietcom.vn')">Tiếp tục mua sắm</button>
	</div>
	<?php else:?>
	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
		<table id="cart" class="table">
			<thead>
				<tr>
					<th style="width:50%"></th>
					<th style="width:10%"></th>
					<th style="width:8%"></th>
					<th style="width:22%" class="text-center"></th>
					<th style="width:10%"></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($list_products as $product => $value) { extract($value);?>
				<tr data-product-id=<?php echo $id; ?>>
					<td data-th="Product">
						<div class="row">
							<div class="col-sm-2 hidden-xs"><img src=<?=asset($url_images)?> alt=<?php echo "\"$name\""; ?> class="img-responsive"/></div>
							<div class="col-sm-10">
								<a href=<?php echo '/product'.$alias?>><h4 class="nomargin"><?php echo $name ?></h4></a>
								<p><?php echo $name ?></p>
							</div>
						</div>
					</td>
					<td><?php echo currency_format($price_sale?$price_sale:$price_original) ;
					?></td>
					<td>
						<div class="input-group">
							<span class="input-group-btn">
								<button type="button" clicked="minus" class="btn btn-default">-</button>
							</span>
							<input type="number" max="5" min="0" class="form-control" data-click=<?php echo $id ?> placeholder="10" style="width: 34px;padding: 0px 4px;text-align: center;" value=<?php echo $num;?>>
							<span class="input-group-btn">
								<button type="button" clicked="plus" class="btn btn-default">+</button>
							</span>
						</div>
					</td>
					<td data-th="Subtotal" class="text-center"><?php  echo currency_format(($price_sale?$price_sale:$price_original)*$num) ?></td>
				</tr>
			<?php }?>
			</tbody>
		</table>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
		<ul class="list-group" style="font-size: 20px;">
			<li class="list-group-item">
				<span >Tạm tính :</span>
				<strong><?php  echo currency_format($total) ?></strong>
			</li>
			<li class="list-group-item">
				<span >Thành tiền :</span>
				<strong><?php  echo currency_format($total) ?></strong>
			</li>
		</ul>
		<button id="add-to-cart" type="button" class="btn btn-primary btn-block">Đặt hàng ngay</button>
	</div>
	<?php endif;?>
	<div class="loading">
		<div class="fa-3x">
		<i class="fas fa-spinner fa-spin"></i>
		</div>
	</div>
</div>
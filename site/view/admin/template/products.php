<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">	
			<!-- BASIC TABLE -->
			<div class="panel product-mrg">
				<div class="panel-heading">
					<button title="Thêm sản phẩm" class="btn"><i class="fal fa-plus"></i></button>
					<div class="navbar-right">
						<b>Thao tác: </b>
						<select class="form-control" style="width: 100px; display: inline-block;">
						  <option value="1" selected>Xóa</option>
						  <option value="1">One</option>
						  <option value="2">Two</option>
						  <option value="3">Three</option>
						</select>
						<button title="Thêm sản phẩm" class="btn">Thực hiện</button>
					</div>
				</div>
				<div class="panel-body">
					<table class="table tb">
						<thead>
							<tr>
								<th>#</th>
								<th>id</th>
								<th>Cover</th>
								<th>Title</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($products as $product): extract($product);?>
							<tr data-product=<?php echo $id; ?>>
								<td><input type="checkbox" name="cbox"></td>
								<td><?php echo $id ?></td>
								<td><img height="30px" src=<?php echo asset(explode('|', $url_images)[0]) ?>></td>
								<td><a href=<?php echo '/product'.$alias; ?>><?php echo $name ?></a></td>
								<td>
									<button title="Edit" class="btn btn-warning"><i class="fal fa-edit"></i></button>
									<button title="Delete" class="btn btn-danger"><i class="fal fa-trash-alt"></i></button>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<ul class="pagination products-pag">
			    <li class="page-item disabled">
			      <a class="page-link" tabindex="-1">Previous</a>
			    </li>
				<li class="page-item disabled"><a class="page-link"><?php echo 1 ?></a></li>
			    <?php
			    	for($i = 2; $i <= $pages; $i ++):
			    ?>
			    <li class="page-item"><a class="page-link"><?php echo $i ?></a></li>
				<?php endfor;?>
			    <li class=<?php echo '"page-item'. (($pages == 1) ? ' disabled"': '"') ?>>
			      <a class="page-link">Next</a>
			    </li>
			  </ul>
			</nav>
			<!-- END BASIC TABLE -->
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
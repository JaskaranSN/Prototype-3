<?php
	require_once("../database.php");
	require_once("../classes/_Ideals.php");
	require_once("admin_functions.php");
	include("admin_header.php");

	global $idea;
	if ( is_user_login() ) {
		if ( current_user_can_manage() ) {
			?>
		<div class="admin-container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2">
						<?php
							$current_tab = 'idea';
							include("admin_sidebar.php"); 
						?>
					</div>
					<div class="col-md-10">
						<nav class="nav">
							Ideas |
							<a href="addcategory.php"> Add Category </a>
						</nav>
					<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Price</th>
							<th>Add date</th>
							<th>Modify date</th>
							<th>Thumbnail</th>
							<th>In Recipes</th>
							<th>Actions</th>
						</tr>
					</thead>
					<?php 
						
						$ideas = $idea->get_all_ideas_by_category();
					?>
					<?php if ( $ideas ) : ?>
					<?php foreach ( $ideas as $idea ) : ?>
						<tbody>
							<tr> 
								<th scope="row">
									<?php echo $r['id']; ?>
								</th> 
								<td><?php echo $r['name']; ?></td>
								 <td><?php echo $r['mota']; ?></td>
								  <td><?php echo $r['term_name']; ?></td>
								  <td><?php echo $r['soluong']; ?></td>
								  <td><?php echo $r['gia']; ?> VNĐ</td>
								  <td>
								  <?php if ( $r['anh'] && $r['anh'] != '' ) : ?>
								  	<img width="32" height="32" src="<?php echo $r['anh']; ?>">
								  <?php endif; ?>
								  	</td>
								  <td>
								  	<a href="suasanpham.php?id=<?php echo $r['id'] ?>&name=<?php echo $r['name'] ?>&mota=<?php echo $r['mota'] ?>&lh=<?php echo $r['loaihang'] ?>&sl=<?php echo $r['soluong'] ?>&gia=<?php echo $r['gia'] ?>&anh=<?php echo $r['anh'] ?>"> Sửa </a> |
									<a href="thuchienxoasanpham.php?id=<?php echo $r['id'] ?>"> Xóa </a>
								  </td>
								   </tr>
								 <tr> 
							</tr>
						</tbody>
					<?php endforeach; ?>
				<?php endif; ?>

					</table>
					</div>
				</div>
			</div>
		</div>
		<?php
		 } else {
		 echo "<script>
	        alert('Eh try to cheat huh?');
	        window.location.href = '../index.php';
	      </script>";
      }
	} else {
		echo "<script>
	        alert('Eh try to cheat huh?');
	        window.location.href = '../index.php';
	      </script>";
	}


	include("admin_footer.php");
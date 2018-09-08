<?php
	include_once '../config.php';
	$user->check_userlogin();
	$user->check_adminlogin();
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$date = $_POST['date'];
		$date = date2mysql($date);

		$data = $call->callSelectedData($id,$date);

?>
<div id="page_content_inner">
	<div class="uk-width-medium-1-1">
		<div class="md-card">
			<div class="md-card-content">
				<h3 class="heading_a">Today's Queue</h3>
				<table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Department</th>
							<th>Number</th>
							<th>Counter</th>
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th>#</th>
							<th>Department</th>
							<th>Number</th>
							<th>Counter</th>
						</tr>
					</tfoot>

					<tbody>
						<?php 
							$x=1;
							foreach ($data as $key) {

						?>
						<tr>
							<td><?php echo $x; ?></td>
							<td><?php echo $dept->deptdata($key->department)->department_name; ?></td>
							<td><?php echo $dept->deptdata($key->department)->department_label." - ". $key->number; ?></td>
							<td><?php echo $key->counter; ?></td>
						</tr>

						<?php $x++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php } ?>
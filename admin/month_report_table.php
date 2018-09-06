<?php
	include_once '../config.php';
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sdate = $_POST['start_dt'];
		$sdate = date2mysql($sdate);
		$ldate = $_POST['last_dt'];
		$ldate = date2mysql($ldate);

		$data = $call->callMonthData($id,$sdate,$ldate);


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
							<th>User</th>
							<th>Number</th>
							<th>Department</th>
							<th>Counter</th>
							<th>Called Date</th>
							<th>Issue Time</th>
							<th>Called Time</th>
							
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th>#</th>
							<th>User</th>
							<th>Number</th>
							<th>Department</th>
							<th>Counter</th>
							<th>Called Date</th>
							<th>Issue Time</th>
							<th>Called Time</th>
						</tr>
					</tfoot>

					<tbody>
						<?php 
							$x=1;
							foreach ($data as $key) {

						?>
						<tr>
							<td><?php echo $x; ?></td>
							<td><?php echo $user->userdata($key->user)->user_name; ?></td>
							<td><?php echo $dept->deptdata($key->department)->department_label." - ". $key->number; ?></td>
							<td><?php echo $dept->deptdata($key->department)->department_name; ?></td>
							<td><?php echo $key->counter; ?></td>
							<td><?php echo $key->called_date; ?></td>
							<td><?php echo $key->token_time; ?></td>
							<td><?php echo $key->called_time; ?></td>
						</tr>

						<?php $x++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php } ?>
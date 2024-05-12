<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
	}

	private function check_login($redirect = 0, $pathWithSess = '/Client/')
	{

		if (!isset($_SESSION['id'])) {
			redirect(base_url('/Client/login'));
		} else {
			if ($redirect) {
				redirect(base_url($pathWithSess));
			}
			if (isset($_SESSION['role']) && ($_SESSION['role'] != 2)) {
				redirect(base_url('/Admin/login'));
			}
		}
	}


	/* ================= Routing ================= */


	public function index()
	{
		$result =  $this->Dashboard_model->getAllData();

		echo "<pre>";
		print_r(count($result));
		print_r($result);
		echo "</pre>";
	}


	public function CCTVById($cctvID)
	{
		
		$result =  $this->Dashboard_model->getCCTVLogByID($cctvID);

		echo json_encode($result);
	}


	public function CCTVIssueData($branchID)
	{
		
		$result =  $this->Dashboard_model->getCCTVIssue($branchID);

		echo json_encode($result);
	}
	
	public function CCTVData()
	{
		$result =  $this->Dashboard_model->getCCTVData();


		echo json_encode($result);
	}

	public function insertData()
	{
		if ($this->input->post()) {
			$postData = $this->input->post('data');


			foreach ($postData as $data) {
				if ($data['type'] == 'save') {
					unset($data['type']);
					$this->Dashboard_model->insertData($data);
				} else {
					unset($data['type']);
					$this->Dashboard_model->deleteBranchCCTV($data);
				}
			}

			echo 1;
		} else {
			// Handle if form is not submitted
			echo "Form data not found!";
		}
	}

	public function CCTVDataTable()
	{

		$branchID = $_GET['branchid'];

		$result =  $this->Dashboard_model->getCCTVData();
		$result2 =  $this->Dashboard_model->getCCTVBranchData($branchID);
		$result3 =  $this->Dashboard_model->getCCTVBranchData();


	

?>

		<style>
			.bg-b {
				opacity: 50% !important;
				pointer-events: none;
			}
		</style>
		<table class="table text-md-nowrap" id="example2">
			<?php 
				
			 ?>
			<thead>
				<tr>
					<th style="width: 5%;" class="border-bottom-0">#</th>
					<th style="width: 20%;" class="border-bottom-0">Host ID</th>
					<th style="width: 20%;" class="border-bottom-0">Host name</th>
					<th style="width: 20%;" class="border-bottom-0">Type</th>
					<th style="width: 20%;" class="border-bottom-0">Add To this branch</th>

					<!-- 			<th style="width: 20%;" class="border-bottom-0">Last login</th>
					<th style="width: 20%;" class="border-bottom-0">Create when</th>
					<th style="width: 10%;" class="border-bottom-0">Detail</th> -->
				</tr>
			</thead>
			<tbody>
				<?php
					$joinData = [];
				 foreach ($result as $key => $value) {

					$hostid = $value['hostid'];
					$found = false;
					foreach ($result3 as $item2) {
						if ($item2['hostid'] === $hostid) {
							$found = true;
							break;
						}
					}

					if($found == false) {

				?>
					<tr style="cursor:pointer;">
						<td><?= $key + 1 ?></td>
						<td><?= $value['hostid'] ?></td>
						<td><?= $value['host'] ?></td>
						<td><?= $value['groupid'] ?></td>

						<!-- 	<td>  <input type="checkbox" class="hostbox" data-branchid= "<?= $branchID ?>" data-hostid="<?= $value['hostid'] ?>" /> </td> -->
						<td>
							<input type="checkbox" class="hostbox" data-groupid="<?= $value['groupid'] ?>" 
							data-branchid="<?= $branchID ?>" data-hostid="<?= $value['hostid'] ?>" 
							data-type="<?php echo in_array($value['hostid'], array_column($result2, 'hostid')) ? 'init' : 'save'; ?>" <?php echo in_array($value['hostid'], array_column($result2, 'hostid'))   ? 'checked' : ''; ?> />
						</td>

						</td>
					</tr>
				<?php }} ?>
			</tbody>
		</table>
		<script>
			var table = $('#example2').DataTable({
				"pageLength": 10000
			});

			$('tr').click(function() {
				// Find the checkbox within the clicked TD
				var checkbox = $(this).find('input[type="checkbox"]');
				// Toggle its checked state
				checkbox.prop('checked', !checkbox.prop('checked'));
			});

		/* 	$('#checkAll').click(function() {
				$('.hostbox').each(function() {
					$(this).prop('checked', !$(this).prop('checked'));
				});
			}); */

			$('#example2').on('draw.dt', function() {
				console.log('Page changed');
				$('tr').click(function() {
					// Find the checkbox within the clicked TD
					var checkbox = $(this).find('input[type="checkbox"]');
					// Toggle its checked state
					checkbox.prop('checked', checkbox.prop('checked'));
				});
				
			});

			var allChecked = false; // Track the state of checkboxes

			$('#checkAll').click(function() {
				allChecked = !allChecked; // Toggle the state
				$('.hostbox').prop('checked', allChecked);
			});

			// Bind toggle functionality to DataTable's search event
			$('#example').on('search.dt', function () {
				if (allChecked) {
					$('.hostbox').prop('checked', false); // Uncheck all checkboxes if all were checked
					allChecked = false; // Reset the state
				} else {
					$('.hostbox').prop('checked', true); // Check all checkboxes if all were unchecked
					allChecked = true; // Reset the state
				}
			});

		</script>


<?php







	}
}

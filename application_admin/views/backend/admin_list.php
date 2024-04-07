<style>
	.status-wait {
		background: var(--yellow4);
		border-radius: 5px;
		padding: 10px;
	}

	.status-reject {
		background: var(--red4);
		border-radius: 5px;
		padding: 10px;

	}

	.status-success {
		background: var(--green4);
		border-radius: 5px;
		padding: 10px;
	}

	.buttons-html5 {
		margin: 0px 10px;
		border-radius: 10px !important;
		padding-top: 5px !important;
	}

	.buttons-collection {
		margin: 0px 10px;
		border-radius: 10px !important;
		padding-top: 5px !important;
	}

	td {
		font-size: .7rem;
	}

	.btn-searchDate {
		padding: 10px 20px;
		background: var(--blue6);
		border-radius: 5px;
		border: none;
		outline: none;
		color: white;
		display: flex;
		align-items: center;
		justify-content: center;
		transition: .5s;
	}

	.btn-searchDate:hover {
		color: white;
		transition: .5s;
		filter: drop-shadow(5px 5px var(--blue4));
	}

	.btn-clear {
		padding: 10px 20px;
		background: var(--gray-500);
		border-radius: 5px;
		border: none;
		outline: none;
		color: white;
		display: flex;
		align-items: center;
		justify-content: center;
		transition: .5s;
	}

	.btn-clear:hover {
		color: white;
		transition: .5s;
		filter: drop-shadow(5px 5px var(--gray-300));
	}

	.main-content {
		margin-top: 50px !important;
	}

	.banner {
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: space-evenly;
		padding: 20px;
		flex-wrap: wrap;
	}

	.banner img {
		width: 40%;

	}

	@media (max-width: 576px) {
		.banner h1 {
			font-size: 1.5rem;
		}
	}

	@media (min-width: 992px) {
		.main-content {
			padding: 30px 0;
			padding-bottom: 20px;
			margin-top: 50px;
		}
	}

	img {
		pointer-events: none;
	}
</style>
<!--Main Content-->
<div class="main-content px-0 hor-content" style="margin-top: 100px !important;">

	<!--Main Content Container-->
	<div class="container">

		<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">Admin List</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Admin List</li>
			</ol>
		</div>
		<!--Page Header-->
		<section class="banner">
		<!-- 	<img src="<?= base_url('/assets_admin/img/svg/admin.svg') ?>" alt=""> -->
			<div class="d-flex align-items-md-center align-items-center justify-content-center flex-column flex">
					<h2>Admin List</h2>
				<span>All Admin List</span>
			</div>
		</section>
		<!-- Row -->
		<div class="row row-sm">
			<div class="col-md-12">
				<div class="card mg-b-20">
					<div class="card-body row pt-0">
						<div class="col-lg-6 col-md-12 mt-3">
							<div class="main-content-label mg-b-5">
								Firstname
							</div>
							<div class="form-group mg-b-0">
								<input class="form-control" name="fname" id="fname" placeholder="Firstname" required="" type="text">
							</div>
						</div>
						<div class="col-lg-6 col-md-12 mt-3">
							<div class="main-content-label mg-b-5">
								Lastname
							</div>
							<div class="form-group mg-b-0">
								<input class="form-control" name="lname" id="lname" placeholder="Lastname" required="" type="text">
							</div>
						</div>
					</div>


					<div class="row d-flex align-items-center justify-content-center p-3" style="gap: 10px;">
						<button class="btn btn-searchDate" id="btn_searchDate">Search</button>
						<button class="btn btn-clear" id="btn_clear">Clear</button>

					</div>

				</div>
			</div>

		</div>
		<!-- /Row -->
		<!-- Row -->
		<!--div-->

	
		<div class="card mg-b-20">
			<div class="card-body">
				<div class="main-content-label mg-b-5">
					Admin List
				</div>
				<div class="table-responsive" id="tableData">
					<table class="table text-md-nowrap" id="example2">
						<thead>
							<tr>
								<th style="width: 5%;" class="border-bottom-0">#</th>
								<th style="width: 20%;" class="border-bottom-0">Fullname</th>
								<th style="width: 20%;" class="border-bottom-0">Email</th>
								<th style="width: 20%;" class="border-bottom-0">Last login</th>
								<th style="width: 20%;" class="border-bottom-0">Create when</th>
								<th style="width: 10%;" class="border-bottom-0">Detail</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($adminList as $key => $value) { ?>
								<tr>
									<td><?= $key + 1 ?></td>
									<td><?= $value['admin_fname'] . ' ' . $value['admin_lname'] ?></td>
									<td><?= $value['admin_email'] ?></td>

									<td><?= $value['date_login'][0] == '0' ? 'No Login Data' : $this->Control_model->fullDateTime2($value['date_login'])  ?></td>
									<td><?=  $this->Control_model->fullDateTime2($value['date_add'])  ?></td>


									<td>
										<?php if ($_SESSION['role'] == '1' && $_SESSION['id'] == $value['id']) { ?>
											<a href="<?= base_url('admin.php/Admin/Detail/' . $value['id']) ?>" class="btn btn-info" style="border-radius: 5px; padding-top: 5px;"><i class="typcn typcn-clipboard"></i></button>
											<?php } elseif ($_SESSION['role'] == '0') { ?>
												<a href="<?= base_url('admin.php/Admin/Detail/' . $value['id']) ?>" class="btn btn-info" style="border-radius: 5px; padding-top: 5px;"><i class="typcn typcn-clipboard"></i></button>
												<?php } ?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--/div-->
	</div>
</div>
<!-- /Main Content -->

<!--footer-->
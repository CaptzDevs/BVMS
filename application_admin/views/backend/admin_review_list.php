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

	.td-warper {
		cursor: pointer;
		height: auto;
		max-height: 135px !important;
		overflow-y: auto;
		padding: 10px;
		border-radius: 10px;
		border: 1px dashed transparent;
	}

	.td-warper:hover {
		border: 1px dashed black;
	}

	.td-warper>* {
		pointer-events: none;
	}

	.image-warper {
		max-width: 150px;
		max-height: 250px;
		object-position: center;
		text-align: center;
		overflow: hidden;
	}

	.image-warper img {
		width: 100%;
		height: 100%;
		object-fit: contain;

	}

	/* 	.table th,
	.table td {
		border-bottom: 1px solid black;
	}
 */

	/* .table td{
		background: none;
		border: none;
	} */

	.td-image {
		display: flex;
		align-items: center;
		justify-content: center;

	}

	.articleDetail {
		display: flex;
		align-items: flex-start;
		justify-content: flex-start;
		flex-direction: column;
		padding-left: 15px;
		margin-top: 10px;
	}

	.td-warper p {
		margin-bottom: 0px;
	}


	.tag:hover {
		cursor: pointer;
		color: white;
		background: var(--blue4);
	}

	.menu-item {
		width: 100%;
		padding: 10px;
		background: var(--blue5);
		border-radius: 10px;
		color: white;
		transition: .5s;
		font-size: .8rem;
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 10px;
	}

	.menu-item:hover {
		color: white !important;
		text-decoration: none;
		filter: drop-shadow(5px 5px var(--blue7));
		transition: .5s;

	}
	.btn-create{
		width: 100%;
		height: 40px;
		background: var(--blue4);
		border-radius: 5px;
		border: none;
		color: white;


	}
</style>
<!--Main Content-->
<div class="main-content px-0 hor-content" style="margin-top: 100px !important;">


	<!--Main Content Container-->
	<div class="container">

		<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">Review List</h3>
			<ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url("/Admin/Reviews") ?>">Home</a></li>

				<li class="breadcrumb-item active" aria-current="page">Review List</li>
			</ol>
		</div>
		<!--Page Header-->
		<!-- <section class="banner">
			<img src="<?= base_url('/assets/img/svg/admin.svg') ?>" alt="">
			<div class="d-flex align-items-md-end align-items-center justify-content-center flex-column flex">
				<h2>รายชื่อบทความ</h2>
				<span><?= count($categoryName) > 0 ? "ในหมวดหมู่ " . $categoryName[0]['category_name'] : 'รายชื่อบทความทั้งหมด' ?> </span>
				<?php if (isset($_SESSION['id'])) { ?>
					<div class="menu-list mt-2">
                            <a href="<?= base_url('/Admin/Article') ?>" class=" menu-item">เพิ่มบทความใหม่</a>
                        </div>
					<?php } ?>
			</div>
		</section> -->
		<!-- Row -->
		<!-- 	<div class="row row-sm">
			<div class="col-md-12">
				<div class="card mg-b-20">
					<div class="card-body row pt-0">
						<div class="col-lg-12 col-md-12 mt-3">
							<div class="main-content-label mg-b-5">
								ค้นหา
							</div>
							<div class="form-group mg-b-0">
								<input class="form-control" name="searchArticle" id="searchArticle" placeholder="ค้นหา" required="" type="text">
							</div>

							<div class="form-group mg-b-0 mt-3">

								<div class="tags" style="margin-left: 10px;">
									<span  class="tag bg-danger text-white" id="clearSearch">X</span>

									<?php foreach ($categoryListData as $value) { ?>
									<span class="tag tag-btn" data-id="<?= $value['id'] ?>" data-value="<?= $value['category_name'] ?>"><?= $value['category_name'] ?></span>
									<?php } ?>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>


		</div> -->
		<!-- /Row -->
		<!-- Row -->
		<!--div-->

		<div class="row row-sm">
			<div class="col-md-12">
				<div class="card mg-b-20">
					<div class="card-body row pt-0">
						<div class="col-lg-12 col-md-12 mt-3">
							<a href="<?= base_url("/Admin/Review") ?>" class="form-group mg-b-0">
								<button class="btn-create">Add New Review</button>
							</a>
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="card mg-b-20">
			<div class="card-body">
				<div class="main-content-label mg-b-5">
				Review List
				</div>
				<div class="table-responsive" id="tableData">
					<table class="table text-md-nowrap" id="example13">
						<thead>
							<tr>
								<th style="width: 5%;" class="border-bottom-0">#</th>
								<th style="max-width: 80%;" class="border-bottom-0">Name</th>
								<th class="border-bottom-0">Picture</th>
								<th style="max-width : 10%;" class="border-bottom-0">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($reviewList as $key => $value) { ?>
								<tr data-id="<?= $value['id'] ?>">
									<td class="reorder">
										<?= $value['data_order'] ?>
									</td>
									<td class="reorder">
										<a href="<?= isset($_SESSION['id']) ?  base_url('/Admin/Review/') . $value['id'] : base_url('/Client/Review/') . $value['id'] ?>" style="text-align: left;">
											<h2><?= $value['review_name_eng'] ?></h2>
										</a>
									<!-- 	<?php if (strlen($value['description']) > 11) { ?>
											<div class="td-warper"><?= $value['description'] ?></div>
										<?php } ?> -->


										<div class="articleDetail">

											<!-- <span> ราคา : <?= $value['price'] ?></span>
											<span> ราคาโปรโมชั่น : <?= $value['price_pro'] ?></span> -->
											<span>Create Date : <?= $this->Control_model->fullDateNoTimeEn($value['create_date']) ?>
										</div>



									</td>
									<td class="td-image">
										<?php if ($value['image_url'] != '') { ?>
											<a target="_blank" href="<?= base_url('/uploads/image/') . $value['image_url'] ?>" class="image-warper">
												<img src="<?= base_url('/uploads/image/') . $value['image_url'] ?>" alt="">
											</a>
										<?php } ?>
									</td>



									<td class="text-center">
									<a href="<?= base_url('/Admin/Review/') . $value['id'] ?>" class="btn btn-info " style="border-radius: 5px; padding-top: 5px;">
											<i class="typcn typcn-pen"></i>
										</a>
										<a href="<?= base_url('/Admin/Review/') . $value['id'] ?>" class="btn btn-danger " style="border-radius: 5px; padding-top: 5px;">
											<i class="typcn typcn-trash"></i>
										</a>
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
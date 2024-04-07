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
	.buttons-html5{
		margin: 0px 10px;
		border-radius: 10px !important;
		padding-top: 5px !important;
	}
	.buttons-collection{
		margin: 0px 10px;
		border-radius: 10px !important;
		padding-top: 5px !important;
	}
	td{
		font-size: .7rem;
	}
	.btn-searchDate{
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
	.btn-searchDate:hover{
		color: white;
		transition: .5s;
		filter: drop-shadow(5px 5px var(--blue4));
	}

	.btn-clear{
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
	.btn-clear:hover{
		color: white;
		transition: .5s;
		filter: drop-shadow(5px 5px var(--gray-300));
	}
	.main-content{
		margin-top: 50px !important;
	}

	.banner{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            padding: 20px;
            flex-wrap: wrap;
        }
     
        .banner img{
            width: 40%;

        }
        @media (max-width: 576px) {
            .banner h1{
            font-size: 1.5rem;
        }
         }

        @media (min-width: 992px){
            .main-content {
                padding: 30px 0;
                padding-bottom: 20px;
                margin-top: 50px;
            }
        }
        
        img{
            pointer-events: none;
		}

		.eff-success{
			opacity: 50%;
		}
		.eff-reject{
			opacity: 50%;
		}
		td{
			font-size: .6rem !important;
		}
		.btn-section{
			border: 1px solid var(--blue4);
			outline: none;
			border-radius: 10px;
			cursor: pointer;
		}
		.btn-section-selected{
			color: white;
			background: var(--blue6);
		}

		#new_category_name {
			width: 90%;
			outline: none;
			border: none;
			text-align: left;
		}
	 .category-name  {
			width: 90%;
			padding: 0px 10px;
			font-size: 1.1rem;
			border: none;
			border-bottom: 1px solid black;
			outline: none;
		}
	

		.badge{
			border: none;
			padding: 10px;
			border-radius: 5px !important;
		}
		i{
			pointer-events: none;
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
	.show-data {
		background: gray !important;
		opacity: 80%;
	}
	.reorder-item {
		cursor: move;
		border-radius: 5px;
	}
	.ui-sortable-handle {
		padding-right: 20px;
	}
	.ui-sortable-handle svg{
		padding: 5px;
		border-radius: 5px;

	}

	.preview-model{
		background: #fff;
		border: none;
		border-bottom: 1px solid black;
		font-size: .8rem;
	}
	svg{
		pointer-events: none;
	}
</style>
<!--Main Content-->
<div class="main-content px-0 hor-content" style="margin-top: 100px !important;">

	<!--Main Content Container-->
	<div class="container">

		<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">Brand List</h3>
			<ol class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="<?= base_url("/Admin/Models") ?>">Home</a></li>

				<li class="breadcrumb-item active" aria-current="page">Brand List</li>
			</ol>
		</div>

		<section class="banner">
                <img src="<?= base_url('/assets/img/svg/admin.svg') ?>" alt="">
                <div class="d-flex align-items-md-end align-items-center justify-content-center flex-column flex">
                <h2>Brand List</h2>
				<span>All Brand List</span>
				<!-- <div class="menu-list mt-2">
                            <a href="<?= base_url('/Admin/Article') ?>" class=" menu-item">เพิ่มบทความใหม่</a>
                        </div> -->
                </div>
            </section>
		<!--Page Header-->

		
	
			<!-- Row -->
		
			<div class="row row-sm">
					<div class="col-md-12">
						<div class="card mg-b-20">
							<div class="card-body row pt-0">
									<div class="col-lg-1/ col-md-12 mt-3">
										<div class="main-content-label mg-b-5">
											Search Brand List 
										</div>
										<div class="form-group mg-b-0">
											<input class="form-control" name="category_search" id="category_search" placeholder="Brand List" required="" type="text"  >
										</div>
									</div>
							</div>
						</div>
					</div>
					
				</div>
						<!-- Row -->


			

		
		<!-- 	<div class="row row-sm">
					<div class="col-md-12">
						<div class="card mg-b-20">
							<div class="card-body row">
								<div class="col-6 text-center">
								<div  data-value="1" class="btn-section p-2 <?= $section == '1' ? 'btn-section-selected' : ''; ?>">ตรวจสุขภาพทั่วไป</div>
								</div>
								<div class="col-6 text-center">
								<div  data-value="2" class="btn-section p-2 <?= $section == '2' ? 'btn-section-selected' : ''; ?>">ตรวจสุขภาพบริษัทคู่สัญญา</div>

								</div>
						</div>
						<div class="row d-flex align-items-center justify-content-center p-3" style="gap: 10px;">
								<button class="btn btn-searchDate" id="btn_searchDate">Search</button>
								<button class="btn btn-clear" id="btn_clear">Clear</button>

								</div>
					</div>
					</div>
				</div> -->
				<!-- /Row -->
		<!-- Row -->
		<!--div-->
	

		<div class="card mg-b-20" style="margin-bottom: 50vh">
			<div class="card-body">
				<div class="main-content-label mg-b-5 h3 mb-3">
				Brand List <button class="preview-model">Click here to preview</button>
				</div>
				<!-- <p class="mg-b-20">Example of Nixlot File Export DataTable.</p> -->
				<div id="list_data">
					<div class="d-flex align-items-center justify-content-center">
							Fetching Data...
					</div>
				</div>

				<!-- 	<div class="table-responsive"  id="tableData">
						<table id="example13" class="table key-buttons text-md-nowrap">
							<thead>
								<tr>
									<th style="width: 5%;" class="border-bottom-0">#</th>
									<th style="width: 15%;" class="border-bottom-0">ชื่อ-นามสกุล</th>
									<th style="width: 15%;" class="border-bottom-0">วันที่นัด</th>
									<th style="width: 15%;" class="border-bottom-0">นัดเมื่อ</th>
									<th style="width: 15%;" class="border-bottom-0">ประเภทการนัด</th>
									<th style="width: 18%;" class="border-bottom-0">สถานะ</th>
									<th style="width: 25%;" class="border-bottom-0">ตรวจโดย</th>
									<th style="width: 20%;" class="border-bottom-0">รายละเอียด</th>
								</tr>
							</thead>
							<tbody>

									<tr >
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>
											
										</td>
										<td></td>
										<td> <a target="_blank" href="" class="btn btn-info" style="border-radius: 5px; padding-top: 5px;"><i class="typcn typcn-clipboard"></i></button> </td>
									</tr>

							</tbody>
						</table>
					</div> -->
			</div>
		</div>
		<!--/div-->
	</div>
</div>
<!-- /Main Content -->

<!--footer-->
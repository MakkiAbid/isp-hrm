@extends("layouts.app")

@section("title", "Dashboard")


@section("content")

	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
						<h5 class="text-white op-7 mb-2">Welcome {{ auth()->name }}!</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row mt--2">
				<div class="col-md-12">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Overall statistics</div>
							<div class="card-category">Information about users in system</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									<!-- <div id="circles-1">500</div> -->

									<div id="circles-1">
										<div class="circles-wrp" style="position: relative; display: inline-block;">


											<svg xmlns="http://www.w3.org/2000/svg" width="90" height="90">
												<path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path>

												<path fill="transparent" stroke="#FF9E27" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 20.644357636259837 78.60137921350231 " class="circles-valueStroke"></path>
											</svg>

											<div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;">4</div>

											<h6 class="fw-bold mt-3 mb-0">Total Admins</h6>


										</div>
									</div>



								</div>


							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>


	<!-- GREEN STROKE stroke="#2BB930" -->
	<!-- RED STROKE #F25961 -->

@endsection
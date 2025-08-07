@extends('layouts.app')

@section('main')

            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Create new student</h3>
								
							</div>
						</div>
					</div>
					<!-- /Page Header -->

                    
					<div class="row">
						<div class="col-md-10">
							@include('layouts.components.message')
						</div>
					</div>
                    <div class="row">
						<div class="col-xl-10 d-flex">

							

							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Add new Student</h4>
								</div>
								<div class="card-body">
									<form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Name</label>
											<div class="col-lg-9">
												<input type="text" name="name" class="form-control" autocomplete="off">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Email</label>
											<div class="col-lg-9">
												<input type="text" name="email" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Phone</label>
											<div class="col-lg-9">
												<input type="text" name="phone" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Student ID</label>
											<div class="col-lg-9">
												<input type="text" name="sid" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Address</label>
											<div class="col-lg-9">
												<input type="text" name="address" class="form-control">
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-lg-3 col-form-label">Photo</label>
											<div class="col-lg-9">
												<input type="file" name="photo" class="form-control">
											</div>
										</div>
									
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						
					</div>

                </div>
            </div>


                    

@endsection 
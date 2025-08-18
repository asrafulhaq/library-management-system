@extends('layouts.app')

@section('main')
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">All Students</h3>
								
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<a class="btn btn-primary" href="{{ route('student.create') }}">Add new Student</a>
					<br>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
						
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>#</th>
													<th>Photo</th>
													<th>Name</th>
													<th>email</th>
													<th>phone</th>
													<th>Created At</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												
												@foreach ($students as $item)
													<tr>
														<td>{{ $loop -> iteration }}</td>
														<td><img style="width:60px;height:60px;border-radius:5px;object-fit:cover;" src="{{ URL::to('media/students/' . $item -> photo) }}" alt=""></td>
														<td>{{ $item -> name }}</td>
														<td>{{ $item -> email }}</td>
														<td>{{ $item -> phone }}</td>
														<td>{{  \Carbon\Carbon::parse($item -> created_at) -> diffForHumans() }}</td>
														<td>
															<a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
															<a class="btn btn-sm btn-warning" href=""><i class="fa fa-edit"></i></a>
															<a class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a>
														</td>
													</tr>
												@endforeach
												
												
												
												
												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>			
			</div>
@endsection 
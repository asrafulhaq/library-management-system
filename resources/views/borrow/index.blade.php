@extends('layouts.app')

@section('main')
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">All Borrowing</h3>
								
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<a class="btn btn-primary" href="{{ route('borrow.search') }}">Add a new Borrow</a>
					<br>
					<br>
					<div class="row">
						<div class="col-md-12">
							@include('layouts.components.message')
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
						
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>#</th>
													<th>Student</th>
													<th>Book</th>
													<th>Status</th>
						
													<th>Issue Date</th>
													<th>Return Date</th>
													<th>CreatedAt</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												@foreach ($borrows as $item )
													<tr>
														<td>{{ $loop -> iteration  }}</td>
														<td><img style="width:60px;height:60px;border-radius:5px;object-fit:cover;"  src="{{ URL::to('media/students/' . $item -> photo) }}"> {{ $item -> name  }}</td>
													
														<td><img style="width:60px;height:60px;border-radius:5px;object-fit:cover;"  src="{{ URL::to('media/books/' . $item -> cover) }}"> {{ $item -> title  }}</td>
														<td> 
															@if ($item -> status == "pending")
																<span class="btn btn-rounded btn-warning">{{ $item -> status  }}</span>
															@elseif ($item -> status == "returned")
																<span class="btn btn-rounded btn-success">{{ $item -> status  }}</span>	
															@elseif ($item -> status == "overdue")
																<span class="btn btn-rounded btn-danger">{{ $item -> status  }}</span>	
															@endif
														</td>
														<td>{{ date( 'F d, Y',  strtotime($item -> issue_date))  }}</td>
														<td>
															@if ( ceil(\Carbon\Carbon::now() -> diffInDays( \Carbon\Carbon::parse($item -> return_date, false) )) <= 0 )
																<span class="text-danger">{{ abs(ceil(\Carbon\Carbon::now() -> diffInDays( \Carbon\Carbon::parse($item -> return_date, false) ))) }} Days Delay </span>
															@else
															{{  ceil(\Carbon\Carbon::now() -> diffInDays( \Carbon\Carbon::parse($item -> return_date, false) ))  }} Days 
																
															@endif
														
														</td>
														<td>{{ \Carbon\Carbon::parse($item -> created_at) -> diffForHumans()  }}</td>
														<td>
															
															@if ($item -> status !== "overdue" && ceil(\Carbon\Carbon::now() -> diffInDays( \Carbon\Carbon::parse($item -> return_date, false) )) <= 0 )
																<a class="btn btn-danger" href="{{  route('borrow.overdue', $item -> id)  }}"> Make Overdue </a>	
															@endif
															@if ($item -> status !== "returned")
																<a class="btn btn-success" href="{{ url("/borrow-returned/".$item -> id."/".$item -> book_id) }}"> Make Return </a>
															@endif
																
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
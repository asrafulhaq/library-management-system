@extends('layouts.app')

@section('main')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Assign Book</h3>
                    </div>
                </div>
            </div>

            <a class="btn btn-primary" href="{{ route('borrow.index') }}">Back</a>
            <br>
            <br>

            <div class="col-md-8">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="{{ URL::to('media/students/'. $student -> photo)  }}">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{ $student -> name }}</h4>
										<h6 class="text-muted">{{ $student -> email }}</h6>
										<div class="user-Location"><i class="fa fa-map-marker"></i> {{ $student -> address }}</div>
									
									</div>
									
								</div>
							</div>
							
								
								<!-- Change Password Tab -->
								
                                    @include('layouts.components.message')
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Select a Book</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form action="{{ route('borrow.store') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
															<label>Select Book</label>
															<select name="book_id" class="form-control">
                                                                @foreach ( $books as $book )
                                                                    <option value="{{ $book -> id }}">
                                                                        {{ $book -> title }}
                                                                    </option>
                                                                @endforeach
                                                                
                                                            </select>
														</div>
														<div class="form-group">
															<label>Return Date</label>
															<input type="date" name="return_date" class="form-control">
															<input type="hidden" name="student_id" value="{{ $student -> id }}" class="form-control">
														</div>

														<button class="btn btn-primary" type="submit">Create a Borrow</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								
								<!-- /Change Password Tab -->
								
							</div>
						</div>
    </div>
@endsection
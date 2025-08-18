@extends('layouts.app')

@section('main')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Search Student</h3>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="{{ route('borrow.index') }}">Back</a>
            <br>
            <br>



            <div class="row">
                <div class="col-md-8">
                    <div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Basic Form</h4>
								</div>
								<div class="card-body">
									<form action="{{ route('borrow.student') }}" method="POST">
                                        @csrf 
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Student ID / Email / Phone</label>
											<div class="col-lg-9">
												<input type="text" name="search" class="form-control">
											</div>
										</div>
									
		
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Search</button>
										</div>
									</form>
								</div>
							</div>
                </div>
            </div>


                            <div class="row">
								
                                @foreach ($students as $item )
                                    <div class="col-12 col-md-2 col-lg-2 d-flex">
									<div class="card flex-fill">
										<img alt="Card Image" src="{{ URL::to("/media/students/" . $item -> photo) }}" class="card-img-top">
										<div class="card-header">
											<h5 class="card-title mb-0">{{ $item -> name }}</h5>
										</div>
										<div class="card-body">
											
											<a class="btn btn-primary" href="{{ route('borrow.assign', $item -> id ) }}">Assign Book</a>
										</div>
									</div>
								</div>
                                @endforeach
								

								
							</div>
        </div>
    </div>
@endsection
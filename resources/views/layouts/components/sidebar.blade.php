<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="{{ Request::is('/') ? 'active' : '' }}"> 
								<a href="{{ url('/') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
					
							<li class="{{ Request::is('borrow') ? 'active' : '' }}"> 
								<a href="{{ route('borrow.index') }}"><i class="fe fe-vector"></i> <span>Borrowing</span></a>
							</li>

                            <li> 
								<a href="components.html"><i class="fe fe-vector"></i> <span>Reservation</span></a>
							</li>
							<li class="submenu ">
								<a href="#" class="{{ Request::is('student') || Request::is('student/create')  ? 'active ' : '' }}"><i class="fe fe-layout"></i> <span> Students </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('student') ? 'link-active' : '' }}" href="{{ route('student.index') }}">All Students</a></li>
									<li><a class="{{ Request::is('student/create') ? 'link-active' : '' }}" href="{{ route('student.create') }}">Add new Student </a></li>

								</ul>
							</li>

                            <li class="submenu">
								<a href="#" class="{{ Request::is('books') || Request::is('books/create') ? 'active' : ""  }}"><i class="fe fe-layout"></i> <span> Books </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('books') ? 'link-active' : '' }}" href="{{ route('books.index') }}">All Books</a></li>
									<li><a class="{{ Request::is('books/create') ? 'link-active' : '' }}" href="{{ route('books.create') }}">Add new Book </a></li>

								</ul>
							</li>
						
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
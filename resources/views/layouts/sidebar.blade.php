<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="sidebar">
        <nav class="sidebar">
            <div class="sidecontainer">
               <div class = "sidebar-contents">
					@guest
					@else
						@if(Auth::user()->profile->access_level_id == 3)
							@if(Request::path() == 'admin/users')
								<ul class = "sidebar-items">
									<li id = "users"><a class = "sidebar-link active">{{'Users'}}</a></li>
									<li id = "chart"><a class = "sidebar-link" href = "#">{{'Chart of Accounts'}}</a></li>
									<li id = "database"><a class = "sidebar-link" href = "#">{{'Database'}}</a></li>
									<div class = "sidebarDrop">
										<li><a class = "sidebarDropDown sidebar-link" href = "#">{{'Logs'}}</a></li>
										<div class = "sidebarDropDown-menu">
											<a class = "sidebarDropDown-item" href = "{{ route('event-log') }}">{{'Event Reports'}}</a>
											<a class = "sidebarDropDown-item" href = "{{ route('login-log') }}">{{'Login Statistics'}}</a>
											<a class = "sidebarDropDown-item" href = "#">{{'User Reports'}}</a>
										</div> 
									</div>
								</ul>
								
							@elseif(Request::path() == 'admin/log')
								<ul class = "sidebar-items">
									<li id = "users"><a class = "sidebar-link" href  = "{{ route('users') }}">{{'Users'}}</a></li>
									<li id = "chart"><a class = "sidebar-link" href = "#">{{'Chart of Accounts'}}</a></li>
									<li id = "database"><a class = "sidebar-link" href = "#">{{'Database'}}</a></li>
									<div class = "sidebarDrop bypass">
										<li><a class = "sidebarDropDown sidebar-link visible" href = "#">{{'Logs'}}</a></li>
										<div class = "sidebarDropDown-menu">
											<a class = "sidebarDropDown-item" href = "{{ route('event-log') }}">{{'Event Reports'}}</a>
											<a class = "sidebarDropDown-item active">{{'Login Statistics'}}</a>
											<a class = "sidebarDropDown-item" href = "#">{{'User Reports'}}</a>
										</div> 
									</div>
								</ul>
							@elseif(Request::path() == 'admin/eventlog')
								<ul class = "sidebar-items">
									<li id = "users"><a class = "sidebar-link" href  = "{{ route('users') }}">{{'Users'}}</a></li>
									<li id = "chart"><a class = "sidebar-link" href = "#">{{'Chart of Accounts'}}</a></li>
									<li id = "database"><a class = "sidebar-link" href = "#">{{'Database'}}</a></li>
									<div class = "sidebarDrop bypass">
										<li><a class = "sidebarDropDown sidebar-link visible" href = "#">{{'Logs'}}</a></li>
										<div class = "sidebarDropDown-menu">
											<a class = "sidebarDropDown-item active">{{'Event Reports'}}</a>
											<a class = "sidebarDropDown-item" href = "{{ route('login-log')}}">{{'Login Statistics'}}</a>
											<a class = "sidebarDropDown-item" href = "#">{{'User Reports'}}</a>
										</div> 
									</div>
								</ul>
							@else
								<ul class = "sidebar-items">
									<li id = "users"><a class = "sidebar-link" href  = "{{ route('users') }}">{{'Users'}}</a></li>
									<li id = "chart"><a class = "sidebar-link" href = "#">{{'Chart of Accounts'}}</a></li>
									<li id = "database"><a class = "sidebar-link" href = "#">{{'Database'}}</a></li>
									<div class = "sidebarDrop">
										<li><a class = "sidebarDropDown sidebar-link" href = "#">{{'Logs'}}</a></li>
										<div class = "sidebarDropDown-menu">
											<a class = "sidebarDropDown-item" href = "{{ route('event-log') }}">{{'Event Reports'}}</a>
											<a class = "sidebarDropDown-item" href = "{{ route('login-log') }}">{{'Login Statistics'}}</a>
											<a class = "sidebarDropDown-item" href = "#">{{'User Reports'}}</a>
										</div> 
									</div>
								</ul>
							@endif
						@endif
					@endguest
				</div>
            </div>
        </nav>


    </div>
</body>
</html>

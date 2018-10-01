<div id="sidebar">
    <nav class="sidebar">
        <div class="sidecontainer">
            <div class="sidebar-contents">
                
                <ul class="sidebar-items">
				@if(Auth::user()->profile->access_level_id == 3)
                    <li id="users">
                        <a href="{{action('Admin\UserController@showUsers')}}" class="sidebar-link {{ starts_with($path, 'admin/users') ? 'active' : ''}}">
							{{'Users'}}
						</a>
					</li>
				@endif
                    <li id="chart"><a class="sidebar-link {{ starts_with($path, 'accounts') ? 'active' : ''}}" href="{{action('Accounts\ChartOfAccounts@showAccounts')}}">{{'Chart
                            of Accounts'}}</a></li>
                    <li id="database"><a class="sidebar-link {{ starts_with($path, 'database') ? 'active' : ''}}" href="#">{{'Database'}}</a></li>
                    <div class="sidebarDrop {{ starts_with($path, 'logs') ? 'bypass' : ''}}">
                        <li><a class="sidebarDropDown sidebar-link {{ starts_with($path, 'logs') ? 'visible' : ''}}" href="#">{{'Logs'}}</a></li>
                        <div class="sidebarDropDown-menu">
                            <a class="sidebarDropDown-item {{ starts_with($path, 'logs/eventlog') ? 'active' : ''}}" href="{{ route('event-log') }}">{{'Event Reports'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'logs/log') ? 'active' : ''}}" href="{{ route('login-log') }}">{{'Login Statistics'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'logs/users') ? 'active' : ''}}" href="#">{{'User Reports'}}</a>
                        </div>
                    </div>
                </ul>

                
            </div>
        </div>
    </nav>


</div>

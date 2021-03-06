<div id="sidebar">
    <nav class="sidebar">
        <div class="sidecontainer">
            <div class="sidebar-contents">
                
                <ul class="sidebar-items">
				@if( Auth::user()->profile->access_level_id == 3)
                    <li id="users">
                        <a href="{{action('Admin\UserController@showUsers')}}" class="sidebar-link {{ starts_with($path, 'admin/users') ? 'active' : ''}}">
							{{'Users'}}
						</a>
					</li>
                    <li id="chart"><a class="sidebar-link {{ starts_with($path, 'accounts') ? 'active' : ''}}" href="{{action('Accounts\ChartOfAccounts@showAccounts')}}">{{'Chart
                            of Accounts'}}</a></li>
                    <div class="sidebarDrop {{ starts_with($path, 'logs') ? 'bypass' : ''}}">
                        <li><a class="sidebarDropDown sidebar-link {{ starts_with($path, 'logs') ? 'visible' : ''}}" href="#">{{'Logs'}}</a></li>
                        <div class="sidebarDropDown-menu">
                            <a class="sidebarDropDown-item {{ starts_with($path, 'logs/eventlog') ? 'active' : ''}}" href="{{ route('event-log') }}">{{'Event Reports'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'logs/log') ? 'active' : ''}}" href="{{ route('login-log') }}">{{'Login Statistics'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'logs/users') ? 'active' : ''}}" href="{{ route('user-log') }}">{{'User Reports'}}</a>
                        </div>
                    </div>
				@elseif( Auth::user()->profile->access_level_id == 2)
                        <li id="dashboard"><a class="sidebar-link {{ starts_with($path, 'dashboard') ? 'active' : ''}}" href="{{action('RatioController@index')}}">{{'Dashboard'}}</a></li>
                    <div class="sidebarDrop {{ starts_with($path, 'journal') ? 'bypass' : ''}}">
                        <li><a class="sidebarDropDown sidebar-link {{ starts_with($path, 'journal') ? 'visible' : ''}}" href="#">{{'Journal'}}</a></li>
                        <div class="sidebarDropDown-menu">
                            <a class="sidebarDropDown-item {{ starts_with($path, 'journal/journalize') ? 'active' : ''}}" href="{{action('JournalController@index')}}">{{'Journalize'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'journal/status') ? 'active' : ''}}" href="/journal/approval">{{'Status'}}</a>
                        </div>
                    </div>
                        <li id="ledger"><a class="sidebar-link {{ starts_with($path, 'ledger') ? 'active' : ''}}" href="{{action('LedgerController@showAccounts')}}">{{'Ledgers'}}</a></li>
                    <div class="sidebarDrop {{ starts_with($path, 'trial') ? 'bypass' : ''}}">
                        <li><a class="sidebarDropDown sidebar-link {{ starts_with($path, 'trial') ? 'visible' : ''}}" href="#">{{'Trial Balance'}}</a></li>
                        <div class="sidebarDropDown-menu">
                            <a class="sidebarDropDown-item {{ starts_with($path, 'trial/unadjusted') ? 'active' : ''}}" href="{{action('TrialBalanceController@unadjusted')}}">{{'Unadjusted'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'trial/adjusted') ? 'active' : ''}}" href="{{action('TrialBalanceController@adjusted')}}">{{'Adjusted'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'trial/closing') ? 'active' : ''}}" href="{{action('TrialBalanceController@closing')}}">{{'Post-Closing'}}</a>
                        </div>
                    </div>
                    <div class="sidebarDrop {{ starts_with($path, 'statements') ? 'bypass' : ''}}">
                        <li><a class="sidebarDropDown sidebar-link {{ starts_with($path, 'statements') ? 'visible' : ''}}" href="#">{{'Financial Statements'}}</a></li>
                        <div class="sidebarDropDown-menu">
                            <a class="sidebarDropDown-item {{ starts_with($path, 'statements/income') ? 'active' : ''}}" href="{{action('FinancialStatementsController@incomeStatement')}}">{{'Income Statement'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'statements/balance') ? 'active' : ''}}" href="{{action('FinancialStatementsController@balanceSheet')}}">{{'Balance Sheet'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'statements/retained') ? 'active' : ''}}" href="{{action('FinancialStatementsController@retainedEarnings')}}">{{'Retained Earnings'}}</a>
                        </div>
                    </div>
                        <li id ="event"><a class="sidebar-link {{ starts_with($path, 'logs/eventlog') ? 'active' : ''}}" href="{{ route('event-log') }}">{{'Event Reports'}}</a></li>
				@elseif( Auth::user()->profile->access_level_id == 1)
						<li id="dashboard"><a class="sidebar-link {{ starts_with($path, 'dashboard') ? 'active' : ''}}" href="{{action('RatioController@index')}}">{{'Dashboard'}}</a></li>
                        <li id="journal"><a class="sidebar-link {{ starts_with($path, 'journal/journalize') ? 'active' : ''}}" href="{{action('JournalController@index')}}">{{'Journalize'}}</a></li>
                        <li id="ledger"><a class="sidebar-link {{ starts_with($path, 'ledger') ? 'active' : ''}}" href="{{action('LedgerController@showAccounts')}}">{{'Ledgers'}}</a></li>
                    <div class="sidebarDrop {{ starts_with($path, 'trial') ? 'bypass' : ''}}">
                        <li><a class="sidebarDropDown sidebar-link {{ starts_with($path, 'trial') ? 'visible' : ''}}" href="#">{{'Trial Balance'}}</a></li>
                        <div class="sidebarDropDown-menu">
                            <a class="sidebarDropDown-item {{ starts_with($path, 'trial/unadjusted') ? 'active' : ''}}" href="{{action('TrialBalanceController@unadjusted')}}">{{'Unadjusted'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'trial/adjusted') ? 'active' : ''}}" href="{{action('TrialBalanceController@adjusted')}}">{{'Adjusted'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'trial/closing') ? 'active' : ''}}" href="{{action('TrialBalanceController@closing')}}">{{'Post-Closing'}}</a>
                        </div>
                    </div>
                    <div class="sidebarDrop {{ starts_with($path, 'statements') ? 'bypass' : ''}}">
                        <li><a class="sidebarDropDown sidebar-link {{ starts_with($path, 'statements') ? 'visible' : ''}}" href="#">{{'Financial Statements'}}</a></li>
                        <div class="sidebarDropDown-menu">
                            <a class="sidebarDropDown-item {{ starts_with($path, 'statements/income') ? 'active' : ''}}" href="{{action('FinancialStatementsController@incomeStatement')}}">{{'Income Statement'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'statements/balance') ? 'active' : ''}}" href="{{action('FinancialStatementsController@balanceSheet')}}">{{'Balance Sheet'}}</a>
                            <a class="sidebarDropDown-item {{ starts_with($path, 'statements/retained') ? 'active' : ''}}" href="{{action('FinancialStatementsController@retainedEarnings')}}">{{'Retained Earnings'}}</a>
                        </div>
                    </div>
					<li id ="event"><a class="sidebar-link {{ starts_with($path, 'logs/eventlog') ? 'active' : ''}}" href="{{ route('event-log') }}">{{'Event Reports'}}</a></li>
				@endif
                </ul>

                
            </div>
        </div>
    </nav>


</div>

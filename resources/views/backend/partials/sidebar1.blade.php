<ul class="metismenu" id="menu">
    <li>
        <a href="{{ route('dashboard') }}">
            <div class="parent-icon"><i class='bx bx-home-alt'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li>
        <a href="{{ route('customers.index') }}">
            <div class="parent-icon"><i class='bx bx-user'></i>
            </div>
            <div class="menu-title">Customers</div>
        </a>
    </li>
    <li>
        <a href="javascript:void(0);" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-detail'></i>
            </div>
            <div class="menu-title">Sales</div>
        </a>
        <ul>
            <li>
                <a href="{{ route('sales.proposals') }}"><i class='bx bx-radio-circle'></i>Proposals</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Estimates</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Invoices</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Payments</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Credit Notes</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Items</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <div class="parent-icon"><i class='bx bx-refresh'></i>
            </div>
            <div class="menu-title">Subscriptions</div>
        </a>
    </li>
    <li>
        <a href="#">
            <div class="parent-icon"><i class='bx bx-file'></i>
            </div>
            <div class="menu-title">Expanses</div>
        </a>
    </li>
    <li>
        <a href="#">
            <div class="parent-icon"><i class='bx bxs-file-export'></i>
            </div>
            <div class="menu-title">Contracts</div>
        </a>
    </li>
    <li>
        <a href="#">
            <div class="parent-icon"><i class='bx bx-trending-up'></i>
            </div>
            <div class="menu-title">Projects</div>
        </a>
    </li>
    <li>
        <a href="#">
            <div class="parent-icon"><i class='bx bx-check-circle'></i>
            </div>
            <div class="menu-title">Task</div>
        </a>
    </li>
    <li>
        <a href="#">
            <div class="parent-icon"><i class='bx bx-support'></i>
            </div>
            <div class="menu-title">Support</div>
        </a>
    </li>
    <li>
        <a href="#">
            <div class="parent-icon"><i class='bx bxs-crown'></i>
            </div>
            <div class="menu-title">Leads</div>
        </a>
    </li>
    <li>
        <a href="#">
            <div class="parent-icon"><i class='bx bx-file-blank'></i>
            </div>
            <div class="menu-title">Estimate Request</div>
        </a>
    </li>
    <li>
        <a href="#">
            <div class="parent-icon"><i class='bx bx-folder'></i>
            </div>
            <div class="menu-title">Knowoledge Base</div>
        </a>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cog'></i>
            </div>
            <div class="menu-title">Utilites</div>
        </a>
        <ul>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Media</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Bulk PDF Exoport</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>CSV Export</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Calender</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Announcements</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Goals</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Activity Log</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Surveys</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Database Backup</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Ticket Pipe Log</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bxs-report'></i>
            </div>
            <div class="menu-title">Reports</div>
        </a>
        <ul>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Sales</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Expenses</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Expenses vs Income</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Leads</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Timesheets overview</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>KB Articles</a>
            </li>

        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bxs-layer'></i>
            </div>
            <div class="menu-title">Setups</div>
        </a>
        <ul>
            <li>
                <a href="{{ route('setup.staff.index') }}">
                    <i class='bx bx-radio-circle'></i>
                    Staff
                </a>
            </li>
            <li class="javascript:void(0)">
                <a class="has-arrow" href="javascript:;" aria-expanded="false">
                    <i class="bx bx-radio-circle"></i>Customers
                </a>
                <ul class="mm-collapse" style="height: 0px;">
                    <li>
                        <a href="{{ route('setup.customer.index') }}"><i class="bx bx-radio-circle"></i>Groups</a>
                    </li>
                </ul>
            </li>
            <li class="javascript:void(0)">
                <a class="has-arrow" href="javascript:;" aria-expanded="false">
                    <i class="bx bx-radio-circle"></i>Support
                </a>
                <ul class="mm-collapse" style="height: 0px;">
                    <li>
                        <a href="{{ route('support.department.index') }}"><i
                                class="bx bx-radio-circle"></i>Department</a>
                    </li>
                    <li>
                        <a href="{{ route('support.pre_reply.index') }}"><i class="bx bx-radio-circle"></i>Predifined
                            Replies</a>
                    </li>
                    <li>
                        <a href="{{ route('support.ticket_priority.index') }}"><i
                                class="bx bx-radio-circle"></i>Ticket Priority</a>
                    </li>
                    <li>
                        <a href="{{ route('support.ticket_status.index') }}"><i class="bx bx-radio-circle"></i>Ticket
                            Statuses</a>
                    </li>
                    <li>
                        <a href="{{ route('support.services.index') }}"><i class="bx bx-radio-circle"></i>Services</a>
                    </li>
                    <li>
                        <a href="{{ route('support.spam_filter.index') }}"><i class="bx bx-radio-circle"></i>Spam
                            Filters</a>
                    </li>
                </ul>
            </li>
            <li class="javascript:void(0)">
                <a class="has-arrow" href="javascript:;" aria-expanded="false">
                    <i class="bx bx-radio-circle"></i>Leads
                </a>
                <ul class="mm-collapse" style="height: 0px;">
                    <li>
                        <a href="{{ route('setup.leads.sources.index') }}"><i
                                class="bx bx-radio-circle"></i>Sources</a>
                    </li>
                    <li>
                        <a href="{{ route('setup.leads.statuses.index') }}"><i
                                class="bx bx-radio-circle"></i>Statuses</a>
                    </li>
                    <li>
                        <a href="{{ route('setup.leads.emailIntegration.index') }}"><i
                                class="bx bx-radio-circle"></i>Email Integration</a>
                    </li>
                    <li>
                        <a href="{{ route('setup.leads.webtolead.index') }}"><i class="bx bx-radio-circle"></i>Web to
                            Lead</a>
                    </li>
                </ul>
            </li>
            <li class="javascript:void(0)">
                <a class="has-arrow" href="javascript:;" aria-expanded="false">
                    <i class="bx bx-radio-circle"></i>Finance
                </a>
                <ul class="mm-collapse" style="height: 0px;">
                    <li>
                        <a href="{{ route('setup.taxes.index') }}"><i class="bx bx-radio-circle"></i>Tax Rates</a>
                    </li>
                    <li>
                        <a href="{{ route('setup.currencies.index') }}"><i
                                class="bx bx-radio-circle"></i>Currencies</a>
                    </li>
                    <li>
                        <a href="{{ route('setup.payment.mode.index') }}"><i class="bx bx-radio-circle"></i>Payment
                            Modes</a>
                    </li>
                    <li>
                        <a href="{{ route('setup.expenses.categories.index') }}"><i
                                class="bx bx-radio-circle"></i>Expenses Categories</a>
                    </li>
                </ul>
            </li>

            <li class="javascript:void(0)">
                <a class="has-arrow" href="javascript:;" aria-expanded="false">
                    <i class="bx bx-radio-circle"></i>Contracts
                </a>
                <ul class="mm-collapse" style="height: 0px;">
                    <li><a href="{{ route('setup.contract.index') }}"><i class="bx bx-radio-circle"></i>Contracts
                            Type</a>
                    </li>
                </ul>
            </li>

            <li class="javascript:void(0)">
                <a class="has-arrow" href="javascript:;" aria-expanded="false">
                    <i class="bx bx-radio-circle"></i>Estimate Request
                </a>
                <ul class="mm-collapse" style="height: 0px;">
                    <li>
                        <a href="{{ route('setup.estimate_request.forms.index') }}"><i
                                class="bx bx-radio-circle"></i>Forms</a>
                    </li>
                    <li>
                        <a href="{{ route('setup.estimate_request.statuses.index') }}"><i
                                class="bx bx-radio-circle"></i>Statuses</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('setup.email_templates.index') }}"><i class='bx bx-radio-circle'></i>Email
                    Templates</a>
            </li>
            <li>
                <a href="{{ route('setup.modules.index') }}"><i class='bx bx-radio-circle'></i>Modules</a>
            </li>
            <li>
                <a href="{{ route('setup.custom-fields.index') }}"><i class='bx bx-radio-circle'></i>Custom
                    Fields</a>
            </li>
            <li>
                <a href="{{ route('setup.gdpr.general') }}"><i class='bx bx-radio-circle'></i>GDRP</a>
            </li>
            <li>
                <a href="{{ route('roles.index') }}"><i class='bx bx-radio-circle'></i>Roles</a>
            </li>
            <li class="javascript:void(0)">
                <a class="has-arrow" href="javascript:;" aria-expanded="false">
                    <i class="bx bx-radio-circle"></i>Menu Setup
                </a>
                <ul class="mm-collapse" style="height: 0px;">
                    <li>
                        <a href="{{ route('setup.menu_setup.main_menu') }}"><i class="bx bx-radio-circle"></i>Main Menu</a>
                    </li>
                    <li>
                        <a href="{{ route('setup.menu_setup.setup_menu') }}"><i class="bx bx-radio-circle"></i>Setup Menu</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('setup.theme.index') }}"><i class='bx bx-radio-circle'></i>Theme Style</a>
            </li>
            <li>
                <a href="{{ route('settings.index') }}"><i class='bx bx-radio-circle'></i>Setting</a>
            </li>
            <li>
                <a href="#"><i class='bx bx-radio-circle'></i>Help</a>
            </li>
        </ul>
    </li>
</ul>

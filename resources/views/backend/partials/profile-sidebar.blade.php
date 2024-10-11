<ul class="list-group" style="border-radius: 20px">
    <a href="{{ route('customers.profile', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile') ? 'active' : '' }}">
            <i class='bx bxs-user-circle align-middle fs-5'></i> Profile
        </li>
    </a>
    <a href="{{ route('customers.profile.contact', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.contact') ? 'active' : '' }}">
            <i class='bx bxs-user align-middle fs-5'></i> Contact
        </li>
    </a>
    <a href="{{ route('customers.profile.notes', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.notes') ? 'active' : '' }}">
            <i class='bx bx-file-blank align-middle fs-5'></i> Notes
        </li>
    </a>
    <a href="{{ route('customers.profile.statements', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.statements') ? 'active' : '' }}">
            <i class='bx bx-image-alt align-middle fs-5'></i> Statements
        </li>
    </a>
    <a href="{{ route('customers.profile.invoice', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.invoice') ? 'active' : '' }}">
            <i class='bx bx-notepad align-middle fs-5'></i> Invoices
        </li>
    </a>
    <a href="{{ route('customers.profile.payment', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.payment') ? 'active' : '' }}">
            <i class='bx bx-trending-up align-middle fs-5'></i> Payments
        </li>
    </a>
    <a href="{{ route('customers.profile.proposal', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.proposal') ? 'active' : '' }}">
            <i class='bx bxs-parking align-middle fs-5'></i> Proposals
        </li>
    </a>
    <a href="{{ route('customers.profile.creditnote', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.creditnote') ? 'active' : '' }}">
            <i class='bx bx-notepad align-middle fs-5'></i> Credit Notes
        </li>
    </a>
    <a href="{{ route('customers.profile.estimates', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.estimates') ? 'active' : '' }}">
            <i class='bx bx-file-blank align-middle fs-5'></i> Estimates
        </li>
    </a>
    <a href="{{ route('customers.profile.subcriptions', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.subcriptions') ? 'active' : '' }}">
            <i class='bx bx-refresh align-middle fs-5'></i> Subscriptions
        </li>
    </a>
    <a href="{{ route('customers.profile.expenses', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.expenses') ? 'active' : '' }}">
            <i class='bx bx-file align-middle fs-5'></i> Expenses
        </li>
    </a>

    <a href="{{ route('customers.profile.contracts', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.contracts') ? 'active' : '' }}">
            <i class='bx bxs-file-blank align-middle fs-5'></i> Contracts
        </li>
    </a>
    <a href="{{ route('customers.profile.projects', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.projects') ? 'active' : '' }}">
            <i class='bx bx-credit-card-front align-middle fs-5'></i> Projects
        </li>
    </a>
    <a href="{{ route('customers.profile.tickets', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.tickets') ? 'active' : '' }}">
            <i class='bx bx-mail-send align-middle fs-5'></i> Tickets
        </li>
    </a>
    <a href="{{ route('customers.profile.file', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.file') ? 'active' : '' }}">
            <i class='bx bx-shekel align-middle fs-5'></i> Files
        </li>
    </a>
    <a href="{{ route('customers.profile.task', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.task') ? 'active' : '' }}">
            <i class='bx bx-task align-middle fs-5'></i> Tasks
        </li>
    </a>
    <a href="{{ route('customers.profile.vaults', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.vaults') ? 'active' : '' }}">
            <i class='bx bxs-lock-alt align-middle fs-5'></i> Vault
        </li>
    </a>
    <a href="{{ route('customers.profile.reminders', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.reminders') ? 'active' : '' }}">
            <i class='bx bx-time-five align-middle fs-5'></i> Reminders
        </li>
    </a>
    <a href="{{ route('customers.profile.map.index', $customer->id) }}">
        <li class="list-group-item {{ request()->routeIs('customers.profile.map.index') ? 'active' : '' }}">
            <i class='bx bx-map align-middle fs-5'></i> Map
        </li>
    </a>
</ul>

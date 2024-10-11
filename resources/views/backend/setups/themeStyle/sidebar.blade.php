<style>
    .list-group-item:hover {
        background-color: #f0f0f0;
        cursor: pointer;
    }

    .list-group-item.active {
        background-color: #007bff;
        color: #fff;
    }

    .list-group-item.active:hover {
        background-color: #007bff;
    }
</style>

<div>
    <ul class="list-group" style="border-radius: 20px">
        <a href="{{ route('setup.theme.index') }}">
            <li class="list-group-item">
                Admin Area
            </li>
        </a>
        <a href="{{ route('setup.theme.customersArea') }}">
            <li class="list-group-item">
                Customers Area
            </li>
        </a>
        <a href="{{ route('setup.theme.buttons') }}">
            <li class="list-group-item">
                Buttons
            </li>
        </a>
        <a href="{{ route('setup.theme.tabs') }}">
            <li class="list-group-item">
                Tabs
            </li>
        </a>
        <a href="{{ route('setup.theme.modals') }}">
            <li class="list-group-item">
                Modals
            </li>
        </a>
        <a href="{{ route('setup.theme.general') }}">
            <li class="list-group-item">
                General
            </li>
        </a>
        <a href="{{ route('setup.theme.custom') }}">
            <li class="list-group-item">
                Custom CSS
            </li>
        </a>
    </ul>
</div>

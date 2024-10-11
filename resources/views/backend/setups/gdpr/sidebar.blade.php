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
        <a href="{{ route('setup.gdpr.general') }}">
            <li class="list-group-item">
                General
            </li>
        </a>
        <a href="{{ route('setup.gdpr.right_to_data_portability') }}">
            <li class="list-group-item">
                Right to data portability
            </li>
        </a>
        <a href="{{ route('setup.gdpr.right_to_erasure') }}">
            <li class="list-group-item">
                Right to erasure
            </li>
        </a>
        <a href="{{ route('setup.gdpr.right_to_be_informed') }}">
            <li class="list-group-item">
                Right to be informed
            </li>
        </a>
        <a href="{{ route('setup.gdpr.right_of_access') }}">
            <li class="list-group-item">
                Right of access/Right to rectification
            </li>
        </a>
        <a href="{{ route('setup.gdpr.consent') }}">
            <li class="list-group-item">
                Consent
            </li>
        </a>
    </ul>    
</div>


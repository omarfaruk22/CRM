@extends('backend.layouts.main')
@section('title', 'Project Details')
@section('content')



    @include('backend.sales.items.salesItemmodal')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Sales Items</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Sales Items View</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <!-- Button trigger modal -->




    <div class="row">

        <div class="d-flex justify-content-between">
            <div class="rightclassbtn">
                <a href="#" class="btn btn-primary me-2 mb-3" data-bs-toggle="modal"
                    data-bs-target="#addItemModalmain">
                    <i class="bx bx-plus"></i> New Item
                </a>
                <a href="{{ route('sales.importsalesitem') }}" class="btn btn-primary me-2 mb-3">
                    <i class='bx bx-reply-all'></i> Import Item
                </a>
                <a href="#" class="btn btn-outline-secondary me-2 mb-3" data-bs-toggle="modal"
                    data-bs-target="#salesgroupItemModal">
                    <i class='bx bx-upload'></i> Group
                </a>


            </div>




            <div class="leftclassbtn">
                <a href="#" id="supportButton" class="btn btn-outline-dark me-2 mb-3" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="Toggle Table">
                    <i class='bx bx-left-arrow-alt'></i>
                </a>


                <button type="button" class="btn btn-outline-dark btn-sm mb-3" id="toggleBtn" onclick="toggleDiv()"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter By">
                    <i class="bx bx-filter-alt m-0"></i>
                </button>
                <div id="toggleDiv" class="card" style="display: none; z-index: 9999;">
                    <div class="card-body">
                        <div><a href="#">New Filter</a></div>
                        <p class="card-text">No saved filters, get started by creating a new filter.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <livewire:backend.sales.item.itemtable />




@endsection

@push('js')
    {{-- add item currency switch  --}}
    <script>
        const rateCheckboxes = document.querySelectorAll('.rateCheckbox');
        const rateUSDInput = document.getElementById('rateUSD');
        const rateEURInput = document.getElementById('rateEUR');

        rateCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    // Disable all checkboxes except the current one
                    rateCheckboxes.forEach(cb => {
                        if (cb !== this) {
                            cb.disabled = true;
                        }
                    });

                    // Enable/disable input fields based on the checkbox selection
                    if (this.value === 'USD') {
                        rateUSDInput.disabled = false;
                        rateEURInput.disabled = true;
                    } else if (this.value === 'EUR') {
                        rateEURInput.disabled = false;
                        rateUSDInput.disabled = true;
                    }
                } else {
                    // Enable all checkboxes and input fields when no checkbox is selected
                    rateCheckboxes.forEach(cb => {
                        cb.disabled = false;
                    });
                    rateUSDInput.disabled = false;
                    rateEURInput.disabled = false;
                }
            });
        });

        window.addEventListener('load', function() {
            const checkedCheckbox = document.querySelector('.rateCheckbox:checked');
            if (checkedCheckbox) {
                checkedCheckbox.dispatchEvent(new Event('change'));
            }
        });
    </script>
    {{-- Text editor  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });
    </script>




    {{-- Tooltips start  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                tooltipTriggerEl.addEventListener('click', function() {
                    var tooltip = bootstrap.Tooltip.getInstance(tooltipTriggerEl);
                    tooltip.dispose();
                });
            });
        });
    </script>

    <script>
        function toggleDiv() {
            var div = document.getElementById('toggleDiv');
            if (div.style.display === 'none') {
                div.style.display = 'block';
            } else {
                div.style.display = 'none';
            }
        }
    </script>
    {{-- Tooltips end  --}}
@endpush

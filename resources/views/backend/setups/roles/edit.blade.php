@extends('backend.layouts.main');

@section('title', 'Edit Roles')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="role" class="form-label">Role</label><br>
                    <input type="text" name="name" class="form-control" placeholder="Role Name" value="{{ old('name', $role->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
    
                <div class="col-md-12 mb-3">
                    <label for="permissions" class="form-label">Permissions</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="select-all">
                        <label class="form-check-label mt-1" for="select-all">Select All</label>
                    </div>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Features</th>
                                <th scope="col">Capabilities</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groupedPermissions->chunk(1) as $chunks)
                            <tr>
                                @foreach ($chunks as $prefix => $permissions)
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input prefix-checkbox" type="checkbox" id="prefix-checkbox-{{$prefix}}" data-prefix="{{$prefix}}">
                                        <label class="form-check-label mt-1" for="prefix-checkbox-{{$prefix}}">{{ ucwords($prefix) }}</label>
                                    </div>
                                </td>
                                <td class="permission">
                                    @foreach($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input permission-checkbox" type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="permission-checkbox-{{ $permission->id }}" data-prefix="{{$prefix}}">
                                        <label class="form-check-label mt-1" for="permission-checkbox-{{ $permission->id }}">{{ ucwords($permission->name) }}</label>
                                    </div>
                                    @endforeach
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
                
                <div class="col-md-12 d-flex justify-content-end gap-3">
                    <button type="submit" class="btn btn-primary px-2">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('.prefix-checkbox').change(function() {
            var prefix = $(this).data('prefix');
            $('.permission-checkbox[data-prefix="' + prefix + '"]').prop('checked', $(this).prop('checked'));
        });
    });

    $('#select-all').change(function() {
        $('.permission-checkbox').prop('checked', $(this).prop('checked'));
        $('.prefix-checkbox').prop('checked', $(this).prop('checked'));
    });
</script>
@endpush
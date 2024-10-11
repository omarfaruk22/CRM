@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">Tag</h4>

            {{-- successfull message start --}}
            @if (session('group'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Weldone!</strong> {{ session('group') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- successfull message end --}}

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.tag.update') }}" method="post">
                        @csrf
                        @method('PUT')

                        @if ($tags->isNotEmpty())
                            @foreach ($tags as $tag)
                                <div class=" rounded text-center">
                                    <div class="input-group mb-3"> <span
                                            class="input-group-text">{{ $tag->tagtable->count() }}</span>
                                        <input type="text" class="form-control" name="tags[{{ $tag->id }}]"
                                            value="{{ $tag->tags }}">
                                        <a href="javascript:void(0)" data-bs-target='#delete{{ $tag->id }}'
                                            data-bs-toggle="modal"><span class="input-group-text bg-danger"><i
                                                    class='bx bx-x'></i></span></a>
                                    </div>
                                </div>

                                <!-- delete Modal -->
                                <div class="modal fade" id="delete{{ $tag->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation Message
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure want to delete this Tag?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('settings.tag.delete', $tag->id) }}"
                                                    class="btn btn-danger">Confirm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="border rounded text-center">
                                <p class="mt-3">No tags used by the system</p>
                            </div>
                        @endif

                        <div class="col-md-12 mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

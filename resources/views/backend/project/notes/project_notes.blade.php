@extends('backend.project.project_view')
@section('project_content')
    <h5 class="py-2">personal Notes</h5>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <textarea class="form-control" name="note" id="note" cols="20" rows="8"></textarea>
                </div>
                <div class="col-md-12 text-end py-2">
                    <a href="#"class="btn btn-primary text-end">Save</a>
                </div>
            </div>


        </div>
    </div>
@endsection

@extends('backend.project.project_view')
@section('project_content')
    <livewire:backend.project.project-discussion :mainproject_id="$projects->id">
    @endsection

@extends('backend.project.project_view')
@section('project_content')
    <livewire:backend.project.projectmilestone :mainproject_id="$projects->id">
    @endsection

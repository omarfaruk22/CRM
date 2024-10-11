@extends('backend.layouts.main')
@section('title', 'Leads')
@section('content')

    <livewire:backend.leads.lead />


@endsection
<script>
    var avc = window.location.href;
    var parts = avc.split('/');
    var lastPart = parts[parts.length - 1];
    console.log(lastPart);
</script>

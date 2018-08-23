@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
    <div class="row">
        <div class="col-sm-8 py-5">

                <sau-counters></sau-counters>



        </div>
    </div>
@endsection
@push('scripts')

@endpush
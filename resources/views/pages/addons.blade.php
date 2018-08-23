@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
    <div class="row">
        <div class="col-sm-8 py-5">

                {{-- Scrollspy addon --}}
                <scrollspy></scrollspy>

                {{-- Scrollto addon --}}
                {{--  <scrollto></scrollto>  --}}

                {{-- Countup addon --}}
                {{--  <i-count-up></i-count-up>  --}}


                {{-- Progress addon --}}
                {{--  <vue-progress-bar></vue-progress-bar>
                <sau-progress></sau-progress>  --}}








        </div>
    </div>
@endsection
@push('scripts')

@endpush
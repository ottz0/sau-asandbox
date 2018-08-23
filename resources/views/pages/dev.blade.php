@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
    <div class="row">
        <div class="col-sm-8 py-5">
                <dev></dev>
        </div>
    </div>
@endsection
@push('scripts')
	<script>
        $('body').scrollspy({ target: '#abcd' })
    </script>
@endpush
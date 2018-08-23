@extends('layouts.master')

@section('title', 'Home Page')


@section('content')


<div class="pt-5"></div>
    <h1>Update hotel {{$hotel->hotel_name}}</h1>
    <sau-hotel-create data="{{json_encode($hotel)}}"></sau-hotel-create>
</div>

{{--  <div class="row pt-5"></div>
    <div class="col-md-8 offset-md-2">
    <form method="post" action="/hotels">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="hotel-name">Hotel Name</label>
            <input type="text" class="form-control" id="hotel-name" placeholder="" name="hotel_name" value="">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="hotel_desc" value=""></textarea></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Create</button>
    </form>

    @if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    </div>
</div>  --}}

@endsection
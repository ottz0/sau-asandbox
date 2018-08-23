@extends('layouts.master')

@section('title', 'Home Page')


@section('content')


        <div class="row pt-5">
            <div class="col"><h1>Hotels</h1></div>
        </div>

        <div class="row py-3">
            <div class="col">
                <a href="/hotels/create" class="btn btn-primary">Add a new hotel</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hotel Name</th>
                        <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hotels as $hotel)
                            <tr>
                            <td>{{$hotel->id}}</td>
                            <td>{{$hotel->hotel_name}}</td>
                            <td><a href="/hotels/{{$hotel->id}}" class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>

@endsection
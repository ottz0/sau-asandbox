@extends('layouts.master')

@section('title', 'Home Page')

@section('content')

<div class="pt-5">

    @component('./global.partials._alert')
        <strong>Well if this is what you are after</strong>
    @endcomponent

    <div class="pt-2">
        <h1>{{$hotel->hotel_name}}</h1>
        <p>{{$hotel->hotel_desc}}</p>
        <p>{{$hotel->id}}</p>
        <form action="/hotels/{{$hotel->id}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input name="_method" type="hidden" value="DELETE">
            <a href="/hotels" class="btn btn-outline-secondary">Back</a> <br />
            <a href="/hotels/{{$hotel->id}}/edit" class="btn btn-warning">Edit hotel</a><br />
            <sau-alert-button-confirm del-btn-txt="Delete Hotel"
                                                         del-btn-class="btn btn-danger"
                                                         del-swal-url="/hotels/{{$hotel->id}}"
                                                         del-swal-title="Are you sure?"
                                                         del-swal-text="Do you weant to delete {{$hotel->hotel_name}}"
                                                         del-swal-resp-title="Deleted"
                                                         del-swal-resp-type="success"
                                                        del-swal-resp-text="The hotel has beeen deleted"
                                                        del-swal-redir-url="/hotels"
            ></sau-alert-button-confirm>
        </form>
        {{--  <sau-alert msg="This is the message" result="none"></sau-alert>
        <sau-alert-button btn-txt="Show Message"
                                       btn-class="btn btn-primary"
                                       alert-msg="This is a sweet alert message"
        >
        </sau-alert-button>  --}}
    </div>
</div>
@endsection
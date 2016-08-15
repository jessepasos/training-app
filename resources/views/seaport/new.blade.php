
@extends('layouts.app')

<a class="navbar-brand" href="{{ url('/seaport') }}">
SEAPORT INDEX
</a>



@section('content')




    <div class="container">

        {{--<a class="navbar-brand" href="{{ url('/seaport') }}">--}}
        {{--SEAPORT INDEX--}}
        {{--</a>--}}

        <div class="row">

            <a class="navbar-brand" href="{{ url('/seaport') }}">
                SEAPORT INDEX
            </a>


            {{--{{ Form::open(array('url' => '/seaport/' . $seaport -> id . '/attack')) }}--}}
            {{--{{ csrf_field() }}--}}
            {{--<button type="submit" class="btn btn-primary">Attack this port!</button>--}}
            {{--{{ Form::close() }}--}}

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">   placeholder </div>

                    <div class="panel-body">


                        <h1>Create New Seaport</h1>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="seaport_name" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="treasure_amount" class="col-sm-2 control-label">treasure_amount</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="treasure_amount" name="seaport_treasure_amount" value="">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

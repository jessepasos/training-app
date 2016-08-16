
@extends('layouts.app')



@section('content')




    <div class="container">


        <div class="row">

            <a class="navbar-brand" href="{{ url('/ship') }}">
                ship INDEX
            </a>


            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $ship->rank }} {{ $ship->name }}</div>

                    <div class="panel-body">


                        <h1>Edit ship</h1>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="">
                            {{ csrf_field() }}


                            <?php
                            $ship_attributes = ['name', 'displacement', 'length', 'draft', 'crew_saltiness', 'num_cannons'];
                            ?>

                            @foreach($ship_attributes as $ship_attribute)
                            <div class="form-group">
                                <label for="{{$ship_attribute}}" class="col-sm-2 control-label">{{$ship_attribute}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="length" name= "{{'ship_' . $ship_attribute}}" value="{{ $ship->{$ship_attribute} }}">
                                </div>
                            </div>
                            @endforeach

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

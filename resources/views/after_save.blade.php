@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Teszt</div>

                    <div class="panel-body">

                        <div class="alert alert-success">
                            OK
                        </div>

                        <h3>{{ url('s/' . $url_entry->short) }}</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

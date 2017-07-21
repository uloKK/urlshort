@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Teszt</div>

                <div class="panel-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ action('HomeController@confirmPassword', ['url_id'=>$url->id]) }}" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">

                        
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" />

                        </div>

                        <div class="text-right">

                            <button type="submit" class="btn btn-success">Save</button>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

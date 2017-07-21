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

                    <form action="{{ action('HomeController@postIndex') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">

                            <label>URL</label>
                            <input type="text" name="url" class="form-control" value="{{ old('url') }}" />
                            
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder = "Leave this empty if you don't want a password" />

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

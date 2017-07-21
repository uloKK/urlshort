@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Active</div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Full</th>
                                <th>Short</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($urls as $url)
                            <tr>
                                <td>{{ $url->url }}</td>
                                <td>{{ url('s/' . $url->short) }}</td>
                                <td class="text-right">

                                    <a href="{{ action('HomeController@deleteUrl', ['url_id' => $url->id]) }}" class="btn btn-sm btn-danger">
                                        Delete
                                    </a>

                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        No record
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Inactive</div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Full</th>
                                <th>Short</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($inactive_urls as $url)
                                <tr>
                                    <td>{{ $url->url }}</td>
                                    <td>{{ url('s/' . $url->short) }}</td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        No record
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

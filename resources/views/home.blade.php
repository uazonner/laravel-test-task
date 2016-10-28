@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Saved hashses</h3>

                @if (Session::has('succes'))
                    <div class="alert alert-success">
                        {!! Session::get('succes') !!}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Word</th>
                        <th>Algorithm</th>
                        <th>Hash</th>
                        <th>Tools</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hashes as $hash)
                        <tr>
                            <td>{{ $hash->vocabulary->word }}</td>
                            <td>{{ $hash->algorithm }}</td>
                            <td>{{ $hash->hash }}</td>
                            <td>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['user::hash.delete', $hash->id]]) }}
                                {{ Form::submit('Delete',
                                    ['class' => 'btn btn-primary btn-xs deleteHash']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $hashes->render() }}
            </div>
        </div>
@endsection

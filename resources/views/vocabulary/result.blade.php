@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Result</h2>
        <div class="row">
            <div class="col-md-12">
                @foreach($data as $word => $value)
                    <h3>{{ $word }}</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Algorithm</th>
                            <th>Hash</th>
                            <th>Tools</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value as $algorithm => $hash)
                            <tr>
                                <td>{{ $algorithm }}</td>
                                <td>{{ $hash }}</td>
                                <td>
                                    {!! Form::open(['route' => 'HashGenerator::post']) !!}
                                        {{ Form::submit('Save', ['class' => 'btn btn-primary btn-xs']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
@endsection



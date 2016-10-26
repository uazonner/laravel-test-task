@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Vocabulary words</h4>
        <div class="row">
            <div class="col-md-6">
                {!! Form::open(['url' => 'foo/bar']) !!}
                        <ul class="list-group">
                        @foreach($vocabulary as $item)
                            <li class="list-group-item">
                                {!! Form::checkbox('name', 'value') !!}
                                {{ $item->word }}
                            </li>
                        @endforeach
                        </ul>
                {!! Form::submit('Generate!') !!}
                {!! Form::close() !!}
                {{ $vocabulary->render() }}
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Tools</div>

                    <div class="panel-body">
                        Generate!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



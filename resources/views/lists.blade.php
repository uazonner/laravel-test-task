@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Vocabulary words</h4>
        <div class="row">
            {!! Form::open(['url' => 'foo/bar']) !!}
            <div class="col-md-6">
                <ul class="list-group">
                    @foreach($vocabulary as $item)
                        <li class="list-group-item">
                            {!! Form::checkbox('name', 'value') !!}
                            {{ $item->word }}
                        </li>
                    @endforeach
                </ul>
                {{ $vocabulary->render() }}
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Tools</div>
                    <div class="panel-body">
                        <h5>Select hashing</h5>
                        <p>{!! Form::checkbox('name', 'value') !!} MD5</p>
                        <p>{!! Form::checkbox('name', 'value') !!} SHA-256</p>
                        <p>{!! Form::checkbox('name', 'value') !!} SHA-512</p>
                        <p>{!! Form::checkbox('name', 'value') !!} STD DES</p>
                        <p>{!! Form::checkbox('name', 'value') !!} BLOWFISH</p>
                        {!! Form::submit('Create hash', ['class' => 'btn btn-primary btn-sm']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection



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
                            {!! Form::checkbox('words', $item->word, false, ['id' => $item->id]) !!}
                            {!! Form::label($item->id, $item->word) !!}
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
                        <p>
                            {!! Form::checkbox('hash', 'md5', false, ['id' => 'md5']) !!}
                            {!! Form::label('md5', 'MD5') !!}
                        </p>
                        <p>
                            {!! Form::checkbox('hash', 'sha256', false, ['id' => 'sha256']) !!}
                            {!! Form::label('sha256', 'SHA-256') !!}
                        </p>
                        <p>
                            {!! Form::checkbox('hash', 'sha512', false, ['id' => 'sha512']) !!}
                            {!! Form::label('sha512', 'SHA-512') !!}
                        </p>
                        <p>
                            {!! Form::checkbox('hash', 'stddes', false, ['id' => 'stddes']) !!}
                            {!! Form::label('stddes', 'STD DES') !!}
                        </p>
                        <p>
                            {!! Form::checkbox('hash', 'BLOWFISH', false, ['id' => 'BLOWFISH']) !!}
                            {!! Form::label('BLOWFISH', 'BLOWFISH') !!}
                        </p>
                        {!! Form::submit('Create hash', ['class' => 'btn btn-primary btn-sm']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection



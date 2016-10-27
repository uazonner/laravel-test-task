@extends('layouts.app')

@section('content')
    <div class="container">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h4>Vocabulary words</h4>
        <div class="row">
            {!! Form::open(['route' => 'HashGenerator::post']) !!}
            <div class="col-md-6">
                <ul class="list-group">
                    @foreach($vocabulary as $item)
                        <li class="list-group-item">
                            {!! Form::checkbox('words[]', $item->word, false, ['id' => $item->id]) !!}
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
                            {!! Form::checkbox('hash[]', 'md5', false, ['id' => 'md5']) !!}
                            {!! Form::label('md5', 'MD5') !!}
                        </p>
                        <p>
                            {!! Form::checkbox('hash[]', 'sha1', false, ['id' => 'sha1']) !!}
                            {!! Form::label('sha1', 'SHA-1') !!}
                        </p>
                        <p>
                            {!! Form::checkbox('hash[]', 'sha256', false, ['id' => 'sha256']) !!}
                            {!! Form::label('sha256', 'SHA-256') !!}
                        </p>
                        <p>
                            {!! Form::checkbox('hash[]', 'sha512', false, ['id' => 'sha512']) !!}
                            {!! Form::label('sha512', 'SHA-512') !!}
                        </p>
                        <p>
                            {!! Form::checkbox('hash[]', 'blowfish', false, ['id' => 'BLOWFISH']) !!}
                            {!! Form::label('BLOWFISH', 'BLOWFISH') !!}
                        </p>
                        {!! Form::submit('Create hash', ['id' => 'createHash', 'class' => 'btn btn-primary btn-sm']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection



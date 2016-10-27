@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Result</h2>
        <div class="row">
            <div class="col-md-12">
                @foreach($data as $id => $value)
                    <h3>
                        @foreach($value as $key => $word)
                            @if( $key === 'origin')
                                {{ $word }}
                            @endif
                        @endforeach
                    </h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Algorithm</th>
                            <th>Hash</th>
                            <th>Tools</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($value as $key => $hashed)
                            @if( $key === 'algorithm')
                                @foreach($hashed as $algorithm => $hash)
                                    <tr>
                                        <td class="{{ $id }}-{{ $algorithm }}-algorithm">{{ $algorithm }}</td>
                                        <td class="{{ $id }}-{{ $algorithm }}-hash">{{ $hash }}</td>
                                        <td>
                                            {!! Form::open() !!}
                                            {{ Form::submit('Save',
                                                ['class' => 'btn btn-primary btn-xs saveHash', 'id' => $id . '-' . $algorithm]) }}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
@endsection


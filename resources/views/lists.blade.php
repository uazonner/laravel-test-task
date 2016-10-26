@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Vocabulary words</h4>
        <div class="row">
            <div class="col-md-12">
                        <ul class="list-group">
                        @foreach($vocabulary as $item)
                            <li class="list-group-item">{{ $item->word }}</li>
                        @endforeach
                        </ul>
                {{ $vocabulary->render() }}
            </div>
        </div>
    </div>
@endsection



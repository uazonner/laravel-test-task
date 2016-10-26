@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Vocabulary words</h4></div>
                    <div class="panel-body">
                        @foreach($vocabulary as $item)
                            {{ $item->word }} <br>
                        @endforeach
                    </div>
                </div>
                {{ $vocabulary->render() }}
            </div>
        </div>
    </div>
@endsection



@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <table class="table">
        <thead class="bg-info">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Message</th>
            <th scope="col">Sentiment</th>
        </tr>
        </thead>
        <tbody>
        @foreach($all_data as $data)
            <tr>
                <th class="bg-info" scope="row">{{$data->id}}</th>
                <td>{{$data->message}}</td>
                <td>{{$data->sentiment}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

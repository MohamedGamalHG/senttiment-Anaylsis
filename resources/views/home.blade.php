@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <p>Put Your Message Below To Make Sentiment Analysis On It</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li >{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form  action="{{ route('add_sentiment') }}" method="post">
                            @csrf
                            <input class="form-control mt-3" type="text" name="message" placeholder="Enter Your Message">
                            <input class="mt-2 btn btn-outline-primary" type="submit" value="send">
                        </form>
                        <div class="d-flex justify-content-end">
                    <a class="btn btn-outline-info  " href="{{route('all_sentiment')}}">Show All Sentiment</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

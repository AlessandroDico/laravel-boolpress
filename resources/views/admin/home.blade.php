@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Hello, {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    Your mail : {{ Auth::user()->email }}
                </div>
                @if (Auth::user()->api_token)
                    <div class="card-body">
                        Your api_token : {{ Auth::user()->api_token }}
                    </div>
                @else
                    <div class="card-body">
                        <p>You don't have an api token!</p>
                        <form action="{{ route('admin.generateToken') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Create Api_token</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
                @if(!Auth::user())
                        <script>window.location = "/home";</script>
                @endif
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Profile') }} <a href="{{ route('profiles.create') }}" style="float: right;clear: both;" class="btn btn-primary">Update Profile</a>
                </div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="row">
                        <div class="col-md-8">

                            <h2>User Details:</h2>
                            
                           <table class="table">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Name:</td>
                                            <td>Email Address:</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($profiles)
                                        @foreach($profiles as $profile)
                                            @if(Auth::user()->id == $profile->user_id)
                                            <tr>
                                                <td>{{ $profile->id }}</td>
                                                <td>{{ Auth::user()->name }}</td>
                                                <td>{{ Auth::user()->email }}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>

                        </div><!-- end of col-md-8 -->
                        
                        <div class="well">
                            <div class="offset-4">
                                <h2>User Image:</h2>
                                @if($profiles)
                                @foreach($profiles as $profile)
                                    @if(Auth::user()->id == $profile->user_id)
                                        <img height="70px" src="{{ url($profile['image_path']) }}" class="d-block img1" alt="{{ $profile['image'] }}" />
                                    @endif
                                @endforeach
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')
                @if(!Auth::user())
                        <script>window.location = "/home";</script>
                @endif
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                    @if(Auth::user()->status != 1)
                        <script>window.location = "/home";</script>
                    @endif
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if(Auth::user()['status'] == 1)
                    <table class="table">
                        <thead>

                            <tr>
                                <td>#</td>
                                <td>Username:</td>
                                <td>Email:</td>
                                <td>Status:</td>
                            </tr>

                        </thead>

                        <tbody>
                            @if(!empty($users))
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <img height="50px" src="{{ $user->profile->image_path }}" alt="{{ $user->profile->image }} image">
                                </td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @if($user->status == 0)
                                <td>
                                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                                        @csrf
                                        <input id="status" type="hidden" value="1" class="form-control @error('status') is-invalid @enderror" name="status" required>

                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @method('patch')
                                        <input type="submit" value="user" class="btn btn-primary btn-sm" style="width: 60px;">
                                    </form>
                                </td>
                                @elseif($user->status == 1)
                                <td>
                                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                                        @csrf
                                        <input id="status" type="hidden" value="0" class="form-control @error('status') is-invalid @enderror" name="status" required>

                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @method('patch')
                                        <input type="submit" value="admin" class="btn btn-success btn-sm" style="width: 60px;">
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

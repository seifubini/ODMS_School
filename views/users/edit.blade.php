@extends('layouts.header')

@section('content')
    <div class="row">
        <div class="col-lg-8 margin-tb">
            <div class="pull-left">
                <h2>Edit Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('donations.index') }}" title="Go back"> <i class="fas fa-backward "></i> Index </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    var_dump('$user');

    <form action="{{ route('password.update') }}" method="POST">

        @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="{{$user->email}}" required autofocus />
            </div>

            <div class="block">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="name" name="name" :value="{{$user->name}}" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />
            </div>

                <div class="mt-4 form-group">
                <x-jet-label for="user_type" value="{{ __('Select User Type:') }}" />
                <select name="user_type" class="block mt-1 w-full form-control" required>
                    <option value="organization">Organization</option>
                    <option value="donee">Donee</option>
                    <option value="donor">Donor</option>
                    <option value="doctor">Doctor</option>
                </select>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset') }}
                </x-jet-button>
            </div>

    </form>
@endsection
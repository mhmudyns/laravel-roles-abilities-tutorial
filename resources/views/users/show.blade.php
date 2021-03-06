@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>{{ __('Name') }}</label>
                        <input type="text" class="form-control-plaintext" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label>{{ __('Email') }}</label>
                        <input type="email" class="form-control-plaintext" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label>{{ __('Roles') }}</label>
                        <select multiple class="form-control" disabled>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ !in_array($role->id, old('roles', $user->roles()->pluck('roles.id')->toArray())) ?: 'selected' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
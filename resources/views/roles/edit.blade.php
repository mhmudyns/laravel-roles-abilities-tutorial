@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Roles') }}</div>

                <div class="card-body">
                    <form action="{{ route('roles.update', ['role' => $role]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}">
                            @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Abilities') }}</label>
                            <select multiple class="form-control" name="abilities[]">
                                @foreach($abilities as $ability)
                                <option value="{{ $ability->id }}" {{ !in_array($ability->id, old('abilities', $role->abilities()->pluck('abilities.id')->toArray())) ?: 'selected' }}>{{ $ability->name }}</option>
                                @endforeach
                            </select>
                            @error('abilities')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
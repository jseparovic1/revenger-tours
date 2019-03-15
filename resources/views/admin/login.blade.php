@extends('admin.layouts.full')

@section('content')
    <div class="w-full max-w-lg px-32 pt-6 pb-8 mb-4 rounded shadow-lg" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="text-center py-4">
            <span class="text-brand font-bold text-2xl">Revenger</span>
            <span class="text-white font-bold text-2xl">Tours</span>
        </div>
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-hairline mb-2" for="email">
                    Email
                </label>
                <input
                    class="outline-none focus:border-brand appearance-none border rounded w-full py-2 px-3 text-grey-darker {{ $errors->has('email') ? ' is-invalid' : '' }}"
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}" required autofocus
                >
                @if ($errors->has('email'))
                    <span class="text-danger-light text-sm" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-hairline mb-2" for="password">
                    Password
                </label>
                <input
                    id="password"
                    type="password"
                    class="outline-none focus:border-brand border rounded w-full py-2 px-3 text-grey-darker{{ $errors->has('password') ? ' is-invalid' : '' }}"
                    name="password"
                    required
                >
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="mb-2">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="text-grey" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="flex items-center justify-center">
                <button class="bg-brand-dark hover:bg-brand-darkest text-white font-bold py-2 px-4 rounded" type="submit">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
@endsection

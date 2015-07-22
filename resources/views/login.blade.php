@extends('app')

@section('content')
    <div class="page-header container">
        <h1>
            Login Now<br>
            <small>
                Don't have an account?
                <a href="{{ action('Auth\AuthController@getRegister') }}">Register!</a>
            </small>
        </h1>
    </div>

    <div class="container">

        <?php view()->share('label_class', 'col-md-4'); ?>
        <?php view()->share('control_size_class', 'col-md-6'); ?>

        {!! Form::open(['action' => 'Auth\AuthController@postLogin']) !!}

        <div class="form-horizontal">
            @if(env('GOOGLE_APP_ID') || env('FACEBOOK_APP_ID') || env('TWITTER_APP_ID'))
                @include('form::html', [
                    'label' => 'Login with:',
                    'content' => view('snippets.social_login_buttons')->render(),
                ])

                @include('form::html', [
                    'content' => '<div class="center-line text-uppercase"><p><strong>or</strong></p></div>',
                ])
            @endif

            @include('form::input', [
                'name' => 'email',
                'attributes' => ['autofocus'],
            ])

            @include('form::input', [
                'name' => 'password',
                'password' => true,
            ])

            @include('form::checkbox', [
                'name' => 'remember',
                'label' => 'Remember me',
            ])

            @include('form::html', [
                'content' => '
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a class="btn btn-link" href="' . action('Auth\PasswordController@getEmail') . '">Forgot Your Password?</a>
                ',
            ])
        </div>

        {!! Form::close() !!}
    </div>
@endsection

@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page">
    <div id="app" v-cloak>
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/home') }}"><b>Admin</b>LTE</a>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-box-body">
                <p class="login-box-msg">{{ trans('adminlte_lang::message.registermember') }}</p>
                {!! Form::open(['route' => 'admin.users.store', 'method' => 'post']) !!}

                {!! Form::label('name','Nombres') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}

                {!! Form::label('telefono','Telefono') !!}
                {!! Form::text('telefono',null,['class'=>'form-control']) !!}

                {!! Form::label('email','E-Mail') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}

                {!! Form::label('username','Nombre de Usuario') !!}
                {!! Form::text('username',null,['class'=>'form-control']) !!}

                {!! Form::label('password','Contraseña') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
                <hr>
                {!! Form::submit('Registrar',['class'=>'btn btn-success btn-block']) !!}
                {!! Form::close() !!}

                <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>

    @include('adminlte::layouts.partials.scripts_auth')

    @include('adminlte::auth.terms')

</body>

@endsection

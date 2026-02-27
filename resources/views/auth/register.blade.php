<x-logout-layout>
    <div class="d-flex flex-column align-items-center">
        <div class="auth-card p-5 shadow-lg rounded-5 " style=" width: 100%; max-width: 400px; margin-top: -20px;">
            <h3 class="text-center mb-4 ">新規ユーザー登録</h3>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {!! Form::open(['url' => '/register', 'method' => 'POST']) !!}

            <div class="mb-4">
                {{ Form::label('ユーザー名', null, ['class' => 'form-label']) }}
                {{ Form::text('username', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'ユーザー名']) }}
            </div>

            <div class="mb-4">
                {{ Form::label('メールアドレス', null, ['class' => 'form-label']) }}
                {{ Form::email('email', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'メールアドレス']) }}
            </div>

            <div class="mb-4">
                {{ Form::label('パスワード', null, ['class' => 'form-label']) }}
                {{ Form::password('password', ['class' => 'form-control form-control-lg', 'placeholder' => 'パスワード']) }}
            </div>

            <div class="mb-4">
                {{ Form::label('パスワード確認', null, ['class' => 'form-label']) }}
                {{ Form::password('password_confirmation', ['class' => 'form-control form-control-lg', 'placeholder' => 'パスワード確認']) }}
            </div>

            <div class="d-grid">
                {{ Form::submit('新規登録', ['class' => 'btn btn-danger btn-lg']) }}
            </div>

            <div class="text-center mt-4">
                <p><a href="/login">ログイン画面へ戻る</a></p>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</x-logout-layout>

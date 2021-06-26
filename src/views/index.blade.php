<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Builder</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-builder.css') }}">
</head>

<body>
    @if ($error = Session::get('error'))
            <div class="container">
                <div class="notification is-danger">
                    <p>{{ $error }}</p>
                </div>
            </div>
    @endif
    @if ($success = Session::get('success'))
            <div class="container">
                <div class="notification is-success">
                    <p>{{ $success }}</p>
                </div>
            </div>
    @endif

    @foreach ($forms as $form)
        {!! $form->render() !!}
    @endforeach
</body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/nldev/js/inputs.js') }}"></script>
</html>

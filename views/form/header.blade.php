@php
$method = $form->method == 'GET' ? 'GET' : 'POST';
$media = $form->media ? 'enctype=multipart/form-data' : null;
@endphp
<form action="{{ route($form->routename, $form->data) }}" method="{{ $method }}" {!! $media !!} class="box">
    @if ($form->title !== null)
        <h1 class="title">{{ $form->title }}</h1>
    @endif

    @method($form->method)
    @csrf

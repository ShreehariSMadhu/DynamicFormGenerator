@extends('adminlte::page')

@section('content')
<form method="POST" action="{{ route('input.store') }}">
@csrf
    <input type="hidden" name="form_id" value="{{ $form->id }}">
    <x-adminlte-input name="form_title" label="Form Title" value="{{ $form->title }}" disabled />

    <x-adminlte-select name="type" label="Input Type">
        <option>text</option><option>number</option><option>date</option>
        <option>select</option><option>date-time</option><option value="file">File Upload</option> 

    </x-adminlte-select>
    <x-adminlte-input name="label" label="Input Label" />
    <x-adminlte-input name="placeholder" label="Input Placeholder" />
    <x-adminlte-button type="submit" label="Save Input" theme="success"/>
</form>
@endsection

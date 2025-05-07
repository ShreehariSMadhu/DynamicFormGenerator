@extends('adminlte::page')

@section('content')
<form method="POST" action="/form/create">
    @csrf
    <x-adminlte-input name="title" label="Form Title" />
    <x-adminlte-select name="method" label="Form Method">
        <option>GET</option><option>POST</option><option>PUT</option><option>DELETE</option>
    </x-adminlte-select>
    <x-adminlte-input name="action_url" label="Form Action URL" />
    <x-adminlte-select name="cancel_button" label="Cancel Button Required">
        <option>YES</option><option>NO</option>
    </x-adminlte-select>
    <x-adminlte-input name="submit_button_name" label="Submit Button Name" />
    <x-adminlte-button type="submit" label="Next" theme="primary"/>
</form>
@endsection

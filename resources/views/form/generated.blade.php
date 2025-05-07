@extends('adminlte::page')

@section('content')
<form method="{{ $form->method }}" action="{{ route('form.submit', $form->id) }}" enctype="multipart/form-data">
</form>
    @foreach($inputs as $input)
        @php
            $name = Str::slug($input->label, '_');
        @endphp

        @if($input->type === 'file')
            <x-adminlte-input-file name="{{ $name }}"
                               label="{{ $input->label }}"
                               igroup-size="sm"
                               placeholder="{{ $input->placeholder }}" />
        @else
            <x-adminlte-input name="{{ $name }}"
                          label="{{ $input->label }}"
                          placeholder="{{ $input->placeholder }}"
                          type="{{ $input->type }}" />
        @endif
    @endforeach


    @if($form->cancel_button)
        <a href="/" class="btn btn-danger">Cancel</a>
    @endif

    <x-adminlte-button type="submit" label="{{ $form->submit_button_name }}" theme="primary"/>
</form>
@endsection

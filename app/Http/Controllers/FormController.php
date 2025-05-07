<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormInput;
use Illuminate\Support\Str;


class FormController extends Controller
{
    public function createForm1()   
    {
        return view('form.create');
    }

    public function storeForm1(Request $request)
    {
        $form = Form::create([
            'title' => $request->title,
            'method' => $request->method,
            'action_url' => $request->action_url,
            'cancel_button' => $request->cancel_button === 'YES',
            'submit_button_name' => $request->submit_button_name
        ]);

        return redirect()->route('input.create', ['form_id' => $form->id]);
    }

    public function createForm2(Request $request)
    {
        $formId = $request->query('form_id'); 
        $form = Form::findOrFail($formId);
        return view('input.create', compact('form'));
    }

    public function storeForm2(Request $request)
    {
        $request->validate([
            'type' => 'required|in:text,number,email,file', // Add 'file' to the allowed types
            'label' => 'required|string',
            'placeholder' => 'nullable|string',
        ]);

        FormInput::create([
            'form_id' => $request->form_id,
            'type' => $request->type,
            'label' => $request->label,
            'placeholder' => $request->placeholder
        ]);

        $form = Form::findOrFail($request->form_id);

        return redirect()->route('form.generate', ['id' => $form->id]);
    }
    public function generateForm($id)
    {
        $form = Form::findOrFail($id);
        $inputs = $form->inputs;
        return view('form.generated', compact('form', 'inputs'));
    }
    public function handleGeneratedForm(Request $request, $id)
    {
        $form = Form::findOrFail($id);
        $inputs = $form->inputs;

        $submittedData = [];

        foreach ($inputs as $input) {
            $name = Str::slug($input->label, '_');

            if ($input->type === 'file' && $request->hasFile($name)) {
                $file = $request->file($name);
                $path = $file->store('uploads', 'public');
                $submittedData[$name] = $path;
            } else {
                $submittedData[$name] = $request->input($name);
            }
        }

        return redirect('/')->with('success', 'Form submitted successfully!');
    }
}





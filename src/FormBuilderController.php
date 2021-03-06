<?php

namespace NLDev\FormBuilder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NLDev\FormBuilder\Traits\FormsTrait;

class FormBuilderController extends Controller
{
    use FormsTrait;

    public function index()
    {
        $data = [1 => 'test1', 2 => 'test2', 3 => 'test3'];
        $dataGroup = ['test' => ['test', 'test+'], 'test 2' => ['test', 'test-']];

        $form = $this->form('constructor.store', 'POST', true, 'NLDev FormBuilder')->submit()->parameters(['test']);

        $form->add([
            $this->input('file', 'file', 'Fichier')
        ]);

        // DatePickers
        $form->add([
            '<h1 class="title has-text-grey">DatePickers</h1>',
            [
                $this->input('date', 'date', 'Date', true)->today()->help('test'),
                $this->input('date', 'date_range', 'Date range')->today()->isRange('2021-12-21 20:10', '2022-01-21 20:10'),
            ],
            [
                $this->input('date', 'date_time', 'Date time')->today()->withTime()->now(),
                $this->input('date', 'date_time_range', 'Date time range')->today()->withTime()->now()->isRange()->endDate('2021-12-21', '21:20')->startTime('20:20'),
            ],
            [
                $this->input('time', 'time', 'Time')->startTime('19:00'),
                $this->input('time', 'time_range', 'Time range')->now()->isRange()->endTime('20:00')
            ],
        ]);

        // Select box
        $form->add([
            '<h1 class="title has-text-grey">Select boxes</h1>',
            [
                $this->input("select", 'select', 'Select')->data($data)->help('Ceci est un message d\'aide')->icon('list'),
                $this->input("select", 'select', 'Select')->group($dataGroup, true)->help('Ceci est un message d\'aide')->icon('list'),
            ],
            [
                $this->input("selectajax", 'select_ajax', 'Select ajax')->data($data)->target('select_ajax_target')->action(route('dumy_data'))->value("test2"),
                $this->input("select", 'select_ajax_target', 'Select ajax target')->data(['test 4', 'test 5', 'test 6'])->value('test 5'),
            ],
            '<hr/>'
        ]);

        // Checkboxes and radios
        $form->add([
            '<h1 class="title has-text-grey">Checkboxes and Radios</h1>',
            $this->input('checkbox', 'checkbox', 'Checkbox')->data($data)->help('test'),
            $this->input('checkradio', 'checkradio', 'Checkradio')->data($data)
        ]);

        // Simples
        $form->add([
            '<h1 class="title has-text-grey">Simple inputs</h1>',
            [
                $this->input('text', 'text', 'Text')->placeholder('Ceci est un champ de type text')->maxLength(10)->icon('font')->help('help')->value('test'),
                $this->input('number', 'number', 'Number')->placeholder('Ceci est un champ de type number')->maxLength(2)->icon('sort-numeric-up')->max(99)->min(1),
            ],
            [
                $this->input('password', 'password', 'Password', true)->placeholder('Ceci est un champ de type password')->icon('lock')->help('test'),
                $this->input('email', 'email', 'Email')->placeholder('Ceci est un champ de type email')->icon('envelope'),
            ],
            $this->input('textarea', 'textarea', 'Textarea')->placeholder('Ceci est un textarea')->icon('comment')->help('Je suis un message d\'aide !'),
        ]);



        $forms = compact('form');

        return view('FormBuilder::index', compact('forms'));
    }

    public function store(Request $request)
    {
        $this->validateData($request);
    }

    public function validateData(Request $request){
        return $request->validate([
            'password' => ['required', 'in:1'],
        ]);
    }
}

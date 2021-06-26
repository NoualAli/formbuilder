<?php

namespace NLDev\FormBuilder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NLDev\FormBuilder\Traits\FormTrait;

class FormBuilderController extends Controller
{
    use FormTrait;

    public function index()
    {
        $data = ['test1', 'test2', 'test3'];

        $form = $this->form(route('constructor.store'), 'POST', true, 'NLDev FormBuilder')->submit();

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
            $this->input("select", 'select', 'Select', true)->data($data)->help('Ceci est un message d\'aide')->icon('list'),
            [
                $this->input("selectajax", 'select_ajax', 'Select ajax', true)->data($data)->target('select_ajax_target')->action(route('dumy_data'))->value("test2"),
                $this->input("select", 'select_ajax_target', 'Select ajax target', true)->data(['test 4', 'test 5', 'test 6'])->value('test 5'),
            ],
            '<hr/>'
        ]);

        // Checkboxes and radios
        $form->add([
            '<h1 class="title has-text-grey">Checkboxes and Radios</h1>',
            $this->input('checkbox', 'checkbox', 'Checkbox', true)->data($data)->help('test'),
            $this->input('checkradio', 'checkradio', 'Checkradio')->data($data)
        ]);

        // Simples
        $form->add([
            '<h1 class="title has-text-grey">Simple inputs</h1>',
            [
                $this->input('text', 'text', 'Text')->placeholder('Ceci est un champ de type text')->maxLength(10)->icon('font')->help('help'),
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

    }

    public function validateData(Request $request){
        return $request->validate([
            'file' => ['required', 'max:2000', 'file']
        ]);
    }
}

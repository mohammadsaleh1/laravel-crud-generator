<?php

namespace Saleh\LaravelCrud\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenrateCommand extends Command
{

    protected $signature = 'crud:generate {model}';

    protected $description = 'Command description';
    protected $path;

    public function __construct()
    {
        parent::__construct();
    }
    public function fire()
    {}

    public function handle()
    {
        $test = Artisan::call('make:view', ['view' => $this->argument('model') . '\\index']);
        $data = array();
        $model = $this->argument('model');
        $class = app($model);

        $table = $class->getTable();
        $AttrToSkip = ['created_at', 'updated_at', 'deleted_at'];
        $columns = \Schema::getColumnListing($table);
        foreach ($columns as $column) {

            if (!in_array($column, $AttrToSkip)) {
                $type = $this->choice(
                    'What is type of Attrbuite "' . $column . '"?',
                    ['text', 'textarea', 'number', 'hidden', 'skip']
                );
                array_push($data, array($column, $type));
            }
        }

        //Artisan::call('make:view', ['view' => $this->argument('model') . '\\create']);
        $file = (splits($model,'\\'));

        $index = $file . '\\index.blade.php';
        $stub = resource_path('views\\' . $index);

        $myfile = fopen($stub, "w") or die("Unable to open file!");

        if (file_exists($stub)) {
            fwrite($myfile, $this->create($data, $class));
            fclose($myfile);
        } else {
            dd(4);
        }

    }

    public function create($data, $model) {
        $this->render($data, $model);

        $text = " @extends('app') @push('css')  @endpush @section('content')" . $this->render($data, $model) . "@endsection  @push('js')  @endpush";
        return $text;
    }
    public function head($data)
    {

    }

    public function render($data, $model)
    {
        $head = "";
        $table = generate_table($data, $model::all());
      
        foreach ($data as $item => $index) {
            $head .= '<th>' . $index[0] . '</th>';
        }
        dd($head);
      

        $models =
        dd($table);
        $user = '';
        foreach ($data as $item) {
            $user += $item;
        }
    }
}

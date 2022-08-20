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
        
        $file = (splits($model, '\\'));

        Artisan::call('make:view', ['view' => $file . '\\index.blade.php']);

        $index = $file . '\\index.blade.php';
        $stub = resource_path('views\\' . $index);

        $myfile = fopen($stub, "w+") or die("Unable to open file!");

        if (file_exists($stub)) {

            fwrite($myfile, $this->index($data, $class));
            fclose($myfile);
        } else {
            dd(4);
        }
        $create = $file . '\\create.blade.php';
        $stub = resource_path('views\\' . $create);
     //   dd($stub);
        $myfile = fopen($stub, "w+") or die("Unable to open file!");

        if (file_exists($stub)) {

            fwrite($myfile, $this->create($data, $class));
            fclose($myfile);
        } else {
            dd(4);
        }

    }

    public function index($data, $model)
    {

        $text = "@extends('app')\n@push('css')\n@endpush\n@section('content')\n" . generate_table($data, $model) . "@endsection  @push('js')  @endpush";
        return $text;
    }

    public function create($data, $model)
    {
       //dd($data);
        $form_create = generate_create($data);
        $text = "@extends('app')\n@push('css')\n@endpush\n@section('content')\n" . $form_create . "@endsection \n @push('js') \n @endpush";
        return $text;
    }

    
}

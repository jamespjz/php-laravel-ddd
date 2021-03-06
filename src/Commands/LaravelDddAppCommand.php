<?php

namespace Jamespi\LaravelDdd\Commands;

use Illuminate\Console\GeneratorCommand;

class LaravelDddAppCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel-app-ddd {name} {--project=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Application code generator';

    /**
     * 生成类的类型
     *
     * @var string
     */
    protected $type = 'Logic';


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $project_name = $this->option('project');

        switch ($project_name){
            case 'Services':
                $url = __DIR__ . '/Stubs/AppServicesLogic.stub';
                break;
            case 'Dto':
//                $url = __DIR__ . '/Stubs/AppDtoLogic.stub';
                break;
            case 'Assembler':
//                $url = __DIR__ . '/Stubs/AppAssemblerLogic.stub';
                break;
            default:
                $url = __DIR__ . '/Stubs/AppServicesLogic.stub';
        }

        return $url;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $project_name = $this->option('project');

        return $rootNamespace.'\Application\\'.$project_name.'\\';
    }
}

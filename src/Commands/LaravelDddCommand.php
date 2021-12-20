<?php

namespace Jamespi\LaravelDdd\Commands;

use Illuminate\Console\GeneratorCommand;

class LaravelDddCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel-ddd {name} {--project=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'interface code generator';

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
//        $file_name = $this->argument('name');

        switch ($project_name){
            case 'Facade':
                $url = __DIR__ . '/Stubs/InterfaceFacadeLogic.stub';
                break;
            case 'Dto':
                $url = __DIR__ . '/Stubs/InterfaceDtoLogic.stub';
                break;
            case 'Assembler':
                $url = __DIR__ . '/Stubs/InterfaceAssemblerLogic.stub';
                break;
            default:
                $url = __DIR__ . '/Stubs/InterfaceFacadeLogic.stub';
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

        return $rootNamespace.'\Interfaces\\'.$project_name.'\\';
    }
}

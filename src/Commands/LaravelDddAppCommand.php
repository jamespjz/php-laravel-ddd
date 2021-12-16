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
    protected $description = 'Domain code generator';

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
        $file_name = $this->argument('name');

        switch ($project_name){
            case 'Facade':
                $fileInfo = file_get_contents(__DIR__ . '/Stubs/InterfaceFacadeLogic.stub');
                break;
            case 'Dto':
                $fileInfo = file_get_contents(__DIR__ . '/Stubs/InterfaceDtoLogic.stub');
                break;
            case 'Assembler':
                $fileInfo = file_get_contents(__DIR__ . '/Stubs/InterfaceAssemblerLogic.stub');
                break;
            default:
                $fileInfo = file_get_contents(__DIR__ . '/Stubs/InterfaceFacadeLogic.stub');
        }
        $serviceNew = "App\Interface\\".$project_name."\\".str_replace("Logic", "Service", $file_name);
        $serviceOld = "App\Core\Services\TestService";
        $fileInfo = str_replace($serviceOld, $serviceNew, $fileInfo);
        $modelNew = "App\Interface\\".$project_name."\\Model\\".str_replace("Logic", "Model", $file_name);
        $modelOld = "App\Core\Mode\TestCoreMode";
        $fileInfo = str_replace($modelOld, $modelNew, $fileInfo);
        file_put_contents(__DIR__ . '/Stubs/InterfaceFacadeLogic.stub', $fileInfo);
        return __DIR__ . '/Stubs/InterfaceFacadeLogic.stub';
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

        return $rootNamespace.'\Interface\\'.$project_name.'\\';
    }
}

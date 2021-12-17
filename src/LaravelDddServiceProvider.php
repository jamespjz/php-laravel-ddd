<?php
/**
 * Created by PhpStorm.
 * User: jamespi
 * Date: 2021/12/15
 * Time: 9:54
 */

namespace Jamespi\LaravelDdd;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
class LaravelDddServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $contents = require (dirname(__DIR__).'/config/ddd.php');
        $dddContents = $contents['ddd_contents'];

        foreach ($dddContents as $dddContent) {
            if ($dddContent == 'Domain'){
                $sonContents = $contents['domain_son_Contents'];
                foreach ($sonContents as $sonContent){
                    $domainPath = base_path() . '/app/' . $dddContent . '/' . $sonContent . '/';
                    is_dir($domainPath) or mkdir($domainPath, 0777, true);

                }
            }else if($dddContent == 'Application'){
                $sonContents = $contents['application_son_Contents'];
                foreach ($sonContents as $sonContent) {
                    $domainPath = base_path() . '/app/' . $dddContent . '/' . $sonContent . '/';
                    is_dir($domainPath) or mkdir($domainPath, 0777, true);
                }
            } else if($dddContent == 'Interfaces'){
                $sonContents = $contents['interface_son_Contents'];
                foreach ($sonContents as $sonContent){
                    $domainPath = base_path() . '/app/' . $dddContent . '/' . $sonContent . '/';
                    is_dir($domainPath) or mkdir($domainPath, 0777, true);
                }
            }else if($dddContent == 'Infrastructures'){
                $domainPath = base_path() . '/app/' . $dddContent . '/';
                is_dir($domainPath) or mkdir($domainPath, 0777, true);
            }
        }

        $this->app->singleton('command.ddd.interface', function ($app){
            return $app['Jamespi\LaravelDdd\Commands\LaravelDddCommand'];
        });
        $this->commands('command.ddd.interface');
        $this->app->singleton('command.ddd.app', function ($app){
            return $app['Jamespi\LaravelDdd\Commands\LaravelDddAppCommand'];
        });
        $this->commands('command.ddd.app');
    }

    /**
     * 启动所有的应用服务。
     *
     * @return void
     */
    public function boot()
    {
        //自动调用命令生成
//        Artisan::call('laravel-ddd TestLogic --project=Facade');
    }
}
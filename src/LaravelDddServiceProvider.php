<?php
/**
 * Created by PhpStorm.
 * User: jamespi
 * Date: 2021/12/15
 * Time: 9:54
 */

namespace Jamespi\LaravelDdd;

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
            } else if($dddContent == 'Interface'){
                $sonContents = $contents['interface_son_Contents'];
                foreach ($sonContents as $sonContent){
                    $domainPath = base_path() . '/app/' . $dddContent . '/' . $sonContent . '/';
                    is_dir($domainPath) or mkdir($domainPath, 0777, true);
                }
            }else if($dddContent == 'Infrastructure'){
                $domainPath = base_path() . '/app/' . $dddContent . '/';
                is_dir($domainPath) or mkdir($domainPath, 0777, true);
            }
        }
    }
}
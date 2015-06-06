<?php namespace Kumuwai\Playground\Modules\Base\Domain;

include_once 'TestViewStub.php';


function config($name, $default=null) 
{
    $values = [
        'assets.js.foo' => '/js/foo.js',
        'assets.css.foo' => '/css/foo.css',
        'assets.css.bar' => [ '/css/foo.css', '/css/bar.css'],


        'tools' => [
            'laravel' => ['caption'=>'Laravel 5', 'url'=>'http://laravel.com', 'file'=>'logo_laravel.png'],
            'tool1' => ['caption'=>'tool1','url'=>'#', 'file'=>'tool1.png'],
        ],
    ];

    if ( ! isset($values[$name]))
        return 'n/a';

    return $values[$name];
}

function asset($name) 
{ 
    return 'http://site.com'.$name; 
}

function array_only($array, $keys)
{
    return array_intersect_key($array, array_flip((array) $keys));
}

function view($name, $with)
{
    return new TestViewStub($name, $with);
}


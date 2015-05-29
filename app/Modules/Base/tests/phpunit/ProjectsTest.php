<?php namespace Kumuwai\Playground\Modules\Base\Domain;

use PHPUnit_Framework_TestCase;
use Kumuwai\MockObject\MockObject;
// use Kumuwai\DataTransferObject\DTO;
use Illuminate\Support\Collection;

class ProjectsTest extends PHPUnit_Framework_TestCase
{
    // const COLLECTION_CLASS = 'Illuminate\Support\Collection';
    const MODULES_CLASS = 'Caffeinated\Modules\Modules';
    const TOOLS_CLASS = 'Kumuwai\Playground\Modules\Base\Domain\Tools';

    /**
     * @dataProvider getProjectsProvider
     */
    public function testCanGetProjects($message, $config, $expected)
    {
        $modules = MockObject::mock(self::MODULES_CLASS, [ 
            'all' => new Collection($config)
        ]);
        $tools = MockObject::mock(self::TOOLS_CLASS, ['mini'=>'<foo>']);
        $test = new Projects($modules, $tools);

        $result = $test->get()->toArray();

        $this->assertEquals($expected, $result, $message);
    }

    public function getProjectsProvider()
    {
        return array(
            [
                'should return empty array if no modules',
                [], []
            ],
            [
                'should ignore modules that are not projects',
                [[ 'name'=>'foo', 'slug'=>'foo', 'description'=>'x', 'enabled'=>true  ]],
                []
            ],
            [
                'should ignore modules that are not enabled',
                [[ 'name'=>'Project001', 'slug'=>'project001', 'description'=>'x', 'enabled'=>false  ]],
                []
            ],
            [
                'should get projects that are enabled',
                [[ 'name'=>'Project001', 'slug'=>'project001', 'description'=>'x', 'enabled'=>true, 'tools' =>[]  ]],
                [[ 'name'=>'Project001', 'slug'=>'project001', 'description'=>'x', 'status'=>'Enabled', 
                    'tools'=>'<foo>', 'title'=>'Project 1'  ]],
            ],
            [
                'should return empty tools if none are available',
                [[ 'name'=>'Project001', 'slug'=>'project001', 'description'=>'x', 'enabled'=>true ]],
                [[ 'name'=>'Project001', 'slug'=>'project001', 'description'=>'x', 'status'=>'Enabled', 
                    'tools'=>'', 'title'=>'Project 1'  ]],
            ],
        );
    }

    public function testCanGetDetailsOfSingleProject()
    {
        $modules = MockObject::mock(self::MODULES_CLASS, [
            'all' => new Collection ([
                ['name'=>'Project1', 'slug'=>'project1', 'enabled'=>true, 'description'=>'x'],
                ['name'=>'Project2', 'slug'=>'project2', 'enabled'=>true, 'description'=>'y'],
            ])
        ]);
        $tools = MockObject::mock(self::TOOLS_CLASS, ['mini'=>'<foo>']);
        $test = new Projects($modules, $tools);

        $result = $test->get('project2');
        $this->assertEquals('y', $result->description);
        $this->assertEquals('Project 2', $result->title);
    }
}


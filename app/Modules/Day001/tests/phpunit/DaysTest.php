<?php namespace Kumuwai\Daily\Modules\Day001\Domain;

use PHPUnit_Framework_TestCase;
use Kumuwai\MockObject\MockObject;
use Kumuwai\DataTransferObject\DTO;


class DaysTest extends PHPUnit_Framework_TestCase
{
    const MODULES_CLASS = 'Caffeinated\Modules\Modules';
    const TOOLS_CLASS = 'Kumuwai\Daily\Modules\Day001\Domain\Tools';

    /**
     * @dataProvider getDaysProvider
     */
    public function testCanGetDays($message, $config, $expected)
    {
        $modules = MockObject::mock(self::MODULES_CLASS, ['all'=>new DTO($config)]);
        $tools = MockObject::mock(self::TOOLS_CLASS, ['mini'=>'<foo>']);
        $test = new Days($modules, $tools);

        $result = $test->get()->toArray();

        $this->assertEquals($expected, $result, $message);
    }

    public function getDaysProvider()
    {
        return array(
            [
                'should return empty array if no modules',
                [], []
            ],
            [
                'should ignore modules that are not days',
                [[ 'name'=>'foo', 'slug'=>'foo', 'description'=>'x', 'enabled'=>true  ]],
                []
            ],
            [
                'should ignore modules that are not enabled',
                [[ 'name'=>'Day001', 'slug'=>'day001', 'description'=>'x', 'enabled'=>false  ]],
                []
            ],
            [
                'should get days that are enabled',
                [[ 'name'=>'Day001', 'slug'=>'day001', 'description'=>'x', 'enabled'=>true, 'tools' =>[]  ]],
                [[ 'name'=>'Day001', 'slug'=>'day001', 'description'=>'x', 'status'=>'Enabled', 'tools'=>'<foo>'  ]],
            ],
            [
                'should return empty tools if none are available',
                [[ 'name'=>'Day001', 'slug'=>'day001', 'description'=>'x', 'enabled'=>true ]],
                [[ 'name'=>'Day001', 'slug'=>'day001', 'description'=>'x', 'status'=>'Enabled', 'tools'=>''  ]],
            ],
        );
    }

}


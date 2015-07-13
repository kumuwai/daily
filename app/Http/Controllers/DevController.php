<?php namespace Kumuwai\Playground\Http\Controllers;

use Illuminate\Http\Request;
use Kumuwai\Playground\Http\Requests;
use Kumuwai\Playground\Http\Controllers\Controller;


class DevController extends Controller
{
    /**
     * Return a unique id
     */
    public function getId($id=null)
    {
        $id = $id ?: uniqid();
        $dec = hexdec($id);
        $packed = pack('H*', $id);
        $unpacked = unpack('H*', $packed)[1];
        $dec2 = hexdec($unpacked);

        return view('dev.simple', ['data'=>[
            'id' => $id,
            'dec' => $dec,
            'packed' => $packed,
            'unpacked' => $unpacked,
            'dec2' => $dec2,
        ]]);
    }

}

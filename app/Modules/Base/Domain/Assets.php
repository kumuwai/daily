<?php namespace Kumuwai\Playground\Modules\Base\Domain;

use Exception;


class Assets
{

    public function css($name, $secure = false)
    {
        return $this->build(
            '<link href="{ASSET}" type="text/css" rel="stylesheet" />',
            'css', $name, $secure
        );    
    }

    public function js($name, $secure = false)
    {
        return $this->build(
            '<script type="text/javascript" src="{ASSET}"></script>',
            'js', $name, $secure
        );
    }

    private function build($template, $type, $name, $secure)
    {
        $filespec = config("assets.$type.$name");

        if ( ! $filespec ) {
            throw new Exception("Asset $name not found");
        }
        
        if (is_array($filespec)) {
            $return = '';
            foreach($filespec as $asset)
                $return .= str_replace('{ASSET}', asset($asset, $secure), $template);
            return $return;
        }

        return str_replace('{ASSET}', asset($filespec,$secure), $template);
    }

}

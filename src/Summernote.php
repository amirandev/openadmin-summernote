<?php

namespace Amirandev\OpenadminSummernote;

use OpenAdmin\Admin\Extension;

class Summernote extends Extension
{
    // Change the $name to 'summernote'
    public $name = 'summernote';

    // Path to your package views folder
    public $views = __DIR__ . '/../resources/views';

    // Asset path pointing to your package's assets folder (not vendor)
    public function assets()
    {
        // Since you saved assets in your package at resources/assets:
        return __DIR__ . '/../resources/assets';
    }
}

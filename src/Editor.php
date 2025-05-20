<?php

namespace Amirandev\OpenadminSummernote;

use OpenAdmin\Admin\Form\Field\Textarea;

class Editor extends Textarea
{
    /**
     * Blade view used to render this editor field.
     */
    protected $view = 'open-admin-summernote::editor';

    /**
     * Setup URLs for image/file browsing.
     * Adjust these URLs to your media manager routes if you have one.
     */
    public function setupImageBrowse()
    {
        $this->options['filebrowserBrowseUrl'] = '/admin/media/?select=true&close=true&fn=window.opener.' . $this->id . '_selectFile';
        $this->options['filebrowserImageBrowseUrl'] = '/admin/media?select=true&close=true&fn=window.opener.' . $this->id . '_selectFile';
    }

    /**
     * Render the editor field and initialize Summernote with options.
     */
    public function render()
    {
        $this->setupImageBrowse();

        // Provide some default Summernote options merged with user options
        $defaultOptions = [
            'placeholder' => 'Write something...',
            'tabsize' => 2,
            'height' => 150,
        ];
        $config = json_encode(array_merge($defaultOptions, $this->options));

        // JavaScript to initialize Summernote and handle file selection
        $this->script = <<<JS
        function {$this->id}_selectFile(url, file_name) {
            // Insert selected image into Summernote editor at cursor position
            $('#{$this->id}').summernote('insertImage', url, file_name);
        }

        window.{$this->id}_selectFile = {$this->id}_selectFile; // Make globally accessible

        // Initialize Summernote editor with config options
        $('#{$this->id}').summernote({$config});
        JS;

        return parent::render();
    }
}

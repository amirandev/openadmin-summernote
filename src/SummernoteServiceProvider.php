<?php

namespace Amirandev\OpenadminSummernote;

use Illuminate\Support\ServiceProvider;
use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Form;

class SummernoteServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(Summernote $extension)
    {
        if (!Summernote::boot()) {
            return;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'open-admin-summernote');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes([
                $assets => public_path('vendor/amirandev/openadmin-summernote'),
            ], 'open-admin-summernote');
        }

        Admin::booting(function () {
            Admin::css('vendor/amirandev/openadmin-summernote/bootstrap.min.css');
            Admin::css('vendor/amirandev/openadmin-summernote/summernote-bs5.min.css');
            Admin::js('vendor/amirandev/openadmin-summernote/jquery.min.js', false);
            Admin::js('vendor/amirandev/openadmin-summernote/bootstrap.bundle.min.js', false);
            Admin::js('vendor/amirandev/openadmin-summernote/summernote-bs5.min.js', false);
            Form::extend('summernote', Editor::class);
        });
    }
}

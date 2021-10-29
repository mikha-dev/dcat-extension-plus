<?php

namespace Celaraze\DcatPlus\Forms;

use Celaraze\DcatPlus\Support;
use Dcat\Admin\Widgets\Form;

class DcatPlusSiteForm extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        admin_setting($input);
        return $this
            ->response()
            ->success('Site configuration update successfully!')
            ->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->url('site_url', Support::trans('main.site_url'))
            ->help('The domain name of the site determines the display path of static resources (avatars, pictures, etc.), which can include the port number, such as http://chemex.it:8000.')
            ->default(admin_setting('site_url'));
        $this->text('site_title', Support::trans('main.site_title'))
            ->default(admin_setting('site_title'));
        $this->text('site_logo_text', Support::trans('main.site_logo_text'))
            ->help('The priority of text LOGO display is lower than that of pictures. This item will take effect when there is no picture uploaded as LOGO.')
            ->default(admin_setting('site_logo_text'));
        $this->image('site_logo', Support::trans('main.site_logo'))
            ->autoUpload()
            ->uniqueName()
            ->default(admin_setting('site_logo'));
        $this->image('site_logo_mini', Support::trans('main.site_logo_mini'))
            ->autoUpload()
            ->uniqueName()
            ->default(admin_setting('site_logo_mini'));
        $this->switch('site_debug', Support::trans('main.site_debug'))
            ->help('When the debug mode is turned on, the exception capture information will be displayed, and when the debug mode is turned off, only the 500 status code will be returned.')
            ->default(admin_setting('site_debug'));
        $this->radio('site_lang', Support::trans('main.site_lang'))
            ->options([
                'en' =>'English',
                'zh_CN' =>'Chinese (Simplified)'
            ])
            ->default(admin_setting('site_lang'));
    }
}
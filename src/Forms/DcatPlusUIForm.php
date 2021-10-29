<?php

namespace Celaraze\DcatPlus\Forms;

use Celaraze\DcatPlus\ServiceProvider;
use Celaraze\DcatPlus\Support;
use Dcat\Admin\Widgets\Form;

class DcatPlusUIForm extends Form
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
            ->success('Successfully updated')
            ->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->switch('footer_remove', Support::trans('main.footer_remove'))
            ->default(admin_setting('footer_remove'));
        $defaultColors = [
            'default' => 'default',
            'blue' => 'blue',
            'blue-light' => 'blue-light',
            'green' => 'green',
        ];
        foreach (explode(",", ServiceProvider::setting('additional_theme_colors')) as $value) {
            if (!empty($value)) {
                [$k, $v] = explode(":", $value);
                $defaultColors[$k] = $v;
            }
        }

        $this->radio('theme_color', Support::trans('main.theme_color'))
            ->options($defaultColors)
            ->default(admin_setting('theme_color'));
        $this->radio('sidebar_style', Support::trans('main.sidebar_style'))
            ->options([
                'default' => 'default',
                'sidebar-separate' => 'sidebar-separate',
                'horizontal_menu' => 'horizontal_menu'
            ])
            ->default(admin_setting('sidebar_style'));
        $this->switch('grid_row_actions_right', Support::trans('main.grid_row_actions_right'))
            ->default(admin_setting('grid_row_actions_right'));
    }
}
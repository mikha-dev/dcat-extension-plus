<?php

namespace Celaraze\DcatPlus\Http\Controllers;

use Celaraze\DcatPlus\Forms\DcatPlusUIForm;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Routing\Controller;

class DcatPlusUIController extends Controller
{
     public function index(Content $content): Content
     {
         return $content->header('Enhanced Configuration')
             ->description('Provides some enhanced site configuration')
             ->body(function (Row $row) {
                 $tab = new Tab();
                 $tab->addLink('Site Configuration', admin_route('dcat-plus.site.index'));
                 $tab->add('UI optimization', new DcatPlusUIForm(), true);
                 $row->column(12, $tab->withCard());
             });
     }
}
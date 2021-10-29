<?php

namespace Celaraze\DcatPlus\Http\Controllers;

use Celaraze\DcatPlus\Forms\DcatPlusSiteForm;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Routing\Controller;

class DcatPlusSiteController extends Controller
{
     public function index(Content $content): Content
     {
         return $content->header('Enhanced Configuration')
             ->description('Provides some enhanced site configuration')
             ->body(function (Row $row) {
                 $tab = new Tab();
                 $tab->add('Site Configuration', new DcatPlusSiteForm(), true);
                 $tab->addLink('UI optimization', admin_route('dcat-plus.ui.index'));
                 $row->column(12, $tab->withCard());
             });
     }
}
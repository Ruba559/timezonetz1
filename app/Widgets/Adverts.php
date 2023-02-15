<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Arrilot\Widgets\AbstractWidget;
use TCG\Voyager\Facades\Voyager;
use App\Models\Advert;
class Adverts extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Advert::count();



        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => $count ."الاعلانات",
            'text'   => "لديك {$count} اعلان في قاعدة البيانات",
            'button' => [
                'text' => "عرض المنتجات",
                'link' => route('voyager.adverts.index'),
            ],
            'image' => asset('images/widgets/adverts.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}

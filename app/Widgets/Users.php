<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Arrilot\Widgets\AbstractWidget;
use TCG\Voyager\Facades\Voyager;
class Users extends AbstractWidget
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
        $count = Voyager::model('user')->count();


        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => $count ."مستخدمين",
            'text'   => "لديك {$count} مستخدم في قاعدة البيانات",
            'button' => [
                'text' => "عرض المستخدمين",
                'link' => route('voyager.users.index'),
            ],
            'image' => asset('images/widgets/users.jpg'),
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

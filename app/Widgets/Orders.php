<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Arrilot\Widgets\AbstractWidget;
use TCG\Voyager\Facades\Voyager;
use App\Models\Order;
class Orders extends AbstractWidget
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
        $count = Order::count();



        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => $count ."الطلبات",
            'text'   => "لديك {$count} طلب في قاعدة البيانات",
            'button' => [
                'text' => "عرض المنتجات",
                'link' => route('voyager.orders.index'),
            ],
            'image' => asset('images/widgets/orders.jpg'),
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

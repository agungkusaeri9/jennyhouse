<?php

namespace App\View\Components\Frontend;

use App\Models\ProductCategory;
use App\Models\Setting;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $setting = Setting::first();
        $product_categories = ProductCategory::orderBy('name','ASC')->get();
        return view('components.frontend.navbar',[
            'setting' => $setting,
            'product_categories' => $product_categories
        ]);
    }
}

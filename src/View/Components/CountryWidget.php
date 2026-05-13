<?php
// E:\xampp\htdocs\hnuman\packages\Vinod\VisitorTracking\src\Http\View\Components\CountryWidget.php
namespace Vinod\VisitorTracking\View\Components;

use Vinod\VisitorTracking\Models\VisitorSetting as VisitorSettingModel;


use Illuminate\View\Component;

class CountryWidget extends Component
{
    public function render()
    {
        $visitorSetting = VisitorSettingModel::first();
        return view('visitor::components.countries', compact('visitorSetting'));
    }
}

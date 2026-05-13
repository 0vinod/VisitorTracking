<?php
// E:\xampp\htdocs\hnuman\packages\Vinod\VisitorTracking\src\Http\View\Components\CountryWidget.php
namespace Vinod\VisitorTracking\View\Components;

use Illuminate\View\Component;
use Vinod\VisitorTracking\Models\VisitorSetting as VisitorSettingModel;
use Vinod\VisitorTracking\Models\VisitorTable;

class VisitorSetting extends Component
{
    public function render()
    {
        $visitorSetting = VisitorSettingModel::first();

        return view('visitor::components.settings', compact('visitorSetting'));
    }
}

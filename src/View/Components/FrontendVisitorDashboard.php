<?php
// E:\xampp\htdocs\hnuman\packages\Vinod\VisitorTracking\src\Http\View\Components\CountryWidget.php
namespace Vinod\VisitorTracking\View\Components;

use Vinod\VisitorTracking\Models\VisitorSetting as VisitorSettingModel;


use Illuminate\View\Component;

class FrontendVisitorDashboard extends Component
{
    public function render()
    {
        $visitorSetting = VisitorSettingModel::skip(1)->first();
        
        return view('visitor::components.frontend_dashboard', compact('visitorSetting'));
    }
}

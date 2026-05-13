<?php
// E:\xampp\htdocs\hnuman\packages\Vinod\VisitorTracking\src\Http\View\Components\CountryWidget.php
namespace Vinod\VisitorTracking\View\Components;

use Illuminate\View\Component;
use Vinod\VisitorTracking\Models\VisitorTable;

class VisitCounter extends Component
{
      public $startCount;

    public function __construct($startCount = 0)
    {
        $this->startCount = $startCount;
    }

    public function render()
    {
        
        $totalVisitor = VisitorTable::count()+$this->startCount;

        return view('visitor::components.visitCounter',compact('totalVisitor'));
    }
}
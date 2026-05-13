# Visitor Tracking Package for Laravel

The `Ominnet/visitor-tracking` package provides a simple way to track and analyze visitor data in your Laravel application, including total visitors, unique visitors, top visited pages, countries, operating systems, and devices.

## Installation

 

1. **Add This inside Composer.json**

   "repositories": [
        {
            "type": "composer",
            "url": "http://packages.captcha.com"
        },
        {
            "type": "path",
            "url": "packages/Omninet/VisitorTracking",
            "options": {
                "symlink": true
            }
        }
    ]

2. **make command:**
## composer require omninet/visitor-tracking


**To show count on website use component**
    <x-visitor::visit-counter startCount="10000" />  
            or
    <x-visitor::visit-counter />  


## For Admin Add these Component
    
**For Dashbord Analytics** 
    <x-visitor::country-widget />


**For Dashboard Settingaddd This Component:**
    <x-visitor::visitorSetting />

 

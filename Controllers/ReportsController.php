<?php
/**
 * User: jmueller
 * Date: 7/10/17
 * Time: 4:42 PM
 */

namespace controllers;


require_once 'BaseController.php';
require_once __DIR__ . '/../Views/ReportsViews.php';

class ReportsController extends BaseController
{
    function respond($request)
    {
        switch ($request['action']) {
            case 'index':
                self::index();
                break;
        }
    }

    private function index()
    {
        // make necessary queries calls through models
        // return views related to the initial reports landing page
    }
}
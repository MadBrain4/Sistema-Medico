<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'companiesCount' => Company::count(),
            'employeesCount' => Employee::count(),
            'visitsCount' => MedicalVisit::count(),
            'recentVisits' => MedicalVisit::with(['employee', 'medicineRequests.medicine'])
                ->latest()
                ->take(5)
                ->get()
        ];

        return view('dashboard', $stats);
    }
}

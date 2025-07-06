@extends('layouts.authenticated')

@section('main-content')
<div class="row mb-4">
    <div class="col-12">
        <h2>{{ __('auth.welcome') }}, {{ Auth::user()->name }}</h2>
    </div>
</div>

<div class="row">
    <!-- Tarjetas de resumen -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ __('auth.companies') }}</h5>
                <p class="display-6">{{ $companiesCount }}</p>
                <a href="{{ route('companies.index') }}" class="btn btn-sm btn-outline-primary">
                    {{ __('View all') }}
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ __('auth.employees') }}</h5>
                <p class="display-6">{{ $employeesCount }}</p>
                <a href="{{ route('employees.index') }}" class="btn btn-sm btn-outline-primary">
                    {{ __('View all') }}
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ __('auth.visits') }}</h5>
                <p class="display-6">{{ $visitsCount }}</p>
                <a href="{{ route('visits.index') }}" class="btn btn-sm btn-outline-primary">
                    {{ __('View all') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{ __('Recent medical visits') }}
            </div>
            <div class="card-body">
                @if($recentVisits->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Employee') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Medicines') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentVisits as $visit)
                            <tr>
                                <td>{{ $visit->employee->name }}</td>
                                <td>{{ $visit->visit_date->format('d/m/Y') }}</td>
                                <td>
                                    @foreach($visit->medicineRequests as $request)
                                        {{ $request->medicine->name }} ({{ $request->dose }})<br>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted">{{ __('No recent visits found') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
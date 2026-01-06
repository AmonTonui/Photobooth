@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-12 gap-4 md:gap-6">
            <!-- Left Side -->
            <div class="col-span-12 space-y-6 xl:col-span-7">
                @include('partials.metric-group.metric-group-01')
                @include('partials.chart.chart-02')
            </div>

            <!-- Right Side -->
            <div class="col-span-12 xl:col-span-5">
                @include('partials.chart.chart-03')
            </div>

            <!-- Bottom Area -->
            <div class="col-span-12">
                @include('partials.chart.chart-01')
            </div>
        </div>
    </div>
@endsection

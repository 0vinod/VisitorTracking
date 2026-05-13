@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">

        <div class="col-md-3 col-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Total Visitors</h6>
                    <h3>{{ number_format($totalVisitors) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Total Views</h6>
                    <h3>{{ number_format($totalViews) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Last 30 Days</h6>
                    <h3>{{ number_format($last30Visitors) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Online Now</h6>
                    <h3>{{ $onlineVisitors }}</h3>
                </div>
            </div>
        </div>

    </div>
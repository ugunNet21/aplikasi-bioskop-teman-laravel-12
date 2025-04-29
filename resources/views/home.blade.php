@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div id="dashboard" class="section">
        <h2 class="mb-4">Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card p-3 mb-3">
                    <h5>Total Tickets Sold</h5>
                    <h3>1,234</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 mb-3">
                    <h5>Active Films</h5>
                    <h3>12</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 mb-3">
                    <h5>Revenue</h5>
                    <h3>Rp 50,000,000</h3>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('layouts.exportmaster')
@section('content')
    <!-- Page Wrapper -->
    <div class="">
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid" id="app">
            <!-- Page Header -->
            <div class="col-auto float-right ml-auto">
                        <div class="btn-group btn-group-sm">
                            
                            <button class="btn btn-white"><a href="" @click.prevent="printme" target="_blank">PDF</a></button>
                            <button class="btn btn-white"><i class="fa fa-print fa-lg"></i><a href="" @click.prevent="printme" target="_blank"> Print</a></button>
                        </div>
                    </div>
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col" style="margin-left: -222px;">
                        <h3 class="page-title">Payslip</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('form/salary/page') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payslip</li>
                        </ul>
                    </div>
                    
                </div>
           
            <div class="row" style="margin-left: -240px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title">Payslip for the month of {{ \Carbon\Carbon::now()->format('M') }}   {{ \Carbon\Carbon::now()->year }}  </h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    @if(!empty($users->avatar))
                                    <img src="{{ URL::to('/assets/images/'. $users->avatar) }}" class="inv-logo" alt="{{ $users->name }}">
                                    @endif
                                    <ul class="list-unstyled mb-0">
                                        <li>{{ $users->name }}</li>
                                        <li>{{ $users->address }}</li>
                                        <li>{{ $users->country }}</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">Payslip #49029</h3>
                                        <ul class="list-unstyled">
                                            <li>Salary Month: <span>{{ \Carbon\Carbon::now()->format('M') }}  , {{ \Carbon\Carbon::now()->year }}  </span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">
                                        <li><h5 class="mb-0"><strong>{{ $users->name }}</strong></h5></li>
                                        <li><span>{{ $users->position }}</span></li>
                                        <li>Employee ID: {{ $users->user_id }}</li>
                                        <li  id="start_date">Joining Date: {{ $users->join_date }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Earnings</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php
                                                    $a =  (int)$users->basic;
                                                    $b =  (int)$users->medical_allowance;
                                                    $c =  (int)$users->conveyance;
                                                    $d =  (int)$users->Overtime;
                                                    $e =  (int)$users->allowance;
                                                    $Total_Earnings   = $a + $b + $c + $d+ $e;
                                                ?>
                                                <tr>
                                                    <td><strong>Basic Salary</strong> <span class="float-right">₱{{ $users->basic }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong> Allowance/s</strong> <span class="float-right">₱{{ $users->allowance }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Conveyance</strong> <span class="float-right">₱{{ $users->conveyance }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Overtime</strong> <span class="float-right">₱{{ $users->Overtime }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Medical Allowance</strong> <span class="float-right">₱{{ $users->medical_allowance }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Other Allowance</strong> <span class="float-right">₱{{ $users->allowance }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Earnings</strong> <span class="float-right"><strong>₱ <?php echo $Total_Earnings ?></strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Deductions</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php
                                                    $a =  (int)$users->Tax;
                                                    $b =  (int)$users->absences;
                                                    $c =  (int)$users->tardiness;
                                                    $d =  (int)$users->sss;
                                                    $e =  (int)$users->labour_welfare;
                                                    $f = (int)$users->sss;
                                                    $g = (int)$users->philhealth;
                                                    $h = (int)$users->hdmf;
                                                    $i = (int)$users->pf;
                                                    $Total_Deductions   = $a + $b + $c+ $d + $e +$f + $g+ $h + $i;
                                                ?>
                                                <tr>
                                                    <td><strong>Tax</strong> <span class="float-right">₱{{ $users->Tax }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Absences</strong> <span class="float-right">₱{{ $users->absences }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tardiness</strong> <span class="float-right">₱{{ $users->tardiness }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>SSS</strong> <span class="float-right">₱{{ $users->sss }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Philhealth</strong> <span class="float-right">₱{{ $users->philhealth }}</span></td>
                                                </tr>
                                                 <tr>
                                                    <td><strong>HDMF</strong> <span class="float-right">₱{{ $users->hdmf }}</span></td>
                                                </tr>
                                                 <tr>
                                                    <td><strong>others</strong> <span class="float-right">₱{{ $users->pf }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Deductions</strong> <span class="float-right"><strong>₱<?php echo $Total_Deductions;?></strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12" >
                                    <p><strong>Net Salary: ₱{{ $users->salary }}</strong> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
    </div>

@endsection

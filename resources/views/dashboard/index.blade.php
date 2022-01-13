@extends('layouts.v1')
@section('title') Dashboard @endsection
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboad</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            {{-- <li class="breadcrumb-item active">Starter Page</li> --}}
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h5 class="m-0">Resume Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <p>Selamat datang {{Auth::user()->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  @endsection

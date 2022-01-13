@extends('layouts.v1')
@section("title") Tambah User @endsection
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Data Users</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('user.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="nama_kategori">Nama Lengkap</label>
                                    <input type="text" name="name"
                                        class="form-control  @error('name') is-invalid @enderror"
                                        placeholder="Nama Lengkap" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="agent">Email</label>
                                    <input type="text" name="email"
                                        class="form-control  @error('email') is-invalid @enderror"
                                        placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="agent">Password</label>
                                    <input type="password" name="password"
                                        class="form-control  @error('password') is-invalid @enderror"
                                        placeholder="Password" value="{{ old('password') }}">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Roles</label>
                                    <select name="roles[]" class="form-control  @error('roles') is-invalid @enderror">
                                        <option value="">Pilih Roles</option>
                                        @foreach ($roles as $r)
                                            <option value="{{$r->id}}" @if (old('roles')==$r->id)
                                                selected="selected" @endif>{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

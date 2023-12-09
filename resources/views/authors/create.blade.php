@extends('layouts.main')

@section('container-fluid')

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Tambah Data</h1>
                    </div>
                    <form method="post" action="/authors">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required value="{{ old('nama') }}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi" required value="{{ old('lokasi') }}">
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary mt-3" name="submit" type="submit">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
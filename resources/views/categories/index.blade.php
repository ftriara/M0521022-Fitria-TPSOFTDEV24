@extends('layouts.main')

@section('container-fluid')

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-10 mt-2 mx-auto" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
    </div>
    <div class="card-body">
        <div class="mt-2 mb-4">
            <a class="btn btn-primary" href="/categories/create">
                <i class="fas fa-plus">&ensp;Tambah Data</i>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Kategori</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->kategori }}</td>
                            <td>
                                <a class="btn btn-warning" href="/categories/{{ $category->id }}/edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/categories/{{ $category->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
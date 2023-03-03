@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-3">
        <div>
        <a type="button" href="{{ route('view-records')}}" class="btn btn-dark">Back</a>
        </div>
    </div>
    <div row="row container justify-content-center p-2">
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session::get('error') }}
                    </div>
                @endif
        <form action="{{ route('update-record')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $record->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{$record->name}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{$record->email}}">
            </div>
            <div class="mb-3">
                <label for="mobile_no" class="form-label">Mobile No</label>
                <input type="text" class="form-control" name="mobile_no" value="{{$record->mobile_no}}">
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <select name="department" id="department" class="form-control">
                    <option value="Finance">Finance</option>
                    <option value="II">IT</option>
                    <option value="Sales">Sales</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Marketing">Credit Control</option>
                    <option value="Compliance">Branches</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <select name="designation" id="designation" class="form-control">
                    <option value="Staff">Staff</option>
                    <option value="Execative">Execative</option>
                    <option value="Junior Manager">Juniro Manager</option>
                    <option value="Marketing">Middle Manager</option>
                    <option value="Marketing">Senior manager</option>
                    <option value="Compliance">Key Manager</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Profile Picture:</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>
            <button type="submit" class="btn btn-warning w-100">Edit Record</button>
        </form>
    </div>
</div>
@endSection
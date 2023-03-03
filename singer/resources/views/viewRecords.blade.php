@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row container p-3">
            <div cla>
            <a type="button" class="btn btn-success" href="{{ route('add-record-view')}}">Add Record</a>
            </div>
        </div>
                <form action="{{ route('search-contacts') }}" method="post">
                    @csrf
                    <div class="row container justify-content-center p-4">
                    {{-- <div class="mb-3 col-lg-3 col-sm-10">
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
                    <div class="mb-3 col-lg-3 col-sm-10">
                        <label for="designation" class="form-label">Designation</label>
                        <select name="designation" id="designation" class="form-control">
                            <option value="Staff">Staff</option>
                            <option value="Execative">Execative</option>
                            <option value="Junior Manager">Juniro Manager</option>
                            <option value="Marketing">Middle Manager</option>
                            <option value="Marketing">Senior manager</option>
                            <option value="Compliance">Key Manager</option>
                        </select>
                    </div> --}}
                    <div class="mb-3 col-lg-10 col-sm-10">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" class="form-control" name="search">
                    </div>
                    <div class="mb-3 col-lg-10 col-sm-10">
                        {{-- <label for="search" class="form-label"></label> --}}
                        <button type="submit" class="btn btn-success w-100">Search</button>
                    </div>
                </div>
                </form>
            <div class="row container justify-content-center p-4">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-success" role="alert">
                        {{ session::get('error') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Department</th>
                            <th scope="col">Designation</th>
                            {{-- <th scope="col">Photo</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($records as $rec)
                        <tr>
                            <th scope="row">{{$rec->id}}</th>
                            <td>{{$rec->name}}</td>
                            <td>{{$rec->email}}</td>
                            <td>{{$rec->mobile_no}}</td>
                            <td>{{$rec->department}}</td>
                            <td>{{$rec->designation}}</td>
                            {{-- <td>{{$rec->picture}}</td> --}}
                            <td>
                                <a type="button" class="btn btn-warning" href="{{route('edit-record-view', ['id' => $rec->id])}}">Edit</a>
                                <a type="button" class="btn btn-danger" href="{{ route('delete-record',['id' => $rec->id])}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Search Contacts</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('contacts.search') }}">
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <select id="category" class="form-control" name="category">
                                    <option value="">Select Category</option>
                                    <option value="firstname">First Name</option>
                                    <option value="lastname">Last Name</option>
                                    <option value="email">Email</option>
                                    <option value="gender">Gender</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keyword" class="col-md-4 col-form-label text-md-right">Keyword</label>

                            <div class="col-md-6">
                                <input id="keyword" type="text" class="form-control" name="keyword" value="{{ old('keyword') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>

                            <div class="col-md-6">
                                <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Contacts</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $contact)
                            <tr>
                                <td>{{ $contact->firstname }}</td>
                                <td>{{ $contact->lastname }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->gender }}</td>
                                <td>{{ $contact->created_at }}</td>
</tr>
@endforeach
</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
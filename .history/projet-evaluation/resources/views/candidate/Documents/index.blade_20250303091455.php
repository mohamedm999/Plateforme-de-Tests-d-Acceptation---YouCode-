@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Documents</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Document 1</td>
                    <td>
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-secondary">Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Document 2</td>
                    <td>
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-secondary">Download</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

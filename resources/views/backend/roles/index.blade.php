@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                Roles
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="roles">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('dataTables')
    <script>
        $('#roles').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.roles-dt') !!}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'display_name', name: 'display_name'},
                {data: 'created_at', name: 'created_at'}
            ]
        });
    </script>
@endpush
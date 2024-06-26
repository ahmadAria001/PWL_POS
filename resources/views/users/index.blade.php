@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="" class="col-1 control-label col-form-label">Filter : </label>
                        <div class="col-3">
                            <select name="level_id" id="level_id" class="form-control">
                                <option value="">- Semua -</option>
                                @foreach ($level as $item)
                                    <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm w-100" id="table_user">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level
                            Pengguna
                        </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach ($user as $item) -->
                    <!--     <td>{{ $item->id }}</td> -->
                    <!--     <td>{{ $item->username }}</td> -->
                    <!--     <td>{{ $item->nama }}</td> -->
                    <!--     <td> -->
                    <!--         {{ $item->level->level_nama }} -->
                    <!--     </td> -->
                    <!--     <td>{{ $item->actions }}</td> -->
                    <!-- @endforeach -->
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            let dataUser = $('#table_user').DataTable({
                serverSide: true, // True if we want to use Server side processing
                ajax: {
                    "url": "{{ url('user/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.level_id = $('#level_id').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex", // numbering from laravel datatables addIndexColumn() function
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "username",
                        className: "",
                        orderable: true, // orderable: true, if we want this column is orderable
                        searchable: true, // searchable: true, if we want this column searchable
                    },
                    {
                        data: "nama",
                        className: "",
                        orderable: true, // orderable: true, if we want this column is orderable
                        searchable: true, // searchable: true, if we want this column searchable
                    },
                    {
                        data: "level.level_nama",
                        className: "",
                        orderable: false, // orderable: false, if we want this column not orderable
                        searchable: false // searchable: false, if we want this column not searchable
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false, // orderable: false, if we want this column not orderable
                        searchable: false // searchable: false, if we want this column not searchable
                    }
                ]
            });

            $('#level_id').on('change', function() {
                dataUser.ajax.reload();
            });
        });
    </script>
@endpush

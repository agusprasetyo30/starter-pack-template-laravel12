@extends('layouts.app', ['title' => 'Master Salesman'])

@section('page-title', 'Master Data Salesman')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Salesman</h4>
        </div>
        <div class="card-body">
            {{-- <table class="table table-striped table-hover " id="leaderboard_table" data-table-route="{{ route('admin.leaderboard.datatables') }}"> --}}
                <div class="row mb-2 d-flex align-items-end">
                    <div class="col-md-9">
                        {{-- Dropdown "Show entries" bawaan DataTables --}}
                        {{-- <div id="dataTables-length-placeholder"></div> --}}

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="showMappingData" id="show-mapping-data">
                            <label class="custom-control-label" for="show-mapping-data">Tampilkan yang belum termapping</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="searching">
                            <label for="master_customer_search">
                                Search:
                            </label>
                            <input type="search" class="form-control" name="master_customer_search" aria-controls="master_customer_table">
                        </div>
                    </div>
                </div>
            <div class="table-responsive">
            <table class="table table-striped  table-hover" id="master_salesman_table" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="vertical-align: middle;">No</th>
                        <th style="vertical-align: middle;">Kode BCP</th>
                        <th style="vertical-align: middle;">Kode Reckitt</th>
                        <th style="vertical-align: middle;">Nama Sales</th>
                        <th style="vertical-align: middle;">Kode Supervisor</th>
                        <th style="vertical-align: middle;">Nama Supervisor</th>
                        <th style="vertical-align: middle;">Nama Segment</th>
                        <th style="vertical-align: middle;">Status</th>
                        <th style="vertical-align: middle;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 4; $i++)
                        <tr>
                            <td>1</td>
                            <td>01/26/204205</td>
                            <td>-</td>
                            <td>PT. JOT Indonesia</td>
                            <td>PT. Tuban Jaya Jaya Jaya</td>
                            <td>26/SLR</td>
                            <td>Andana Widanda</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Update</a>
                            </td>
                        </tr>
                    @endfor

                    @for ($j = 0; $j < 5; $j++)
                    <tr>
                        <td>{{ $j }}</td>
                        <td>01/26/204205</td>
                        <td>1313141</td>
                        <td>PT. Pete Pete</td>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>01/26/2000</td>
                        <td>Anwar Adi Setiyono</td>
                        <td><span class="badge badge-danger">Inactive</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Update</a>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection

@push('js-custom')
    <script>
        $(document).ready(function() {
            $('#master_customer_table').DataTable({
                dom: '<"top">rt<"bottom"' + "<'row mt-2'<'col-sm-12 col-md-6'li><'col-sm-12 col-md-6 mt-0'p>>" +
			'>',
                responsive: true,
                // scrollX: true,
                lengthMenu: [5, 10, 25, 50, 100],
                initComplete: function () {
                    // Pindahkan dropdown "Show entries" ke dalam div custom
                    // $('#dataTables-length-placeholder').html($('#customer_table_length'));
                }
                // processing: true,
                // serverSide: true,
            //     ajax: {
            //         url: "route('master.customer.datatables') ",
            //         type: "GET",
            //     },
            //     columns: [
            //         { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            //         { data: 'kode_bcp', name: 'kode_bcp' },
            //         { data: 'kode_reckitt', name: 'kode_reckitt' },
            //         { data: 'perusahaan', name: 'perusahaan' },
            //         { data: 'alamat', name: 'alamat' },
            //         { data: 'kode_segment', name: 'kode_segment' },
            //         { data: 'nama_segment', name: 'nama_segment' },
            //         { data: 'kode_sales', name: 'kode_sales' },
            //         { data: 'nama_sales', name: 'nama_sales' },
            //         { data: 'status', name: 'status' },
            //         { data: 'action', name: 'action' }
            //     ],
            //     order: [[0, "asc"]],
            });
        });

        $("input[name=master_customer_search]").keyup(function(e) {
            e.preventDefault();

            let table = $('#master_customer_table').DataTable()
            table.search($(this).val()).draw()
        })

        $('#show-mapping-data').change(function() {
            // console.log($(this));
            // console.log(this);
            let table = $('#master_customer_table').DataTable()
            if (this.checked) {
                console.log('ini di centang');
                table
                    .column(2)
                    .search('-')
                    .draw();
            } else {
                table
                    .columns()
                    .search('')
                    .draw();
            }
        })

    </script>
@endpush
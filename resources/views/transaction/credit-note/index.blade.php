@extends('layouts.app', ['title' => 'Credit Note'])

@section('page-title', 'Credit Note')

@push('css-library')
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="card card-primary">
    <div class="card-header d-flex justify-content-between">
        <h4>Invoice List</h4>

        <a href="#" class="btn btn-primary note-btn" style="padding: 6px 20px"><i class="fas fa-paper-plane mr-1"></i> Kirim ke Reckitt</a>
    </div>
    <div class="card-body">
        <div class="row mb-2 d-flex align-items-end justify-content-between">
            <div class="col-md-4">
                <label for="range-tanggal-invoice">Range Tanggal</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text h-auto">
                            <i class="fas fa-calendar"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control daterangepicker h-auto" id="range-tanggal-invoice">
                </div>
            </div>
            <div class="col-md-3">
                <div class="searching">
                    <label for="master_customer_search">
                        Search:
                    </label>
                    <input type="search" class="form-control h-auto" name="master_customer_search" aria-controls="master_customer_table">
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover" id="credit_note_table" style="width: 100%;">
            <thead>
                <tr>
                    <th class="no-sort">&nbsp;</th>
                    <th style="vertical-align: middle; min-width: 70px">Kode Nota BCP</th>
                    <th style="vertical-align: middle; min-width: 70px">Invoice Reckitt</th>
                    <th style="vertical-align: middle;">Tanggal</th>
                    <th style="vertical-align: middle; min-width: 100px">Kode Pelanggan BCP</th>
                    <th style="vertical-align: middle; min-width: 60px">Perusahaan</th>
                    <th style="vertical-align: middle; min-width: 70px">Nama Sales</th>
                    <th style="vertical-align: middle; min-width: 90px">Total</th>
                    <th style="vertical-align: middle; min-width: 100px">Alasan</th>
                    <th style="vertical-align: middle;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        </div>
                    </td>
                    <td>01/01/TO/2025/0001</td>
                    <td>12938812</td>
                    <td>2025-04-11</td>
                    <td>01/01/0111</td>
                    <td>PT BLA BLA </td>
                    <td>Sayuti</td>
                    <td>Rp. 128.284.000</td>
                    <td>Tidak Terkirim</td>
                    <td>
                        <span class="badge badge-secondary text-dark">Belum Dikirim</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                          </div>
                    </td>
                    <td>01/01/TO/2025/0001</td>
                    <td>12938812</td>
                    <td>2025-04-11</td>
                    <td>01/01/0111</td>
                    <td>PT BLA BLA </td>
                    <td>Sayuti</td>
                    <td>Rp. 128.284.000</td>
                    <td>Barang Overstock di Toko</td>
                    <td>
                        <span class="badge badge-warning text-dark">Sudah generate SO</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                          </div>
                    </td>
                    <td>01/01/TO/2025/0001</td>
                    <td>12938812</td>
                    <td>2025-04-11</td>
                    <td>01/01/0111</td>
                    <td>PT BLA BLA </td>
                    <td>Sayuti</td>
                    <td>Rp. 128.284.000</td>
                    <td>Tidak Terkirim</td>
                    <td>
                        <span class="badge badge-success">Sudah generate faktur</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js-library')
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap.min.js') }}"></script> --}}
@endpush

@push('js-custom')
    <script>
        $(document).ready(function() {
            $('#credit_note_table').DataTable({
                dom: '<"top">rt<"bottom"' + "<'row mt-2'<'col-sm-12 col-md-6'li><'col-sm-12 col-md-6 mt-0'p>>" +
			'>',
                columnDefs: [
                    {
                        targets: [0],
                        orderable: false,
                        searchable: false,
                    },
                ],
                order: [[1, 'asc']],
                scrollCollapse: true,
                scrollX: true,
                lengthMenu: [5, 10, 25, 50, 100],
                fixedColumns: {
                    left: 1
                },
                // responsive: true,
                // initComplete: function () {
                    // Pindahkan dropdown "Show entries" ke dalam div custom
                    // $('#dataTables-length-placeholder').html($('#customer_table_length'));
                // }
            })
        })
        
        $('#range-tanggal-invoice').daterangepicker({
            locale: {format: 'DD/MM/YYYY'},
            drops: 'down',
            opens: 'right'
        },function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    </script>
@endpush
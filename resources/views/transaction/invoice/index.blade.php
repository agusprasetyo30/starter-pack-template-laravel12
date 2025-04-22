@extends('layouts.app', ['title' => 'Invoice Transaction'])

@section('page-title', 'Invoice')

@push('css-library')
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h4>Invoice List</h4>
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
        <table class="table table-striped table-hover" id="invoice_table" style="width: 100%;">
            <thead>
                <tr>
                    <th style="vertical-align: middle;">No</th>
                    <th style="vertical-align: middle; min-width: 70px">Invoice No Reckitt</th>
                    <th style="vertical-align: middle; min-width: 50px">Invoice No BCP</th>
                    <th style="vertical-align: middle; min-width: 80px">Sales Order No BCP</th>
                    <th style="vertical-align: middle; min-width: 60px">Tanggal</th>
                    <th style="vertical-align: middle; min-width: 60px">Delivery Date</th>
                    <th style="vertical-align: middle;">Kode Pelanggan</th>
                    <th style="vertical-align: middle;">Perusahaan</th>
                    <th style="vertical-align: middle;">Nama Sales</th>
                    <th style="vertical-align: middle; min-width: 85px">Total Bayar</th>
                    <th style="vertical-align: middle;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>01/26/1234</td>
                    <td>01/26/1234</td>
                    <td>01/26/1234</td>
                    <td>2023-01-01</td>
                    <td>2024-01-01</td>
                    <td>01/26/1234</td>
                    <td>PT. Gita uwu</td>
                    <td>Purnomo</td>
                    <td>Rp. 128.284.000</td>
                    <td>
                        <span class="badge badge-secondary text-dark">New</span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>01/26/1234</td>
                    <td>01/26/1234</td>
                    <td>01/26/1234</td>
                    <td>2023-01-01</td>
                    <td>2024-01-01</td>
                    <td>01/26/1234</td>
                    <td>PT. Gita uwu</td>
                    <td>Suci</td>
                    <td>Rp. 128.284.000</td>
                    <td>
                        <span class="badge badge-warning text-dark">Sudah generate SO</span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>01/26/1234</td>
                    <td>01/26/1234</td>
                    <td>01/26/1234</td>
                    <td>2023-01-01</td>
                    <td>2024-01-01</td>
                    <td>01/26/1234</td>
                    <td>PT. Gita uwu</td>
                    <td>Marno</td>
                    <td>Rp. 128.284.000</td>
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
@endpush

@push('js-custom')
    <script>
        $(document).ready(function() {
            

            $('#invoice_table').DataTable({
                dom: '<"top">rt<"bottom"' + "<'row mt-2'<'col-sm-12 col-md-6'li><'col-sm-12 col-md-6 mt-0'p>>" +
			'>',
            // scrollY: "500px",
                scrollCollapse: true,
                scrollX: true,
                // responsive: true,
                // scrollX: true,
                lengthMenu: [5, 10, 25, 50, 100],
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
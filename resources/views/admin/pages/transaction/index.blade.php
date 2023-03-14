@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Data Transaksi</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>No Hp</th>
                                            <th>Alamat</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" method="post" id="myForm">
                    <div class="modal-body">
                        @csrf
                        <input type="number" id="id" name="id" hidden>
                        <div class="form-group">
                            <label for="transaction_status">Status</label>
                            <select name="transaction_status" id="transaction_status" class="form-control">

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="info">

                    </div>
                  <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody class="data">

                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<x-Admin.Datatable />
<x-Admin.Sweetalert />
<x-Admin.Ajaxpost />
@push('scripts')
    <script>
        $(function() {

            function swal(response) {
                if (response.status === 'error') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        text: response.message,
                        showConfirmButton: true,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: response.message,
                        showConfirmButton: true,
                        timer: 1500
                    })
                }
            }

            let otable = $('#dTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.transactions.data') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'created',
                        name: 'created'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'transaction_total',
                        name: 'transaction_total'
                    },
                    {
                        data: 'transaction_status',
                        name: 'transaction_status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $('#myModal #myForm').on('submit', function(e) {
                e.preventDefault();
                let form = $('#myModal #myForm');
                $.ajax({
                    url: '{{ route('admin.transactions.store') }}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: form.serialize(),
                    success: function(response) {
                        swal(response);
                        otable.ajax.reload();
                        $('#myModal').modal('hide');
                    },
                    error: function(response) {
                        let errors = response.responseJSON?.errors
                        $(form).find('.text-danger.text-small').remove()
                        if (errors) {
                            for (const [key, value] of Object.entries(errors)) {
                                $(`[name='${key}']`).parent().append(
                                    `<sp class="text-danger text-small">${value}</sp>`)
                                $(`[name='${key}']`).addClass('is-invalid')
                            }
                        }
                    }
                })
            })

            $('body').on('click', '.btnEdit', function() {
                let id = $(this).data('id');
                let transaction_status = $(this).data('status');
                // console.log(`${id} ${status}`);
                $('#myForm #id').val(id);
                $('#myForm #transaction_status').empty();
                let status = ['PENDING', 'PROCESS', 'SUCCESS', 'FAILED'];
                status.forEach(st => {
                    if (st === transaction_status) {
                        $('#myForm #transaction_status').append(`
                        <option selected value="${st}">${st}</option>
                    `);
                    } else {
                        $('#myForm #transaction_status').append(`
                        <option value="${st}">${st}</option>
                    `);
                    }
                });

                $('#myModal .modal-title').text('Edit Data');
                $('#myModal').modal('show');
            })

            $('body').on('click', '.btnShow', function() {
                let id = $(this).data('id');
                let transaction = transactionDetail(id);
                console.log(transaction.details);
                var xhtml = ``;
                xhtml += `
                        <div class="row">
                        <div class="col-md-6">
                            <ul class="list-inline">
                                <li class="list-item d-flex justify-content-between mb-1">
                                    <span class="font-weight-bold">Kode</span>
                                    <span>${transaction.code}</span>
                                </li>
                                <li class="list-item d-flex justify-content-between mb-1">
                                    <span class="font-weight-bold">Nama</span>
                                    <span>${transaction.name}</span>
                                </li>
                                <li class="list-item d-flex justify-content-between mb-1">
                                    <span class="font-weight-bold">Email</span>
                                    <span>${transaction.email}</span>
                                </li>
                                <li class="list-item d-flex justify-content-between mb-1">
                                    <span class="font-weight-bold">Nomor HP</span>
                                    <span>${transaction.phone_number}</span>
                                </li>
                                <li class="list-item d-flex justify-content-between mb-1">
                                    <span class="font-weight-bold">Alamat</span>
                                    <span>${transaction.address}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-inline">
                                <li class="list-item d-flex justify-content-between mb-1">
                                    <span class="font-weight-bold">Metode Pembayaran</span>
                                    <span>${transaction.payment_detail}</span>
                                </li>
                                <li class="list-item d-flex justify-content-between mb-1">
                                    <span class="font-weight-bold">Status</span>
                                    <span>${transaction.status}</span>
                                </li>
                                <li class="list-item d-flex justify-content-between mb-1">
                                    <span class="font-weight-bold">Total</span>
                                    <span>${transaction.transaction_total}</span>
                                </li>
                                <li class="list-item d-flex justify-content-between mb-1">
                                    <span class="font-weight-bold">Tanggal</span>
                                    <span>${transaction.created}</span>
                                </li>
                                <li class="list-item d-flex justify-content-between mb-1">
                                    <span class="font-weight-bold">User</span>
                                    <span>${transaction.user.name}</span>
                                </li>
                            </ul>
                        </div>
                    </div>`;
                    $('#modalShow .modal-body tbody.data').empty();
                    let no = 1;
                  transaction.details.forEach(detail => {
                    $('#modalShow .modal-body tbody.data').append(`
                        <tr>
                            <td>${no++}</td>
                            <td>${detail.product.name}</td>
                            <td>${detail.product.price}</td>
                            <td>${detail.qty}</td>
                            <td>${detail.product.price * detail.qty}</td>
                        </tr>
                        `);
                  });


                $('#modalShow .modal-body .info').html(xhtml);
                $('#modalShow .modal-title').text('Detail Transaksi');
                $('#modalShow').modal('show');
            })

            $('body').on('click', '.btnDelete', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                let name = $(this).data('name');
                Swal.fire({
                    title: 'Apakah Yakin?',
                    text: `${name} akan dihapus dan tidak bisa dikembalikan!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yakin'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ url('admin/transactions/') }}' + '/' + id,
                            type: 'DELETE',
                            dataType: 'JSON',
                            success: function(response) {
                                swal(response);
                                otable.ajax.reload();
                                $('#myModal').modal('hide');

                            },
                            error: function(response) {
                                swal(response);
                            }
                        })
                    }
                })
            })

            let transactionDetail = function(transaction_id) {
                let data;
                $.ajax({
                    url: '{{ url('admin/transactions/') }}' + '/' + transaction_id,
                    type: 'GET',
                    dataType: 'JSON',
                    async: false,
                    success: function(response) {
                        data = response;
                    }
                })

                return data;
            }

            $('#myModal').on('hidden.bs.modal', function() {
                let form = $('#myModal #myForm');
                $(form).find('.text-danger.text-small').remove();
                $(form).find('.form-control').removeClass('is-invalid');
                form.trigger('reset');
            })
        })
    </script>
@endpush

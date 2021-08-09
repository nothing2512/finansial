<?php
$menu = TAB_SAVING;
$i = 0;
?>
@extends("components.main")

@section("title", "Simpanan Keuangan")
@section("contentTitle", "Simpanan Keuangan")

@section("content")
    <div class="row">

        <div class="card col-12">
            <div class="card-body">
                <table id="saving-table" class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nomor Akun</th>
                        <th>Nama</th>
                        <th>Saldo</th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($savings as $saving)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $saving->accountNumber }}</td>
                            <td>{{ $saving->name }}</td>
                            <td>Rp. {{ number_format($saving->balance) }}</td>
                            <td class="text-right">
                                <button class="btn btn-warning btn-sm"
                                        onclick="showEditModal('{{ json_encode($saving) }}')">
                                    <i class="fas fa-edit"> Edit</i>
                                </button>
                                <button
                                    class="btn btn-danger btn-sm ml-1"
                                    onclick="if(confirm('hapus penyimpanan {{ $saving->name }}?')) window.location.href='{{ route("api.saving.delete", ["id" => $saving->id]) }}'">
                                    <i class="fas fa-trash"> Hapus</i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    <tfoot>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nomor Akun</th>
                        <th>Name</th>
                        <th>Saldo</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    @include("components.modal.saving")
@endsection

@section("script")
    <script>
        function showAddModal() {
            const title = $("#saving-modal-title")
            title.html(title.html().replace("Edit", "Tambah"))

            $("#saving-modal-form").attr('action', "{{ route("api.saving.store") }}")
            $("#saving-modal-form").trigger('reset')
            $("#saving-modal-button").html("Tambah")
            $("#saving-modal").modal('show');
        }

        function showEditModal(data) {
            data = JSON.parse(data);
            const form = $("#saving-modal-form")
            const title = $("#saving-modal-title")

            form.attr('action', "{{ route("api.saving.store") }}/" + data.id.toString())
            title.html(title.html().replace("Tambah", "Edit"))

            $("#saving-modal-name").val(data.name)
            $("#saving-modal-account-number").val(data.accountNumber)
            $("#saving-modal-balance").val(data.balance)
            $("#saving-modal-button").html("Edit")

            $("#saving-modal").modal('show');
        }

        $(function () {
            $('input').inputmask()
            $("#saving-table")
                .DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "columnDefs": [
                        {
                            "targets": [4],
                            "orderable": false,
                            "searchable": false
                        }
                    ],
                    "buttons": [
                        {
                            extend: 'excel',
                            className: 'btn btn-success btn-sm',
                            text: '<i class="fas fa-download"> excel</i>',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'pdf',
                            className: 'btn btn-success btn-sm ml-1',
                            text: '<i class="fas fa-download"> pdf</i>',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            className: "btn btn-info btn-sm ml-1",
                            text: '<i class="fas fa-plus"> Tambah penyimpanan </i>',
                            action: function () {
                                showAddModal()
                            }
                        }
                    ]
                }).buttons()
                .container()
                .appendTo('.col-md-6:eq(0)');
        });
    </script>
@endsection

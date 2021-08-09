<?php $i = 0; ?>
@extends("components.main")

@section("title", "Daftar $title")
@section("contentTitle", "Daftar $title")

@section("content")
    <div class="row">

        <div class="card col-12">
            <div class="card-body">
                <table id="user-table" class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th></th>
                        <th>username</th>
                        <th>nama</th>
                        <th>telepon</th>
                        <th>alamat</th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td class="text-center">
                                <img src="{{ $user->photo != null ? asset($user->photo) : adminlte(DEFAULT_PHOTO) }}"
                                     style="width: 48px; height: 48px"
                                     class="img-circle elevation-2"
                                     alt="User Image">
                            </td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td class="text-right">
                                <button class="btn btn-warning btn-sm"
                                        onclick="showEditModal('{{ json_encode($user) }}')">
                                    <i class="fas fa-user-edit"> Edit</i>
                                </button>
                                <button
                                    class="btn btn-danger btn-sm ml-1"
                                    onclick="if(confirm('hapus akun {{ $user->name }}?')) window.location.href='{{ route("api.user.delete", ["id" => $user->id]) }}'">
                                    <i class="fas fa-trash"> Hapus</i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    <tfoot>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th></th>
                        <th>username</th>
                        <th>nama</th>
                        <th>telepon</th>
                        <th>alamat</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    @include("components.modal.user", ["role" => $role ])

@endsection

@section("script")
    <script>
        function showAddModal() {
            const title = $("#user-modal-title")
            title.html(title.html().replace("Edit", "Tambah"))

            $("#user-modal-form").attr('action', "{{ route("api.user.store") }}")
            $("#user-modal-preview").attr("src", "{{ adminlte(DEFAULT_PHOTO) }}")
            $("#user-modal-form").trigger('reset')
            $("#user-modal-button").html("Tambah")
            $("#user-modal").modal('show');
        }

        function showEditModal(data) {
            const user = JSON.parse(data);
            const form = $("#user-modal-form")
            const title = $("#user-modal-title")

            title.html(title.html().replace("Tambah", "Edit"))
            form.attr('action', "{{ route("api.user.store") }}/" + user.id.toString())

            $("#user-modal-preview").attr("src", user.photo || "{{ adminlte(DEFAULT_PHOTO) }}")
            $("#user-modal-name").val(user.name)
            $("#user-modal-username").val(user.username)
            $("#user-modal-phone").val(user.phone)
            $("#user-modal-address").val(user.address)
            $("#user-modal-button").html("Edit")

            $("#user-modal").modal('show');
        }

        $(function () {
            $("#user-table")
                .DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "columnDefs": [
                        {
                            "targets": [2, 5],
                            "visible": false,
                            "searchable": false
                        },
                        {
                            "targets": [1, 4, 6],
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
                                columns: [0, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'pdf',
                            className: 'btn btn-success btn-sm ml-1',
                            text: '<i class="fas fa-download"> pdf</i>',
                            exportOptions: {
                                columns: [0, 2, 3, 4, 5]
                            }
                        },
                        {
                            className: "btn btn-info btn-sm ml-1",
                            text: '<i class="fas fa-user-plus"> Tambah {{ $title }} </i>',
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

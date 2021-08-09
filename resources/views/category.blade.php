<?php $i = 0; ?>
@extends("components.main")

@section("title", $title)
@section("contentTitle", $title)

@section("content")
    <div class="row">

        <div class="card col-12">
            <div class="card-body">
                <table id="category-table" class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nama kategori</th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($categorys as $category)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-right">
                                @if($menu == TAB_PRODUCT_CATEGORY)
                                    <a href="{{ route("product.category.item", ["id" => $category->id]) }}">
                                        <button class="btn btn-primary btn-sm" >
                                            <i class="fas fa-box"> products</i>
                                        </button>
                                    </a>
                                @endif
                                <button class="btn btn-warning btn-sm"
                                        onclick="showEditModal('{{ json_encode($category) }}')">
                                    <i class="fas fa-edit"> Edit</i>
                                </button>
                                <button
                                    class="btn btn-danger btn-sm ml-1"
                                    onclick="if(confirm('hapus penyimpanan {{ $category->name }}?')) window.location.href='{{ route("api.category.delete", ["id" => $category->id]) }}'">
                                    <i class="fas fa-trash"> Hapus</i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    <tfoot>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    @include("components.modal.category", ["title" => $title, "routeName" => $routeName])
@endsection

@section("script")
    <script>
        function showAddModal() {
            const title = $("#category-modal-title")
            title.html(title.html().replace("Edit", "Tambah"))

            $("#category-modal-form").attr('action', "{{ route("$routeName.store") }}")
            $("#category-modal-form").trigger('reset')
            $("#category-modal-button").html("Tambah")
            $("#category-modal").modal('show');
        }

        function showEditModal(data) {
            data = JSON.parse(data);
            const form = $("#category-modal-form")
            const title = $("#category-modal-title")

            form.attr('action', "{{ route("$routeName.store") }}/" + data.id.toString())
            title.html(title.html().replace("Tambah", "Edit"))

            $("#category-modal-name").val(data.name)
            $("#category-modal-button").html("Edit")

            $("#category-modal").modal('show');
        }

        $(function () {
            $('input').inputmask()
            $("#category-table")
                .DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "columnDefs": [
                        {
                            "targets": [2],
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
                                columns: [0, 1]
                            }
                        },
                        {
                            extend: 'pdf',
                            className: 'btn btn-success btn-sm ml-1',
                            text: '<i class="fas fa-download"> pdf</i>',
                            exportOptions: {
                                columns: [0, 1]
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

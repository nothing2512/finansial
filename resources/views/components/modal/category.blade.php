<div class="modal fade" id="category-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="category-modal-title">Tambah {{ strtolower($title) }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{ route("$routeName.store") }}" enctype="multipart/form-data" method="post"
                          autocomplete="off" id="category-modal-form">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="category-modal-name" type="text" class="form-control" placeholder="Nama"
                                   name="name">
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button id="category-modal-button" type="button" class="btn btn-info"
                        onclick="document.getElementById('category-modal-form').submit()">Tambah
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

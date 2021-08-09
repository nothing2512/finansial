<div class="modal fade" id="saving-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="saving-modal-title">Tambah penyimpanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{ route("api.saving.store") }}" enctype="multipart/form-data" method="post"
                          autocomplete="off" id="saving-modal-form">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="saving-modal-name" type="text" class="form-control" placeholder="Nama"
                                   name="name">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-wallet"></i></span>
                            </div>
                            <input id="saving-modal-account-number" type="number" class="form-control"
                                   placeholder="Nomor akun" name="accountNumber">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas">Rp</i></span>
                            </div>
                            <input id="saving-modal-balance" type="text" class="form-control text-left"
                                   placeholder="Saldo"
                                   data-inputmask='"alias": "currency", "digits": 0' data-mask
                                   name="balance">
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button id="saving-modal-button" type="button" class="btn btn-info"
                        onclick="document.getElementById('saving-modal-form').submit()">Tambah
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

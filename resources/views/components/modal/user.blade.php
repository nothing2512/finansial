<div class="modal fade" id="user-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="user-modal-title">Tambah {{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="{{ route("api.user.store") }}" enctype="multipart/form-data" method="post"
                          autocomplete="off" id="user-modal-form">
                        @csrf

                        <div class="form-group row text-center">
                            <div class="col-2"></div>
                            <img src="{{ adminlte(DEFAULT_PHOTO) }}"
                                 class="img col-8 img-circle center-crop" alt="photo" id="user-modal-preview">
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"
                                       onchange="previewImage(this, 'user-modal-preview')"
                                       id="user-modal-photo" name="photo">
                                <label class="custom-file-label" for="user-modal-photo">Upload foto</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="user-modal-name" type="text" class="form-control" placeholder="Nama" name="name">
                        </div>

                        <div class="input-group mb-3" {{ $role == ADMIN ? '' : 'hidden' }}>
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input id="user-modal-username" type="text" class="form-control" placeholder="Username" name="username">
                        </div>

                        <div class="input-group mb-3" {{ $role == ADMIN ? '' : 'hidden' }}>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input id="user-modal-password" type="password" class="form-control" placeholder="Password" name="password">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input id="user-modal-phone" type="number" class="form-control" placeholder="Nomor telepon" name="phone">
                        </div>

                        <div class="form-group">
                            <label for="user-modal-address">Address</label>
                            <textarea id="user-modal-address" name="address" class="form-control" rows="3"
                                      placeholder="Alamat"></textarea>
                        </div>

                        <input type="hidden" class="form-control" name="role" value="{{ $role }}">

                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button id="user-modal-button" type="button" class="btn btn-info"
                        onclick="document.getElementById('user-modal-form').submit()">Tambah
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="" method="post" class="form-horizontal">
      @csrf
      @method('post')

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row justify-content-center">
            <label for="name" class="col-md-3 col-md-offset-1 control-label">Nama</label>
            <div class="col-md-8">
              <input type="text" name="name" id="name" class="form-control" required autofocus>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group row justify-content-center">
            <label for="email" class="col-md-3 col-md-offset-1 control-label">Email</label>
            <div class="col-md-8">
              <input type="email" name="email" id="email" class="form-control" required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group row justify-content-center">
            <label for="password" class="col-md-3 col-md-offset-1 control-label">Password</label>
            <div class="col-md-8">
              <input type="password" name="password" id="password" class="form-control" 
              required
              minlength="6">
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group row justify-content-center">
            <label for="password_confirmation" class="col-md-3 col-md-offset-1 control-label">Konfirmasi Password</label>
            <div class="col-md-8">
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" 
                required
                data-match="#password">
              <span class="help-block with-errors"></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
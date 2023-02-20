@extends('layouts.master')

@section('title')
	Daftar User
@endsection

@section('breadcrumb')
	@parent
	<li class="breadcrumb-item active">Daftar User</li>
@endsection

@section('content')
	<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <button onclick="addForm('{{ route('user.store') }}')" class="btn btn-success btn-flat" >
              <i class="fa fa-plus-circle"></i>
              Tambah
            </button>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <th width="5%" class="text-center">No.</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th width="15%" class="text-center"><i class="fa fa-cog"></i></th>
              </thead>
            </table>
          </div>
          <!-- ./card-body -->
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->

  @includeIf('user.form')

@endsection

@push('scripts')
  <script type="text/javascript">
    let table;

    $(function () {
      table = $('.table').DataTable({
        processing: true,
        autoWidth: false,
        ajax: {
          url: "{{ route('user.data') }}" 
        },
        columns: [
          {data: 'DT_RowIndex', searchable: false, sortable: false, class: 'text-center'},
          {data: 'name', class: 'text-center'},
          {data: 'email', class: 'text-center'},
          {data: 'aksi', searchable: false, sortable: false, class: 'text-center'},
        ]
      });

      $('#modal-form').validator().on('submit', function (e) {
        if (! e.preventDefault()) {
          $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
            .done((response) => {
              $('#modal-form').modal('hide');
              table.ajax.reload();
            })
            .fail((errors) => {
              alert('Tidak dapat menyimpan data');
              return;
            });
        }
      });
    });

    function addForm(url) {
      $('#modal-form').modal('show');
      $('#modal-form .modal-title').text('Tambah User');
      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action',url);
      $('#modal-form [name=_method]').val('post');
      $('#modal-form [name=name]').focus();

      $('#password, #password_confirmation').attr('required', true);
    }

    function editForm(url) {
      $('#modal-form').modal('show');
      $('#modal-form .modal-title').text('Edit User');
      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action',url);
      $('#modal-form [name=_method]').val('put');
      $('#modal-form [name=name]').focus();

      $('#password, #password_confirmation').attr('required', false);

      $.get(url)
        .done((response) => {
          $('#modal-form [name=name]').val(response.name);
          $('#modal-form [name=email]').val(response.email);
        })
        .fail((response) => {
          alert('Tidak dapat menampilkan data');
          return;
        })
    }

    function deleteData(url) {
      if (confirm('Yakin ingin menghapus data terpilih?')) {
        $.post(url, {
            '_token': $('[name=csrf-token]').attr('content'),
            '_method': 'delete',
          })
          .done((response) => {
            table.ajax.reload();
            alert('Data berhasil dihapus');
            return;
          })
          .fail((errors) => {
            alert('Tidak dapat menghapus data');
            return;
          })
      }      
    }

  </script>
@endpush
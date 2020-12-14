<div class="modal-body">
    <center>
        <p>Yakin ingin menghapus data Jenis Foto <strong>{{ $item->name }}</strong>?</p>
    </center>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    <form action="{{ route('products.destroy', $item->id) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button class="btn btn-danger">
            Delete
        </button>
    </form>
</div>

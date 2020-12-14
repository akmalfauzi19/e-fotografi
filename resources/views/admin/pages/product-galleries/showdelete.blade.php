<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $item->product->name }}</td>
    </tr>
    <tr>
        <th>Photo</th>
        <td>
            <img style="" src="{{ url($item->photo) }}" alt="">
        </td>
    </tr>

</table>

<div class="modal-body">
    <center>
        <p><strong>Yakin ingin menghapus gambar ini?</strong></p>
    </center>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    <form action="{{ route('product-galleries.destroy', $item->id) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button class="btn btn-danger">
            Delete
        </button>
    </form>
</div>

<!-- Modal Edit Image -->
<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editImageModalLabel">Edit Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="editImageForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_image" class="form-label">Upload New Image</label>
                        <input type="file" class="form-control" id="edit_image" name="image">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                    </div>
                    <div class="mb-3">
                        <label for="edit_id_master" class="form-label">Master Image</label>
                        <select class="form-select" id="edit_id_master" name="id_master" required>
                            @foreach ($masterImages as $masterImage)
                                <option value="{{ $masterImage->id }}">{{ $masterImage->nama_master_img }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
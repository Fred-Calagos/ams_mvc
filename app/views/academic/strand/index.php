<div class="container">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/academic"><i class='bx bx-building-house bread-icon'></i> Academic</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/tracks"><i class='bx bx-list-ul bread-icon'></i> Tracks</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Strands</li>
            </ol>
        </nav>
    </div>

    <?php if (isset($trackId)): ?>
        <p>Creating strand for: <strong><?= htmlspecialchars($trackName) ?></strong></p>
        <form action="/strand/store" method="POST">
            <input type="hidden" name="track_id" value="<?= htmlspecialchars($trackId) ?>">
            <label for="strand_name">Strand Name:</label>
            <input type="text" id="strand_name" name="strand_name" required>
            <button type="submit" class="btn btn-primary">
                <i class="bx bx-plus-circle"></i> Add Strand
            </button>
        </form>
    <?php else: ?>
        <p>No Strand ID provided. Please select a strand.</p>
    <?php endif; ?>

    <div id="message-container"></div>
    
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Strand</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($strands as $index => $strand): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($strand['strand_name']) ?></td>
                    <td>
                        <button class="edit-strand btn btn-warning" 
                                data-id="<?= $strand['id'] ?>"
                                data-name="<?= htmlspecialchars($strand['strand_name']) ?>"
                                data-track-id="<?= $strand['track_id'] ?>"
                                data-bs-toggle="modal" data-bs-target="#editStrandModal">
                            <i class="bx bxs-edit"></i> Edit
                        </button>
                        <button class="delete-strand btn btn-danger" 
                                data-id="<?= $strand['id'] ?>"
                                data-name="<?= htmlspecialchars($strand['strand_name']) ?>" 
                                data-bs-toggle="modal" data-bs-target="#deleteStrandModal">
                            <i class="bx bxs-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Edit Strand Modal -->
    <div class="modal fade" id="editStrandModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Strand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editStrandForm">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_strand_id">
                        <input type="hidden" name="track_id" id="edit_track_id">
                        <label for="edit_strand_name">Strand Name:</label>
                        <input type="text" id="edit_strand_name" name="strand_name" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="saveEditedStrand"><i class="bx bx-save"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteStrandModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <strong id="delete_strand_name"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteStrandForm">
                        <input type="hidden" name="id" id="delete_strand_id">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="confirmDeleteStrand"><i class="bx bxs-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Handle Modals -->
<script>
    $(document).ready(function() {
        
        $(document).on('click', '.edit-strand', function(){
            var id = $(this).data('id');
            var strand_name = $(this).data('name');
            var track_id = $(this).data('track-id');

            $('#edit_strand_id').val(id);
            $('#edit_strand_name').val(strand_name);
            $('#edit_track_id').val(track_id);

            $('#editStrandModal').modal('show');
        });

        $('#editStrandForm').submit(function (e) {
            e.preventDefault();

            var trackId = $('#edit_track_id').val();
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "/strand/update?track_id" + trackId,
                data: formData,
                success: function (response) {
                    $('#editStrandModal').modal('hide');
                var message = $('<div class="alert alert-success">Strand Updated Successfully!</div>');

                $('#message-container').html('').append(message);

                setTimeout(function () {
                    message.fadeOut();
                    window.location.href = "/strand?track_id=" + trackId; // Redirect with grade_id
                }, 2000);
            },
            error: function () {
                var message = $('<div class="alert alert-danger">Error updating Strand Name.</div>');

                $('#message-container').html('').append(message);

                setTimeout(function () {
                    message.fadeOut();
                }, 2000);
            }
            });
        });

        $(document).on('click', '.delete-strand', function () {
            var strand_id = $(this).data('id');
            var strand_name = $(this).data('name');

            $('#delete_strand_id').val(strand_id);
            $('#delete_strand_name').text(strand_name);
            $('#deleteStrandModal').modal('show');
        });

        $('#deleteStrandForm').submit(function (e) {
            e.preventDefault();
            var strand_id = $('#delete_strand_id').val();
            $.ajax({
                type: "GET",
                url: "/strand/delete/" + strand_id,
                success: function () {
                    alert("Strand Deleted Successfully!");
                    location.reload();
                },
                error: function () {
                    alert("Error deleting strand.");
                }
            });
        });
    });
</script>

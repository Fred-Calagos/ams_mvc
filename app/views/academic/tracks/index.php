<div class="container">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/academic"><i class='bx bx-building-house bread-icon'></i> Academic</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tracks</li>
            </ol>
        </nav>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#trackModal">
            <i class="bx bx-plus-circle"></i> Add Track
        </button>
    </div>

    <div id="message-container"></div>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Track Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tracks as $index => $track): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $track['track_name'] ?></td>
                    <td>
                        <button class="edit-track btn btn-warning" 
                                data-id="<?= $track['id'] ?>" 
                                data-track-name="<?= $track['track_name'] ?>">
                            <i class="bx bxs-edit"></i> Edit
                        </button>
                        <a href="/strand?track_id=<?= $track['id'] ?>" class="btn btn-primary">
                            <i class="bx bx-plus-circle"></i> Strand
                        </a>
                        <button class="delete-track btn btn-danger" data-id="<?= $track['id'] ?>">
                            <i class="bx bxs-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="modal fade" id="trackModal" tabindex="-1" aria-labelledby="trackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="trackModalLabel">Add Track</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addTrackForm">
                        <div class="mb-3">
                            <label for="trackName" class="form-label">Track Name</label>
                            <input type="text" class="form-control" id="trackName" name="track_name" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="saveTrack"><i class="bx bx-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- EDITING MODAL FOR TRACKS -->
    <div class="modal fade" id="editTrackModal" tabindex="-1" aria-labelledby="editTrackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTrackModalLabel">Edit Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editTrackForm">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editTrackId">
                        <label for="editTrackName">Track Name:</label>
                        <input type="text" id="editTrackName" name="track_name" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="saveEditedTrack"><i class="bx bx-save"></i> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteTrackModal" tabindex="-1" aria-labelledby="deleteTrackModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSectionModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <strong id="delete_section_name"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteSectionForm">
                        <input type="hidden" name="id" id="delete_section_id">
                        <input type="hidden" name="grade_level_id" id="delete_grade_id">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="confirmDeleteSection"><i class="bx bxs-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#saveTrack").click(function(event) {
            event.preventDefault();
            $('#trackModal').modal('hide');

            // Immediately hide the save button (optional, in case you want to disable it before reload)
            $(this).hide();
            $.ajax({
                type: "POST",
                url: "/tracks/store",
                data: $("#addTrackForm").serialize(),
                dataType: "json",
                success: function(response) {
                    var message = $('<div class="alert alert-success">Track Added Successfully!</div>');
                    $('#message-container').html('').append(message);
                    setTimeout(function () {
                        message.fadeOut();
                        location.reload();
                    }, 2000);
                },
                error: function(xhr) {
                    var message = $('<div class="alert alert-danger">Error adding track.</div>');
                    $('#message-container').html('').append(message);
                    setTimeout(function () {
                        message.fadeOut();
                    }, 2000);
                }
            });
        });

        $(document).on('click', '.edit-track', function() {
            $('#editTrackId').val($(this).data('id'));
            $('#editTrackName').val($(this).data('track-name'));
            $('#editTrackModal').modal('show');
        });

        $('#saveEditedTrack').click(function (event) {
            event.preventDefault();
            
            var trackId = $('#editTrackId').val();
            
            $.ajax({
                type: "POST",
                url: "/tracks/update/" + trackId, // Send the ID in the URL
                data: $("#editTrackForm").serialize(),
                dataType: "json",
                success: function (response) {
                    var message = $('<div class="alert alert-success">Track Updated Successfully!</div>');
                    $('#message-container').html('').append(message);

                    $('#editTrackModal').modal('hide');

                    setTimeout(function () {
                        message.fadeOut();
                        location.reload();
                    }, 2000);
                },
                error: function () {
                    var message = $('<div class="alert alert-danger">Error updating track.</div>');
                    $('#message-container').html('').append(message);

                    setTimeout(function () {
                        message.fadeOut();
                    }, 2000);
                }
            });
        });

        $(document).on('click', '.delete-track', function() {
            if (confirm("Are you sure you want to delete this track?")) {
                $.ajax({
                    type: "GET",
                    url: "/tracks/delete/" + $(this).data('id'),
                    success: function(response) {
                        alert("Track Deleted Successfully!");
                        location.reload();
                    },
                    error: function() {
                        alert("Error deleting track.");
                    }
                });
            }
        });
    });
</script>

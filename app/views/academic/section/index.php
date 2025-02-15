
<div class="container">
    <div  class="d-flex align-items-center justify-content-between mb-3">
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/academic"><i class='bx bx-building-house bread-icon'></i> Academic</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/grade"><i class='bx bxs-graduation bread-icon'></i> Grade</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Section</li>
            </ol>
        </nav>
    </div>

    <?php if (isset($grade_id)): ?>
        <p>Creating section for <strong>Grade: <?= htmlspecialchars($grade_name) ?></strong></p>

        <!-- Form to Create a New Section -->
        <form action="/section/store" method="POST">
            <input type="hidden" name="grade_id" value="<?= htmlspecialchars($grade_id) ?>">

            <label for="section_name">Section Name:</label>
            <input type="text" id="section_name" name="section_name" required>
            <button type="submit" class="btn btn-primary" >
            <i class="bx bx-plus-circle"></i> Add Section
        </button>
        </form>
    <?php else: ?>
        <p>No Grade ID provided. Please select a grade.</p>
    <?php endif; ?>

    
    <!-- Message Container -->
    <div id="message-container"></div>
    
    
    <!-- Grade Levels Table -->
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sections as $index => $section): ?>
                <tr>

                    <td><?= $index + 1 ?></td>
                    <td><?= $section['section_name'] ?></td>
                    <td>
                        <!-- Edit Button -->
                        <button class="edit-section btn btn-warning" 
                                data-id="<?= $section['id'] ?>"
                                data-name="<?= htmlspecialchars($section['section_name']) ?>"
                                data-grade-id="<?= $section['grade_level_id'] ?>"
                                data-bs-toggle="modal" data-bs-target="#editSectionModal">
                            <i class="bx bxs-edit"></i> Edit
                        </button>

                        <!-- Delete Button -->
                        <button class="delete-section btn btn-danger" 
                                data-id="<?= $section['id'] ?>"
                                data-grade-id="<?= $section['grade_level_id'] ?>"
                                data-name="<?= htmlspecialchars($section['section_name'])
                                 ?>" 
                                 data-bs-toggle="modal" data-bs-target="#deleteSectionModal"
                                >
                            <i class="bx bxs-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Edit Section Modal -->
<div class="modal fade" id="editSectionModal" tabindex="-1" aria-labelledby="editSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSectionModalLabel">Edit Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editSectionForm">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_section_id">
                    <input type="hidden" name="grade_level_id" id="edit_grade_id">
                    <label for="edit_section_name">Section Name:</label>
                    <input type="text" id="edit_section_name" name="section_name" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" id="saveEditedSection"><i class="bx bx-save"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteSectionModal" tabindex="-1" aria-labelledby="deleteSectionModalLabel" aria-hidden="true">
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

<!-- JavaScript to Handle Modals -->
<script>
    $(document).ready(function() {
    $(document).on('click', '.edit-section', function(){
        var id = $(this).data('id');
        var grade_id = $(this).data('grade-id');
        var edit_section_name = $(this).data('name');

        $('#edit_section_id').val(id);
        $('#edit_grade_id').val(grade_id);
        $('#edit_section_name').val(edit_section_name);

        $('#editSectionModal').modal('show');
    });

    $('#editSectionForm').submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        var grade_id = $('#edit_grade_id').val(); // Get grade_id
        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            type: "POST",
            url: "/section/update?grade_id=" + grade_id, // Keep grade_id in URL
            data: formData,
            success: function (response) {
                var message = $('<div class="alert alert-success">Section Updated Successfully!</div>');

                $('#message-container').html('').append(message);

                setTimeout(function () {
                    message.fadeOut();
                    window.location.href = "/section?grade_id=" + grade_id; // Redirect with grade_id
                }, 2000);
            },
            error: function () {
                var message = $('<div class="alert alert-danger">Error updating Section Name.</div>');

                $('#message-container').html('').append(message);

                setTimeout(function () {
                    message.fadeOut();
                }, 2000);
            }
        });
    });
    
    $(document).on('click', '.delete-section', function () {
    var section_id = $(this).data('id');
    var grade_id = $(this).data('grade-id');
    var section_name = $(this).data('name');

    $('#delete_section_id').val(section_id);
    $('#delete_grade_id').val(grade_id);
    $('#delete_section_name').text(section_name);
    $('#deleteSectionModal').modal('show'); // Open modal
});
    
    $('#deleteSectionForm').submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        var grade_id = $('#delete_grade_id').val(); // Get grade_id
        var section_id = $('#delete_section_id').val(); // Get section_id
        $.ajax({
    type: "GET",
    url: "/section/delete/" + section_id, 
    dataType: "json",
    success: function (response) {
        if (response.success) { // ✅ Now it correctly checks for success
            var message = $('<div class="alert alert-success">Section Deleted Successfully!</div>');
            $('#message-container').html('').append(message);
            $('#deleteSectionModal').modal('hide'); // Hide modal
            
            setTimeout(function () {
                    message.fadeOut();
                    window.location.href = "/section?grade_id=" + grade_id; // Redirect with grade_id
                }, 2000);
        } else {
            var message = $('<div class="alert alert-danger">' + response.message + '</div>');
            $('#message-container').html('').append(message);
            setTimeout(function () {
                message.fadeOut();
            }, 2000);
        }
    },
    error: function () {
        var message = $('<div class="alert alert-danger">Server error occurred.</div>');
        $('#message-container').html('').append(message);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
    }
});

            });

});
</script>





</div>



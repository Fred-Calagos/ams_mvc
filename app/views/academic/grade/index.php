<div class="container">
    <!-- Navigation and Button Container -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/academic"><i class='bx bx-building-house bread-icon'></i> Academic</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Grade Level</li>
            </ol>
        </nav>

        <!-- Add Grade Button -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gradeModal">
            <i class="bx bx-plus-circle"></i> Add Grade
        </button>
    </div>

    <!-- Message Container -->
    <div id="message-container"></div>

    <!-- Grade Levels Table -->
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Grade Level</th>
                <th>Grade Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grades as $index => $grade): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $grade['grade_level'] ?></td>
                    <td><?= $grade['acad_cat'] ?></td>
                    <td>
                    <button class="edit-grade btn btn-warning" 
                            data-id="<?= $grade['id'] ?>" 
                            data-grade-level="<?= $grade['grade_level'] ?>" 
                            data-grade-category-id="<?= $grade['acad_cat_id'] ?>" 
                            data-grade-category-name="<?= $grade['acad_cat'] ?>">
                        <i class="bx bxs-edit"></i> Edit
                    </button>
                    <a href="/section?grade_id=<?= $grade['id'] ?>" class="btn btn-primary">
                        <i class="bx bx-plus-circle"></i> Section
                    </a>
                        <button class="delete-grade btn btn-danger" data-id="<?= $grade['id'] ?>">
                            <i class="bx bxs-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal for Adding Grade Level -->
    <div class="modal fade" id="gradeModal" tabindex="-1" aria-labelledby="gradeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gradeModalLabel">Add Grade Level</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addGradeForm">
                        <div class="mb-3">
                            <label for="gradeLevel" class="form-label">Grade Level</label>
                            <input type="text" class="form-control" id="gradeLevel" name="grade_level" placeholder="Enter Grade Level" required>
                        </div>
                        <div class="mb-3">
                            <label for="gradeCategory" class="form-label">Grade Category</label>
                            <select class="form-select" id="gradeCategory" name="acad_cat_id">
                            <?php foreach ($acadCategories as $category): ?>
                                <option value="<?= $category['id'] ?>"><?= $category['acad_cat'] ?></option>
                            <?php endforeach; ?>
                        </select>

                        </div>

                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="saveGrade"><i class="bx bx-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Grade Level Modal -->
    <div class="modal fade" id="editGradeModal" tabindex="-1" aria-labelledby="editGradeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGradeModalLabel">Edit Grade Level</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editGradeForm">
                        <input type="hidden" id="editGradeId" name="id">
                        <div class="mb-3">
                            <label for="editGradeLevel" class="form-label">Grade Level</label>
                            <input type="text" class="form-control" id="editGradeLevel" name="grade_level" required>
                        </div>
                        <div class="mb-3">
                            <label for="editGradeCategory" class="form-label">Grade Category</label>
                            <select class="form-select" id="editGradeCategory" name="acad_cat_id">
                                <?php foreach ($acadCategories as $category): ?>
                                    <option value="<?= $category['id'] ?>" selected><?= $category['acad_cat'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveEditedGrade"><i class="bx bx-save"></i> Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#saveGrade").click(function(event) {
        event.preventDefault(); // Prevent default form submission
        
        $.ajax({
            type: "POST",
            url: "/grade/store", // Ensure this route is correct
            data: $("#addGradeForm").serialize(),
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    alert("Grade Level Added Successfully!");
                    location.reload();
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert("Error adding grade level. Check console for details.");
            }
        });
    });
        
        $(document).on('click', '.edit-grade', function() {
        var id = $(this).data('id');
        var gradeLevel = $(this).data('grade-level');
        var acadCatId = $(this).data('grade-category-id');
        var acadCatName = $(this).data('grade-category-name'); // Get category name

        $('#editGradeId').val(id);
        $('#editGradeLevel').val(gradeLevel);

        // Set the correct category in the dropdown
        $('#editGradeCategory').val(acadCatId);

        // Show modal
        $('#editGradeModal').modal('show');
    });



    $('#saveEditedGrade').click(function () {
        $.ajax({
            type: "POST",
            url: "/grade/update",
            data: $("#editGradeForm").serialize(),
            success: function (response) {
                // Create the success message
                var message = document.createElement('div');
                message.classList.add('alert', 'alert-success');
                message.textContent = "Grade Level or Category Updated Successfully!";

                // Insert the message above the table
                var messageContainer = document.getElementById('message-container');
                messageContainer.innerHTML = ''; // Clear previous messages
                messageContainer.appendChild(message);

                // Hide modal
                $('#editGradeModal').modal('hide');

                // After 2 seconds, hide the message and reload the page
                setTimeout(function () {
                    message.style.display = 'none';
                    location.reload();
                }, 2000);
            },
            error: function () {
                // Create the error message
                var message = document.createElement('div');
                message.classList.add('alert', 'alert-danger');
                message.textContent = "Error updating grade level.";

                // Insert the message above the table
                var messageContainer = document.getElementById('message-container');
                messageContainer.innerHTML = ''; // Clear previous messages
                messageContainer.appendChild(message);

                // After 2 seconds, hide the message
                setTimeout(function () {
                    message.style.display = 'none';
                }, 2000);
            }
        });
    });

        $(document).on('click', '.delete-grade', function () {
            if (confirm("Are you sure you want to delete this grade level?")) {
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "/grade/delete/" + id,
                    success: function (response) {
                        // Create success message
                        var message = document.createElement('div');
                        message.classList.add('alert', 'alert-success');
                        message.textContent = "Grade Level Deleted Successfully!";

                        var messageContainer = document.getElementById('message-container');
                        messageContainer.innerHTML = ''; // Clear previous messages
                        messageContainer.appendChild(message);

                        // After 2 seconds, hide message and reload
                        setTimeout(function () {
                            message.style.display = 'none';
                            location.reload();
                        }, 2000);
                    },
                    error: function () {
                        // Create error message
                        var message = document.createElement('div');
                        message.classList.add('alert', 'alert-danger');
                        message.textContent = "Error deleting grade level.";

                        var messageContainer = document.getElementById('message-container');
                        messageContainer.innerHTML = ''; // Clear previous messages
                        messageContainer.appendChild(message);

                        // After 2 seconds, hide message
                        setTimeout(function () {
                            message.style.display = 'none';
                        }, 2000);
                    }
                });
            }
        });
    });
</script>

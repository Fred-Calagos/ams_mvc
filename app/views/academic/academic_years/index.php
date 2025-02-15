<div class="container">
<!-- Navigation and Button Container -->
<div class="d-flex align-items-center justify-content-between mb-3">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="/academic"><i class='bx bx-building-house bread-icon'></i> Academic</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Academic Years</li>
        </ol>
    </nav>

    <!-- Add Year Button -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#yearModal">
        <i class="bx bx-plus-circle"></i> Add Year
    </button>
</div>


    <!-- Academic Year Table -->
    <div id="message-container"></div>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Start Year</th>
                <th>End Year</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($academicYears as $index => $year): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $year['start_year'] ?></td>
                    <td><?= $year['end_year'] ?></td>
                    <td><span class="badge bg-<?= $year['status'] == 'Active' ? 'success' : 'danger' ?>">
                        <?= $year['status'] ?>
                    </span></td>
                    <td>
                        <button class="edit-year btn btn-warning" data-id="<?= $year['id'] ?>" data-start-year="<?= $year['start_year'] ?>" data-end-year="<?= $year['end_year'] ?>" data-status="<?= $year['status'] ?>">
                            <i class="bx bxs-edit"></i> Edit
                        </button>
                        <button class="delete-year btn btn-danger" data-id="<?= $year['id'] ?>" data-start-year="<?= $year['start_year'] ?>" data-end-year="<?= $year['end_year'] ?>">
                            <i class="bx bxs-trash"></i> Delete
                        </button>
                    </td>


                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal for Adding Academic Year -->
    <div class="modal fade" id="yearModal" tabindex="-1" aria-labelledby="yearModalLabel" aria-hidden="true">
        <div class="modal-dialog te">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="yearModalLabel">Add Year</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addYearForm">
                        <div class="mb-3">
                            <label for="startYear" class="form-label">Start Year</label>
                            <input type="number" class="form-control" id="startYear" name="start_year" placeholder="Enter Start Year" required>
                        </div>
                        <div class="mb-3">
                            <label for="endYear" class="form-label">End Year</label>
                            <input type="number" class="form-control" id="endYear" name="end_year" placeholder="Enter End Year" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="saveYear"><i class="bx bx-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Academic Year Modal -->
    <div class="modal fade" id="editYearModal" tabindex="-1" aria-labelledby="editYearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editYearModalLabel">Edit Academic Year</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editYearForm">
                        <input type="hidden" id="editYearId" name="id">
                        <div class="mb-3">
                            <label for="editStartYear" class="form-label">Start Year</label>
                            <input type="number" class="form-control" id="editStartYear" name="start_year" placeholder="Enter Start Year" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEndYear" class="form-label">End Year</label>
                            <input type="number" class="form-control" id="editEndYear" name="end_year" placeholder="Enter End Year" required>
                        </div>
                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select class="form-select" id="editStatus" name="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveEditedYear"><i class="bx bx-save"></i> Save Changes</button>
                </div>
            </div>
        </div>
    </div>

<!-- Delete Academic Year Modal -->
<div class="modal fade" id="deleteYearModal" tabindex="-1" aria-labelledby="deleteYearModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteYearModalLabel">Delete Academic Year</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this academic year?</p>
                <p id="deleteYearInfo"></p>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteYear">Delete</button>
            </div>
        </div>
    </div>
</div>

</div>

<script>
    $(document).ready(function() {
        $("#saveYear").click(function() {
            // Hide the modal immediately after the save button is clicked (without fade effect)
            $('#yearModal').modal('hide');

            // Immediately hide the save button (optional, in case you want to disable it before reload)
            $(this).hide();

            $.ajax({
                type: "POST",
                url: "/academic_years/store",
                data: $("#addYearForm").serialize(),
                success: function(response) {
                    // Create the success message
                    var message = document.createElement('div');
                    message.classList.add('alert', 'alert-success');
                    message.textContent = "Academic Year Added Successfully";

                    // Insert the message above the table
                    var messageContainer = document.getElementById('message-container');
                    messageContainer.appendChild(message);

                    // After 2 seconds, hide the message
                    setTimeout(function() {
                        message.style.display = 'none';
                    }, 2000); // 2000ms = 2 seconds
                    
                    // Reload the page after 2 seconds to allow the success message to be visible
                    setTimeout(function() {
                        location.reload();
                    }, 1000); // Delay reload to let the success message be visible
                },
                error: function() {
                    // Create the error message
                    var message = document.createElement('div');
                    message.classList.add('alert', 'alert-danger');
                    message.textContent = "Error saving data";

                    // Insert the message above the table
                    var messageContainer = document.getElementById('message-container');
                    messageContainer.appendChild(message);

                    // After 2 seconds, hide the message
                    setTimeout(function() {
                        message.style.display = 'none';
                    }, 2000); // 2000ms = 2 seconds
                    
                    // Optionally, you can show the save button again if needed
                    setTimeout(function() {
                        $("#saveYear").show();  // Show the button again after the error message disappears
                    }, 1000);
                }
            });
        });
    });

     $(document).on('click', '.edit-year', function() {
        var id = $(this).data('id'); // Get the ID from the data-id attribute
        var startYear = $(this).data('start-year');
        var endYear = $(this).data('end-year');
        var status = $(this).data('status');

        // Pre-fill the form fields in the Edit Modal
        $('#editYearId').val(id);
        $('#editStartYear').val(startYear);
        $('#editEndYear').val(endYear);
        $('#editStatus').val(status);

        // Show the Edit Modal
        $('#editYearModal').modal('show');
    });

    $('#saveEditedYear').click(function() {
        $.ajax({
            type: "POST",
            url: "/academic_years/update",  // Ensure this route matches your routes.php file
            data: $("#editYearForm").serialize(),  // Serialize form data
            success: function(response) {
                // Close the modal and refresh the page
                $('#editYearModal').modal('hide');
                location.reload();  // Refresh the page to show updated data
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);  // Log error details for debugging
                alert("Error saving changes.");
            }
        });
    });
    
    $(document).on('click', '.delete-year', function() {
    var id = $(this).data('id'); // Get the ID from the delete button
    var startYear = $(this).data('start-year');
    var endYear = $(this).data('end-year');

    console.log("Delete button clicked. ID:", id); // Debugging

    if (!id) {
        alert("Error: No ID found.");
        return;
    }

    // Display the selected academic year's information in the Delete Modal
    $('#deleteYearInfo').text('Start Year: ' + startYear + ', End Year: ' + endYear);

    // Store the ID in the confirmation button
    $('#confirmDeleteYear').data('id', id); 

    // Show the Delete Modal
    $('#deleteYearModal').modal('show');
});

    $('#confirmDeleteYear').click(function() {
    var id = $(this).data('id'); // Get the stored ID

    console.log("Deleting Academic Year with ID:", id); // Debugging: Check if ID is correct

    if (!id) {
        alert("Error: No ID found.");
        return;
    }

    $.ajax({
        type: "GET",
        url: "/academic_years/delete/" + id,  // Ensure ID is included
        success: function(response) {
            console.log("Delete successful:", response); // Debugging
            $('#deleteYearModal').modal('hide');
            location.reload();
        },
        error: function(xhr) {
            console.log("Server Error:", xhr.responseText); // Debugging: Log any server errors
            alert("Error deleting the academic year.");
        }
    });
});



</script>
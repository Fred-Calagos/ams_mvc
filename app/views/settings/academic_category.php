<div class="container">
    <!-- Navigation and Button Container -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/academic"><i class='bx bx-building-house bread-icon'></i> Academic</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Academic Levels</li>
            </ol>
        </nav>

        <!-- Add Academic Level Button -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#academicCategoryModal">
            <i class="bx bx-plus-circle"></i> Add Academic Category
        </button>
    </div>

    <!-- Message Container -->
    <div id="message-container"></div>

    <!-- Academic Level Table -->
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Academic Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($academicCategrories as $index => $academicCategrory): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $academicCategrory['acad_cat'] ?></td>
                    <td>    
                        <button class="edit-category btn btn-warning" 
                                data-id="<?= $academicCategrory['id'] ?>" 
                                data-academic-category="<?= $academicCategrory['acad_cat'] ?>">
                            <i class="bx bxs-edit"></i> Edit
                        </button>
                        <button class="delete-category btn btn-danger" 
                                data-id="<?= $academicCategrory['id'] ?>">
                            <i class="bx bxs-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal for Adding Academic Level -->
    <div class="modal fade" id="academicCategoryModal" tabindex="-1" aria-labelledby="academicLevelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="academicLevelModalLabel">Add Academic Categroy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addAcadCategoryForm">
                        <div class="mb-3">
                            <label for="academicCategory" class="form-label">Academic Category</label>
                            <input type="text" class="form-control" id="academicCategory" name="acad_cat" placeholder="Enter Academic Level" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="saveAcadCategory"><i class="bx bx-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Academic Level Modal -->
    <div class="modal fade" id="editAcademicCategoryModal" tabindex="-1" aria-labelledby="editLevelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLevelModalLabel">Edit Academic Level</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAcademicCategoryForm">
                        <input type="hidden" id="editAcadCatId" name="id">
                        <div class="mb-3">
                            <label for="editAcademicCategory" class="form-label">Academic Level</label>
                            <input type="text" class="form-control" id="editAcademicCategory" name="acad_cat" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveEditedCategory"><i class="bx bx-save"></i> Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#saveAcadCategory").click(function() {
            $('#academicCategoryModal').modal('hide');

            $.ajax({
                type: "POST",
                url: "/academic_category/store",
                data: $("#addAcadCategoryForm").serialize(),
                success: function(response) {
                    alert("Academic Level Added Successfully!");
                    location.reload();
                },
                error: function() {
                    alert("Error adding academic category.");
                }
            });
        });

        $(document).on('click', '.edit-category', function() {
            var id = $(this).data('id');
            var academicCategory = $(this).data('academic-category');

            $('#editAcadCatId').val(id);
            $('#editAcademicCategory').val(academicCategory);

            $('#editAcademicCategoryModal').modal('show');
        });

        $('#saveEditedCategory').click(function() {
            $.ajax({
                type: "POST",
                url: "/academic_category/update",
                data: $("#editAcademicCategoryForm").serialize(),
                success: function(response) {
                    alert("Academic Category Updated Successfully!");
                    $('#editAcademicCategoryModal').modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    alert("Error updating academic category.");
                }
            });
        });

        $(document).on('click', '.delete-category', function() {
            if (confirm("Are you sure you want to delete this academic category?")) {
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "/academic_category/delete/" + id,
                    success: function(response) {
                        alert("Academic Level Deleted Successfully!");
                        location.reload();
                    },
                    error: function(xhr) {
                        alert("Error deleting academic level.");
                    }
                });
            }
        });
    });
</script>

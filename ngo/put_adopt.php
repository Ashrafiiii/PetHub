<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Put Up for Adoption</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Put Up for Adoption</h2>
                        <!-- Use post method and action attribute for standard form submission -->
                        <form id="adoptionForm" class="form-group" method="post" action="process_adoption.php" enctype="multipart/form-data">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>

                            <label for="age">Age:</label>
                            <input type="text" name="age" id="age" class="form-control" required>

                            <label for="species">Species:</label>
                            <input type="text" name="species" id="species" class="form-control" required>

                            <label for="breed">Breed:</label>
                            <input type="text" name="breed" id="breed" class="form-control" required>

                            <label for="vaccination_status">Vaccination Status:</label>
                            <input type="text" name="vaccination_status" id="vaccination_status" class="form-control" required>

                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>

                            <label for="special_needs">Special Needs:</label>
                            <select name="special_needs" id="special_needs" class="form-control" required>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                            <label for="special_description">Special Needs Description:</label>
                            <textarea name="special_description" id="special_description" class="form-control" rows="3"></textarea>
                            <label for="photo">Photo:</label>
                            <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
                            <img id="preview" class="mt-2 mb-2" alt="Preview" style="max-width: 100%; display: none;">

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Function to display a preview of the selected photo
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();
            const preview = document.getElementById('preview');

            reader.onload = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }

        // Attach the previewImage function to the change event of the photo input
        $(document).ready(function() {
            $("#photo").change(function(event) {
                previewImage(event);
            });
        });
    </script>
</body>
</html>

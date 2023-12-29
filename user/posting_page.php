<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your styles and Bootstrap links here -->
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="process_post.php" class="form-group" enctype="multipart/form-data">
                <h2 class="text-center">Upload Photo/Video</h2>

                <div class="form-group">
                    <label for="photo_video">Choose Photo/Video</label>
                    <label for="photo_video" class="d-block text-center" style="cursor: pointer;">
                        <img id="preview" class="profile_picture mx-auto d-block" src="" alt="Preview">
                        Click to Upload
                    </label>
                    <input id="photo_video" type="file" name="photo_video" style="display: none;" onchange="previewImage(event)">
                </div>

                <div class="form-group">
                    <label for="caption">Caption</label>
                    <input type="text" id="caption" name="caption" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="upload">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add your scripts and Bootstrap JS links here -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        const preview = document.getElementById('preview');

        reader.onload = function(){
            const dataURL = reader.result;
            preview.src = dataURL;
        }

        reader.readAsDataURL(input.files[0]);
    }
</script>

</body>
</html>

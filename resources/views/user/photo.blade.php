@include('user.head')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.profile-upload-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h2 {
    color: #333;
}

.preview-container {
    margin-bottom: 20px;
}

.preview-image {
    max-width: 100%;
    max-height: 200px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.file-input-container {
    margin-bottom: 20px;
}

.file-label {
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
}

#profileImage {
    display: none;
}

.upload-button {
    background-color: #28a745;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

</style>

@include('user.navbar')

@include('user.header')

@include('sweetalert::alert')
<br>
<br>
<br>





            <div class="profile-upload-container">
                <h2>Profile Information</h2>
                <form id="profileUploadForm" method="POST" action="{{ route('profile.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="preview-container">
                        @if($user->profile_image)
                            <img src="{{ asset('uploads/profiles/' . $user->profile_image) }}" alt="Profile Preview" id="previewImage" class="preview-image">
                        @else
                            <img src="asset/images/faces/face1.jpg" alt="Profile Preview" id="previewImage" class="preview-image" style="display: none;">
                        @endif
                    </div>
                    <div class="file-input-container">
                        <label for="profileImage" class="file-label">Choose Image</label>
                        <input type="file" id="profileImage" name="profileImage" accept="image/*" onchange="previewFile()">
                    </div>
                    <button type="submit" class="upload-button">Upload</button>
                </form>
                @if($user->profile_image)
                    <form method="POST" action="{{ route('profile.deleteImage') }}" style="margin-top: 20px;">
                        @csrf
                        <button type="submit" class="delete-button">Delete Profile Image</button>
                    </form>
                @endif
            </div>
        
            <script>
                function previewFile() {
                    var preview = document.getElementById('previewImage');
                    var fileInput = document.getElementById('profileImage');
                    var file = fileInput.files[0];
        
                    var reader = new FileReader();
        
                    reader.onloadend = function () {
                        preview.src = reader.result;
                        preview.style.display = 'block';
                    };
        
                    if (file) {
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = '';
                        preview.style.display = 'none';
                    }
                }
            </script>








          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">

            </div>
          </footer>

        @include('user.footer')
      
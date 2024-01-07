<div class="field">

    <label for="image">
        Image
    </label>

    <div id="formInputImage">
        <div id="selectedImageFrame" class="hidden">
            <img src="#" alt="Preview Uploaded Image" id="file-preview">
        </div>

        <button id="uploadButton" type="button" class="btn" onclick="document.getElementById('imageInput').click()" >
            <i class="fa-regular fa-image mr-2"></i> 
            <span id="browseText">Select image</span>
        </button>

        <input aria-describedby="image_help" id="imageInput" name="image" type="file" class="hidden">
                    
    </div>

    <script>
        document.getElementById("imageInput").onchange = function(e) {
            document.querySelector('#browseText').innerHTML='Change image';
            document.querySelector('#selectedImageFrame').classList.remove('hidden');

            const file = e.target.files;
                            
            if(file){
                const fileReader = new FileReader();
                const preview = document.getElementById('file-preview');
                fileReader.onload = function (event) {
                    preview.setAttribute('src', event.target.result);
                    console.log(event.target.result);
                }
                fileReader.readAsDataURL(file[0]);
            }
                        
        };
    </script>

</div>
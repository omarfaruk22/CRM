   <script>
       $("#fancy-file-upload").FancyFileUpload({
           params: {
               action: "fileuploader",
           },
           maxfilesize: 1000000,
       });
   </script>
   <script>
       $(document).ready(function() {
           $("#image-uploadify").imageuploadify();
       });
   </script>

   <div class="row">
       <div class="col-xl-9 mx-auto">
           <h6 class="mb-0 text-uppercase">Fancy File Upload</h6>
           <hr />
           <div class="card">
               <div class="card-body">
                   <input id="fancy-file-upload" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png"
                       multiple />
               </div>
           </div>
       </div>
   </div>

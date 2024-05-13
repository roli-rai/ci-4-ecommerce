<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourist Spots - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('include/nav.php'); ?>



         
    <div class="container my-2 p-2">
        <div class="row justify-content-center p-2"> 
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title text-center">Upload Form</h2>

                        <?php if(isset($validation)): ?>
                            <div style="color: red;">
                                <?= \Config\Services::validation()->listErrors() ?>
                            </div>
                        <?php endif; ?>

                        <!-- Image upload form -->
                        <form action="<?php  echo base_url('upload') ?>" method="post" enctype="multipart/form-data">
                            <div>
                                <label for="images" class="form-label"> Images</label>
                                <input type="file"  class="file_upload form-control" name="userfile" multiple=""/><br> 
                            </div>
                        <!-- </form>
                        <form action="<?php // echo base_url('uploadvideo') ?>" method="post" enctype="multipart/form-data">
 -->
                            <div>
                                <label for="videos" class="form-label">Videos</label>
                                <input type="file" class="file_upload form-control" name="videofile" multiple accept="video/*"/><br> 
                            </div>
                            <div class="  text-center">                                                          
                                <input type="submit" name="submit" class="btn btn-success btn-block m-1  form-control"  value="Upload" multiple=""/>                       
                            </div>                        
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</body>
</html>


 
<?php
    include("../../path.php");  
    include(ROOT_PATH . "/app/database/controller/posts.php");
    // adminOnly();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/awesome-font/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/public.css" type="text/css">
    <script src="../../assets/Javascript/jquery-library.js"></script>
    <script src="../../assets/Javascript/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->
    <title>Admin Dashboard -- Add Posts</title>
  <title></title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- Page Container -->
  <div class="page-wrapper">
  <?php include(ROOT_PATH . "/app/includes/sidebar.php"); ?>
    <div class="page-content">
      <div class="admin-container">
        <form action="" method="post" class="admin-form md-box" enctype="multipart/form-data">
          <h1 class="center">Create Post</h1>
          <?php include(ROOT_PATH . '/app/helpers/formErrors.php'); ?>
         
          <div class="input-group">
            <label for="title">Title</label>
            <input type="text" value="<?php echo $title ?>" name="title" id="title" class="input-control" />
          </div>

          <div class="input-group">
            <label for="post-editor">Body</label>
            <textarea name="body" value="<?php echo $body ?>" id="body" class="input-control"><?php echo $body ?></textarea>
          </div>

          <div class="post-details">
            <div class="select-topic-wrapper">
              <div class="input-group">
                <label for="topic">Topic</label>
                <select name="topic_id" id="topic" class="input-control">
                  <option value="" selected>Select Topic</option>
                  <?php
                    foreach ($topics as $key => $topic) {
                      if($topicCount['name'] !== $topic['name']){
                    ?>
                    <option value="<?php echo $topic['id']; ?>"> <?php echo $topic['name']; ?> </option>
                    <?php
                    }
                      }
                    ?>
                </select>
              </div>
            </div>

            <div class="image-wrapper">
              <input type="file" value="<?php echo $image ?>" name="image" id="" class="hide image-input" />
              <button type="button" class="image-btn bg-image">
                <span class="choose-image-label">
                  <i class="fa fa-image" style="margin-right: 5px"></i> Choose
                  image
                </span>
              </button>
            </div>
          </div>

          <div class="input-group">
              <?php
                  if(empty($published)){
              ?>
              <label for="">
              <input type="checkbox" name="published" ></input>
              Publish</label>
              <?php
                  }else{
              ?>
              <label for="">
              <input type="checkbox" name="published" checked></input>
              Publish</label>
              
              <?php
                  }
              ?>
            </div>

          <div class="input-group">
            <button class="btn primary-btn big-btn" type="submit" name="add-post">
              <i class="fa fa-upload"></i> Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- //Page Container -->





  <script>
    // Preview Post Image
    const imageBtn = document.querySelector(".image-btn");
    const imageInput = document.querySelector(".image-input");
    const chooseImageLabel = document.querySelector(".choose-image-label");

    imageBtn.addEventListener("click", function () {
      imageInput.click();
    });

    imageInput.addEventListener("change", function () {
      const file = imageInput.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          imageBtn.style.backgroundImage = `url(${e.target.result})`;
          imageBtn.style.height = '150px';
          imageBtn.style.backgroundImage = `url(${e.target.result})`;
          imageBtn.style.height = `150px`;
          imageBtn.style.border = `none`;
          imageBtn.style.border = `none`;
          chooseImageLabel.classList.toggle(".hide");
        }
        reader.readAsDataURL(file);
      };
    });
  </script>
 <script src="../../assets/ckeditor5-build-classic/ckeditor.js"></script>
  <script src="../../assets/Javascript/ckeditor-script.js"></script>
  <script src="../../assets/Javascript/aos.js"></script>
</body>




</html>
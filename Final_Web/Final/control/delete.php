<?php include("./includes/head.php"); ?>
      <?php
        $msg = '';
        if(isset($_GET["type"])){
          $type = $_GET['type'];
          if($type == 'filters'){
            if(isset($_GET["id"])){
              $id = $_GET["id"];
              if(DB::query("SELECT 1 FROM {$type} WHERE id=:id",array(':id'=>$id))){
                if(isset($_GET["confirm"])){
                  $msg = '<div class="success"> تم حذف التسجيل</div>';
                  DB::query("DELETE FROM {$type} WHERE id=:id",array(':id'=>$id));
                }
              }else{
                $msg = '<div class="warn">هذا التسجيل غير موجود</div>';
              }
            }else{
              $msg = '<div class="warn"> عذراً حدث خطأ, الرجاء العودة و المحاولة مرة أخرى</div>';
            }
          }else{
            $msg = '<div class="warn"> عذراً حدث خطأ, الرجاء العودة و المحاولة مرة أخرى</div>';
          }
        }else{
          $msg = '<div class="warn"> عذراً حدث خطأ, الرجاء العودة و المحاولة مرة أخرى</div>';
        }
       ?>
 <?php include("./includes/sidebar.php"); ?>
       <?php if($msg == ''){ ?>
      <h1>تأكيد الحذف</h1>
      <div class="warn"> هل أنت متأكد من حذف هذا التسجيل و كل ما يتعلق به بالكامل ؟</div>
      <div class="new-sec"></div>
      <a href="<?php echo $_SERVER["REQUEST_URI"]; ?>&confirm"><div class="xbutton delete">حذف <i class="fas fa-trash-alt"> </i></div></a>
    <?php }else{echo $msg;} ?>
      <?php include("./bottom.php"); ?>

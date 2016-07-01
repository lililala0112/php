<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<style> 
  table tr td{
     border:solid 1px #666;
  }
</style>
<body>
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" enctype="multipart/form-data">
      <input name="file_upload" type="file" id="file_upload">
      <input type="submit" name="Submit" value="確定上傳">
 

      <input type="submit" value="登入" />
    <input type="reset" value="重填" />
</form>

<!-- move_uploaded_file(暫存檔案名稱,目的路徑及檔名) -->
<?php
   if( isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] == 0){
      if( move_uploaded_file($_FILES['file_upload']['tmp_name'],'./upload/'.$_FILES['file_upload']['name'])){
        echo '上傳成功<br/>';
        echo '檔案名稱:'.$_FILES['file_upload']['name'];
        echo '檔案類型<br/>'.$_FILES['file_upload']['type'];
        echo '檔案大小<br/>'.$_FILES['file_upload']['size'];

      }
   }


?>
<table>

<?php 
  $variable = glob("./upload/*");
  foreach ($variable as $filename ) {
    echo '<tr>';
    echo '<td>' . basename($filename) . '</td>';
    echo '<td>' . filesize($filename) .'</td>';
    echo '<td><a href=?del=true&filename='.$filename.' onclick="checkDel(\''.$filename.'\');">Delete</a></td>';
    echo '</tr>';
  }

 // $file = basename($path);         // $file is set to "index.php"
 // $file = basename($path, ".php"); // $file is set to "index"

?>
</table>

</body>
</html>

<script>

   function checkDel(filename){

       var delq = confirm('Are you sure,delete the file'+ filename);
   
       if( delq ){
        <?php 
         if (isset($_GET['filename']) && $_GET['del'] == true) {
             unlink($_GET['filename']);
           }
        ?>
       }
   }
 
</script>
      
      
    <?php
    
    //fopen 用法 http://php.net/function.fopen
    //開新檔案
    $fh = fopen('class.php', 'a');
    //寫入資料
    fwrite($fh, '<h1>Hello world!</h1>');
    fclose($fh);
    //刪除檔案
    unlink('class.php');

    ?>
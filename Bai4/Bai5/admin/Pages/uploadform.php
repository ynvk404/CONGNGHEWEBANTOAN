<div class="content-upload-form">
    <h2>Upload nhiều file sử dụng mảng kết hợp:</h2>

    <form method="post" action="index.php?page=uploadprocess" enctype="multipart/form-data">
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "File $i: <input type='file' name='files[]'><br><br>";
        }
        ?>
        <input type="submit" name="upload" value="Upload">
        <input type="reset" value="Reset">
    </form>
</div>

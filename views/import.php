<form method="post" enctype="multipart/form-data">


    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
    <input type="file" name="file" class="form-control-file form-control-lg" te="Оберіть файл">
    <br>
    <br>
    <button class="btn btn-primary" type="submit">Import</button>
    <br>

    <?php if ($message) : ?>
    <br>
             <?php if ($error) : ?>
    <div class="alert alert-danger" role="alert">
             <?php else : ?>
        <div class="alert alert-primary" role="alert">
             <?php endif; ?>
             <?= $message ?>
        </div>
    <?php endif; ?>
</form>
<br>
<a href="<?=BASE_URL?>result">
    <div class="btn btn-secondary">View Result</div>
</a>
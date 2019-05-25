<div class="col-md-7 example-height">
    <div class="inner-block">
        <h4 style="color:#0094f9">Add question</h4>
        <script src="/js/tinymce/jquery.tinymce.min.js"></script>
        <script src="/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#mytextarea'
            });
        </script>
        <form method="post" action="system/system_edit_question.php">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                </div>
                <input type="text" class="form-control" name="title" required value="<?=$selectQuestion['title']?>">
                <input type="hidden" value="<?=$person['id']?>" name="user_id">
                <input type="hidden" value="<?=$selectQuestion['id']?>" name="id">
            </div>
            <textarea id="mytextarea" rows="20" name="description"><?=$selectQuestion['description']?></textarea>
            <button type="submit" class="btn btn-primary" style="margin-top:20px">Update question</button>
        </form>
    </div>
</div>
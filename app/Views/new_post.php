
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1><?= $title ?></h1>
<div class="row">
    <div class="col-12 col-mid-8 offset-md-2">
        <form action="/blog/new" method="post">
            <div class="form-group">
            <label for="">Title</label>
           
            
            
            <input type="text" class="form-control" name="post_title">
            </div>
           
            <div class="form-group">
                <label for="">Text</label>
                <textarea name="post_content" id="" cols="10" rows="3" class="form-control"></textarea>

            </div>
            <div class="form-group">
                <button class="btn btn-success btn-sm ">
                    Create
                </button>
            </div>
            
               
        </form>
        
       
        
    </div>
</div>
</html>
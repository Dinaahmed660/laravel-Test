<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="{{('recieved')}}" method="post ">
    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" id="title" required="required" name="title" class="form-control ">
    </div>
    <div class="form-group">
      <label for="content">Content:</label>
      <textarea id="content" name="content" required="required" class="form-control">Contents</textarea>
    </div>
    <div class="form-group">
      <label for="author">Author:</label>
      <input type="text" id="title" required="required" name="author" class="form-control ">
    </div>
    <div class="checkbox">
    <input type="checkbox" class="flat">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Published</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>

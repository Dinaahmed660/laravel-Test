<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>author</th>
        <th>Published</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
@foreach($news as $new)
      <tr>
        <td>{{ $new->title }}</td>
        <td>{{ $new->content }}</td>
        <td>{{ $new->author }}</td>
        @if($new->published ==1){
            <td>yes 👍</td> 
        }
        @else
            <td>No 👎</td>
            @endif
            <td><a href="editNew/{{ $new->id }}">Edit</a></td>
      </tr>
@endforeach
    </tbody>
  </table>
</div>
</body>
</html>

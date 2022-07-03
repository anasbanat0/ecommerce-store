<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <script src="https://cdn.tiny.cloud/1/uy676ru9e2040docpmggweipgvsxkbtehmiqwwqc9yhi9fq7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#textarea',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak media',
      toolbar_mode: 'floating',
      height: 400,
    });
  </script>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
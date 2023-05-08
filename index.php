<?php
function add_element_into_array_json($array_dati_json,$new_element)
{
    array_unshift($array_dati_json, $new_element);
    $new_stringa_dati_json = json_encode($array_dati_json);
    file_put_contents('dati_json.json', $new_stringa_dati_json);
}
$add_element = $_GET['add_element'] ;
$stringa_dati_json = file_get_contents('dati_json.json');
#header('Content-Type: application/json');
$array_dati_json = json_decode($stringa_dati_json);
if (!empty($add_element)) {

    add_element_into_array_json($array_dati_json,$add_element);
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- FontAwesome 6.2.0 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- (Optional) Use CSS or JS implementation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
    integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <form action="" method="get">
                    <label for="add_element" class="form-label"></label>
                    <textarea class="form-control" name="add_element" id="add_element" rows="3"></textarea>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <ul>
                    <?php foreach($array_dati_json as $element) : ?>
                        <li><?= $element ?></li>
                    <?php endforeach ?> 
                </ul>
            </div>
        </div>
    </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
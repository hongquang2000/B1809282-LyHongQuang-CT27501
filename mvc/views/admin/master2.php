<?php
if (isset($data['result']) && $data['result'] != "") {
    $_SESSION['admin'] = $data['result'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Custom styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/B1809282_LyHongQuang_CT27501/public/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/B1809282_LyHongQuang_CT27501/public/css/main.css">
</head>

<body style="background-image: url('/B1809282_LyHongQuang_CT27501/public/img/background/cool-background.png');">
    <div class="container-fluid" style="padding: 0;">
        <div class="d-flex">
           <div class="d-flex flex-column flex-shrink" style="width: 250px; position: fixed; top: 0; bottom: 0; border-right: 3px solid #999;">
                <?php
                require_once "./mvc/views/admin/blocks/sidebar.php";
                ?>
            </div>
            <div style="width: 100%; margin-left: 300px; margin-right: 30px;">
                <?php
                require_once "./mvc/views/admin/blocks/nav.php";
                require_once "./mvc/views/admin/pages/" . $data['page'] . ".php";
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
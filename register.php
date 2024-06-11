<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOOD WASTE</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "good_waste";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$success_message = $error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $business_name = $conn->real_escape_string($_POST['business_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $business_address = $conn->real_escape_string($_POST['business_address']);
    $business_category = $conn->real_escape_string($_POST['business_category']);

    // Handle file upload
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Membuat direktori uploads jika belum ada
    }
    $target_file = $target_dir . basename($_FILES["business_logo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["business_logo"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    $error_message = "File is not an image.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $error_message = "Sorry, your file was not uploaded.";
} else {
    // if everything is ok, try to upload file
    if (move_uploaded_file($_FILES["business_logo"]["tmp_name"], $target_file)) {
        $business_logo = basename($_FILES["business_logo"]["name"]);
        $sql = "INSERT INTO businesses (business_name, email, phone_number, business_address, business_category, business_logo) VALUES ('$business_name', '$email', '$phone_number', '$business_address', '$business_category', '$business_logo')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Your business has been registered successfully!";
            header("Location: index.html");
            exit();
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Additional code to check for errors in file upload
        $upload_errors = [
            UPLOAD_ERR_OK => "No errors.",
            UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
            UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
            UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
            UPLOAD_ERR_NO_FILE => "No file was uploaded.",
            UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
            UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
            UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
        ];
        $error_code = $_FILES["business_logo"]["error"];
        if (array_key_exists($error_code, $upload_errors)) {
            $error_message = "Sorry, there was an error uploading your file: " . $upload_errors[$error_code];
        } else {
            $error_message = "Sorry, there was an unknown error uploading your file.";
        }
    }
}

    // Check if file already exists
    if (file_exists($target_file)) {
        $error_message = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["business_logo"]["size"] > 500000) {
        $error_message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $error_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $error_message = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["business_logo"]["tmp_name"], $target_file)) {
            $business_logo = basename($_FILES["business_logo"]["name"]);
            $sql = "INSERT INTO businesses (business_name, email, phone_number, business_address, business_category, business_logo) VALUES ('$business_name', '$email', '$phone_number', '$business_address', '$business_category', '$business_logo')";

            if ($conn->query($sql) === TRUE) {
                header("Location: index.html");
                exit();
            } else {
                $error_message = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mt-5">Registrasi Bisnis</h2>

            <?php if ($error_message): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <?php if ($success_message): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="business_logo">Logo Bisnis</label>
                    <input type="file" name="business_logo" class="form-control" id="business_logo" required>
                </div>
                <div class="form-group">
                    <label for="business_name">Nama Bisnis</label>
                    <input type="text" name="business_name" class="form-control" id="business_name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Nomor Telepon</label>
                    <div class="input-group">
                        <input type="text" name="phone_number" class="form-control" id="phone_number" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="business_address">Alamat Bisnis</label>
                    <input type="text" name="business_address" class="form-control" id="business_address" required>
                </div>
                <div class="form-group">
                    <label for="business_category">Kategori Bisnis</label>
                    <select name="business_category" class="form-control" id="business_category" required>
                        <option value="Restoran">Restoran</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Supermarket">Supermarket</option>
                        <option value="Produksi Rumahan">Produksi Rumahan</option>
                        <option value="Cake and Bakery">Cake and Bakery</option>
                        <option value="Warung Makan">Warung Makan</option>
                        <option value="Cafe and Coffee Shop">Cafe and Coffee Shop</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #048654;">Daftar</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Code injected by live-server -->
<script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
        (function () {
            function refreshCSS() {
                var sheets = [].slice.call(document.getElementsByTagName("link"));
                var head = document.getElementsByTagName("head")[0];
                for (var i = 0; i < sheets.length; ++i) {
                    var elem = sheets[i];
                    var parent = elem.parentElement || head;
                    parent.removeChild(elem);
                    var rel = elem.rel;
                    if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                    }
                    parent.appendChild(elem);
                }
            }
            var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
            var address = protocol + window.location.host + window.location.pathname + '/ws';
            var socket = new WebSocket(address);
            socket.onmessage = function (msg) {
                if (msg.data == 'reload') window.location.reload();
                else if (msg.data == 'refreshcss') refreshCSS();
            };
            if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                console.log('Live reload enabled.');
                sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
            }
        })();
    }
    else {
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
</script>
</body>
</html>

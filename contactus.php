<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>GOOD WASTE</title>
    <style>
        :root {
            --color-white: rgb(255, 255, 255);
            --text-color-second: rgb(68, 68, 68);
            --second-color: rgb(26, 77, 46);
        }

        .wrapper {
            padding-inline: 10vw;
        }

        .section {
            padding-block: 5em;
        }

        .top-header {
            text-align: center;
            margin-top: 2em;
            margin-bottom: 5em;
        }

        .top-header h1 {
            font-weight: 700;
            color: var(--text-color-second);
            margin-bottom: 10px;
        }

        .top-header span {
            color: #999;
        }

        .row {
            display: flex;
            justify-content: space-between;
            width: 100%;
            gap: 50px;
            margin: 0 auto;
        }

        .col {
            width: 50%;
        }

        .contact-info {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px 30px;
            width: 100%;
            height: 315px;
            background: var(--color-white);
            border-radius: 10px;
            overflow: hidden;
            border: 2px solid #aaa;
        }

        .contact-info>p {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-block: 5px;
        }

        .contact-info p>i {
            font-size: 18px;
        }

        .form-control {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
        }

        .form-inputs {
            display: flex;
            gap: 10px;
            width: 100%;
        }

        .input-field {
            width: 50%;
            height: 55px;
            background: transparent;
            border: 2px solid #aaa;
            border-radius: 10px;
            padding-inline: 20px;
            outline: none;
            font-family: 'Poppins', sans-serif;
        }

        textarea {
            width: 100%;
            height: 250px;
            background: transparent;
            border: 2px solid #aaa;
            border-radius: 10px;
            padding: 15px 20px;
            outline: none;
            resize: none;
            font-family: 'Poppins', sans-serif;
        }

        .form-button>.btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--second-color);
            color: var(--color-white);
        }

        .form-button>.btn:hover {
            background: var(--second-color);
        }

        .form-button i {
            font-size: 18px;
            rotate: -45deg;
        }

        .btn {
            font-weight: 500;
            padding: 12px 20px;
            background: #efefef;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.4s;
        }

        .btn>i {
            margin-left: 10px;
        }

        .btn:hover {
            background: var(--second-color);
            color: var(--color-white);
        }

        @media only screen and (max-width: 900px) {

            .row {
                display: flex;
                flex-direction: column;
                justify-content: center;
                gap: 50px;
            }

            .col {
                justify-content: center;
                width: 100%;
            }
        }

        @media only screen and (max-width: 540px) {

            .form-inputs {
                flex-direction: column;
            }

            .input-field {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "good_waste";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $success_message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $message = $conn->real_escape_string($_POST['message']);

        $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Message sent successfully!";
        } else {
            $success_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>

    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo">
                <img src="assets/img/goodwaste.png" alt="GOOD WASTE Logo">
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="index.html" class="nav__link">Home</a></li>
                    <li class="nav__item"><a href="aboutus.html" class="nav__link">About us</a></li>
                    <li class="nav__item"><a href="sustainability.html" class="nav__link">Sustainability</a></li>
                    <li class="nav__item"><a href="contactus.php" class="nav__link active-link">Contact Us</a></li>
                    <li class="nav__item"><a href="register.php" class="nav__link">Join With Us</a></li>
                    <li class="nav__item"><a href="ourpartner.html" class="nav__link">Our Partner</a></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>
    <main class="wrapper">

        <section class="section">
            <div class="top-header">
                <h1>Contact me</h1>
                <span>Do you have a project in mind, contact me here!</span>
                <?php if ($success_message) : ?>
                    <p style="color: green;"><?php echo $success_message; ?></p>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col">
                    <div class="contact-info">
                        <p><i class="uil uil-envelope"></i> www.goodwaste.com</p>
                        <p><i class="uil uil-phone"></i> 081217420886</p>
                    </div>
                </div>
                <div class="col">
                    <form class="form-control" action="" method="post">
                        <div class="form-inputs">
                            <input type="text" name="name" class="input-field" placeholder="Name" required>
                            <input type="email" name="email" class="input-field" placeholder="Email" required>
                        </div>
                        <div class="text-area">
                            <textarea name="message" placeholder="Pesan" required></textarea>
                        </div>
                        <div class="form-button">
                            <button type="submit" class="btn">Send <i class="uil uil-message"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer section bd-container">
        <div class="footer__container bd-grid">
            <div class="footer__content">
                <a href="index.html" class="nav__logo">
                    <img src="assets/img/goodwaste.png" alt="GOOD WASTE Logo">
                </a>
                <div>
                    <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Services</h3>
                <ul>
                    <li><a href="index.html" class="footer__link">Home</a></li>
                    <li><a href="aboutus.html" class="footer__link">About Us</a></li>
                    <li><a href="sustainability.html" class="footer__link">Sustainability</a></li>
                    <li><a href="#" class="footer__link">Contact Us</a></li>
                    <li><a href="register.php" class="footer__link">Join With Us</a></li>
                    <li><a href="ourpartner.html" class="footer__link">Our Partner</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">App</h3>
                <ul>
                    <li><a href="" class="footer__link"><i class='bx bxl-play-store'></i> Google Play</a></li>
                    <li><a href="" class="footer__link"><i class='bx bxl-apple'></i> App Store</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Adress</h3>
                <ul>
                    <li><a href="" class="footer__link"><i class='bx bx-globe'></i> goodwaste.com</a></li>
                    <li><a href="" class="footer__link"><i class='bx bx-phone'></i> 081217420886</a></li>
                </ul>
            </div>
        </div>

        <p class="footer__copy">Copyright &copy; Good Waster</a> - All rights reserved</p>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
<html>
    <head>
        <title>SandShop</title>
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link href="../css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="../OwlCarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../OwlCarousel/dist/assets/owl.theme.default.min.css">
        <script type="module">
            $(document).ready(function(){ 
                var owl1 = $("#carousel1");
                $('#carousel1').owlCarousel({
                    loop:true,
                    margin:10,
                    center:true,
                    autoplay:true,
                    autoplayTimeout:4000,
                    responsive:{
                        0:{
                            items:1,
                            loop:true
                        },
                        800:{
                            items:3,
                            loop:true
                        },
                        1200:{
                            items:5,
                            loop:true
                        }
                    }
                })
            });
        </script>
    </head>
    <body>
    <nav class="navbar navbar-light bg-light">
        <button class="btn btn-outline-success ms-auto" type="button" id="show-login">Admin</button>&nbsp;
        <button class="btn btn-outline-warning me-2" type="button" onclick="window.location.href='signinmember.php'">ซื้อสินค้า</button>
    </nav>
    <div class="popup">
        <div class="close-btn">&times;</div>
        <form method="post" name="form" action="login.php">
            <div class="form">
                <h2>Login</h2>
                <div class="form-element">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="form-element">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter password">
                </div>
                <div class="form-element">
                    <input type="checkbox" id="rememberMe">
                    <label for="remember -me">Remember Me</label>
                </div>
                <div class="form-element">
                    <!-- <input type="submit" id="login" name="login" value="Login" onsubmit="loginWithEmail"> -->
                    <button type="submit" id="login" value="login" name="login">Sign in</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container-fluid">
        <img class="TopPic" src="https://img.wongnai.com/p/1920x0/2019/09/01/0f43a372d6074e02abd5f84fd4ddd9dd.jpg">
    </div>
    <div class="container">
        <div class="slide">
            <div class="owl-carousel" id="carousel1">
                <img class="item" src="https://www.etude.com/th/th/wp-content/uploads/2023/01/650011661__fixing_tint_bar-247x300.jpg">
                <img class="item" src="https://medthai.com/wp-content/uploads/2019/08/NIVEA%20Dewy%20Sakura%20White%20Lotion2.png">
                <img class="item" src="https://www.lamoonbaby.com/wp-content/uploads/2021/11/554be7eaea3becab4736d718b5a56af9.jpg">
                <img class="item" src="https://www.alesethailand.com/wp-content/uploads/2023/02/%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%97%E0%B8%B2%E0%B8%AB%E0%B8%99%E0%B9%89%E0%B8%B2-%E0%B8%A2%E0%B8%B5%E0%B9%88%E0%B8%AB%E0%B9%89%E0%B8%AD%E0%B9%84%E0%B8%AB%E0%B8%99%E0%B8%94%E0%B8%B5-%E0%B8%A3%E0%B8%B2%E0%B8%84%E0%B8%B2%E0%B9%84%E0%B8%A1%E0%B9%88%E0%B9%81%E0%B8%9E%E0%B8%87-%E0%B8%9C%E0%B8%B4%E0%B8%A7%E0%B9%81%E0%B8%9E%E0%B9%89%E0%B8%87%E0%B9%88%E0%B8%B2%E0%B8%A2%E0%B9%83%E0%B8%8A%E0%B9%89%E0%B9%84%E0%B8%94%E0%B9%89.webp">
            </div>
        </div>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../OwlCarousel/dist/owl.carousel.min.js"></script>
</html>
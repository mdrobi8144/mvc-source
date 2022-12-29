<?php
    use App\RobiMvc\Core\Application;
    // if(!empty(Application::$app->user)){
    //     dd(Application::$app->user);
    // }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $this->title?></title>
        <link href="../assets/dist/css/app.css" rel="stylesheet" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/contact">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <?php if (Application::isGuest()): ?>
                    <ul class="navbar-nav ms-5 mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/register">Registration</a>
                        </li>
                    </ul>
                    <?php else: ?>
                    <ul class="navbar-nav ms-5 mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="/user/profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/logout">
                                Welcome <?php echo Application::$app->user->getDisplayName() ?> (Logout)
                            </a>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <div class="container">
            {{content}}
        </div>

        <script src="./assets/dist/js/app.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function setAutoHeight(get_height_tag, apply_tag)
            {
                const height_detect_content = document.querySelector(get_height_tag);
                const mtTag = document.getElementById(apply_tag);
                if(height_detect_content) {
                    var half_of_extra_height = (window.innerHeight - height_detect_content.offsetHeight - 56) / 2;
                    if(half_of_extra_height > 0) {
                        mtTag.style.margin = half_of_extra_height + "px 0 0";
                    } else {
                        height_detect_content.classList.add("pad-top-btm-1rem");
                    }
                    // console.log(half_of_extra_height);
                    // console.log(`Layout height: ${height_detect_content.offsetHeight}`);
                    // console.log('Window Full Screen Width * Height: ' + window.screen.width + ' * ' + window.screen.height);
                    // console.log('Window-Current Screen Width * Height:: ' + window.innerWidth + ' * ' + window.innerHeight);
                }
            }
            function setAutoHeightInnerContent(get_height_outer_tag, get_height_inner_tag, apply_tag)
            {
                const height_detect_outer_content = document.getElementById(get_height_outer_tag);
                const height_detect_inner_content = document.getElementById(get_height_inner_tag);
                const mtTag = document.getElementById(apply_tag);
                if(height_detect_outer_content && height_detect_inner_content) {
                    var half_of_extra_height = (height_detect_outer_content.offsetHeight - height_detect_inner_content.offsetHeight) / 2;
                    if(half_of_extra_height > 0) {
                        mtTag.style.margin = half_of_extra_height + "px 0 0";
                    } else {
                        height_detect_content.classList.add("pad-top-btm-1rem");
                    }
                }
            }
            setAutoHeight('.container', 'mt');
            setAutoHeightInnerContent('hc', 'fgr', 'mtofigr');
        </script>
    </body>
</html>
<?php 
    use App\RobiMvc\Core\Application;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $this->title?></title>
        <link href="./assets/dist/css/app.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="./fontawesome-free/css/all.min.css">
        <style>
            .pad-top-btm-1rem {
                padding-top: .75rem;
                padding-bottom: .75rem;
            }
            @media (min-width: 768px){
                .offset-for-auth-pg {
                    margin-left: 20.835%;
                }
            }
            .fht {
                color: #202124;
                padding-bottom: 0;
                padding-top: 16px;
                font-family: "Google Sans","Noto Sans Myanmar UI",arial,sans-serif;
                font-size: 20px;
                font-weight: 400;
                text-indent: -1px;
                line-height: 1.3333;
                margin-bottom: 0;
                margin-top: 0;
                word-break: break-word;
            }
            .after-fht {
                color: #202124;
                font-size: 16px;
                font-weight: 400;
                letter-spacing: 0.1px;
                line-height: 1.5;
                padding-bottom: 0;
                padding-top: 8px;
            }
            figcaption {
                text-align: justify!important;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php if(Application::$app->session->flash('success')): ?>
                <div class="alert alert-success">
                    <?php echo Application::$app->session->flash('success') ?>
                </div>
            <?php endif; ?>
            {{content}}
        </div>
        <script src="./assets/dist/js/app.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function setAutoHeight(get_height_tag, apply_tag)
            {
                const height_detect_content = document.querySelector(get_height_tag);
                const mtTag = document.getElementById(apply_tag);
                if(height_detect_content) {
                    var half_of_extra_height = (window.innerHeight - height_detect_content.offsetHeight) / 2;
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
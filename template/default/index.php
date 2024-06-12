<?php
    //Requires only at sub views are rendered
    use core\View as View;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
            View::render("default/_header",
            [
                "title" => "Welcome"
            ]);
        ?>
        <section>
            <pre>
                <?php 
                    //Data from the ApplicationController
                    print_r($page_data); 
                ?>
            </pre>
        </section>
        <?php
            View::render("default/_footer");
        ?>
    </main>
</body>
</html>

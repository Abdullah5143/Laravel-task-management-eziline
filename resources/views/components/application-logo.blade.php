<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .image-container {
            display: inline-block;
            position: relative;
            background-color: #333; /* Dark background color */
            padding: 10px; /* Optional padding */
        }

        .image-container img {
            display: block;
            width: 100%;
            height: auto;
        }

        .image-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 2px solid #333; /* Dark outline color */
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="image-container">
        <img src="https://www.eziline.com/wp-content/uploads/thegem-logos/logo_d3ab1dc84c568179a54aba7d5a23642b_1x.png" alt="">
    </div>
</body>
</html>

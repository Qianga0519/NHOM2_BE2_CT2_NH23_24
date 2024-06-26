<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root {
            --color-primary: #0e8ce4;
        }

        html {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }



        .container {
            width: 100%;
            height: 97.5vh;
            /* background: rgba(0, 0, 0, .2); */
            overflow: hidden;
            position: relative;
        }

        .container .text404 {
            /* background: red; */
            width: 400px;
            height: 200px;
            position: absolute;
            display: flex;
            left: calc(50% - 200px);
            top: 200px;
            justify-content: center;
            align-items: center;

        }

        .container .text404 h1 {
            position: absolute;
            font-size: 20px;
            text-align: center;
            font-size: 100px;
            color: #0e8ce4;
            /* transform: translateX(-200px); */
            animation: opac 4s linear infinite alternate-reverse;
            font-weight: bold;


        }

        .container .text {
            position: absolute;
            top: 20px;
            color: var(--color-primary);
            background: white;
            animation: opac 4s linear infinite alternate-reverse;
        }

        a {
            position: absolute;
            top: 150px;
            color: var(--color-primary);
            background: white;
            padding: 10px 40px;
            font-size: 30px;
            border-radius: 25px;
            text-decoration: none;
            border: 1px solid var(--color-primary);
            transition: .5s ease-in-out;
            width: 200px;
            text-align: center


        }

        a:hover {
            background: var(--color-primary);
            color: white;
        }

        @keyframes opac {
            0% {
                transform: translateX(-200px);
                opacity: 0;
                filter: blur(4px);

            }

            50% {

                opacity: 1;
                filter: blur(0px);
            }

            100% {
                transform: translateX(200px);
                opacity: 0;

                filter: blur(4px);

            }
        }

    </style>
</head>

<body>
    <div class="container">

        <div class="text404">
            <div class="text">PAGE NOT FOUND</div>
            <h1>404</h1>
            <a href="{{ redirect()->back()->getTargetUrl() }}">BACK</a>

        </div>

    </div>
</body>

</html>

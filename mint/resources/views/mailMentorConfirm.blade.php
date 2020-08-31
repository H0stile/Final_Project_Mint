<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Reset</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700|Roboto+Slab&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            transition-duration: 0.3;
        }
        *:not(input) {
            margin: 0;
            padding: 0;
            border: 0;
        }
        
        section {
            margin: 50px;
            background-color: #EBFEEA;
            font-family: "Nunito";
        }
        article {
            padding: 25px;
        }
        #greeting {
            font-size: 24px;
            
            padding-bottom: 20px;
        }
        p {
            line-height: 2;
        }
        #cheers {
            padding-top: 20px;
        }
        #closing {
            font-size: 18px;
        }
        #copyrightContainer {
            text-align: center;
        }
        #footerContent1 {
            font-size: 14px;
            line-height: 1;
        }
        /* ***** END FOOTER STYLING ***** */
    </style>
</head>
<body>
    <header>
    </header>
    <main>
        <section>
            <article>
                <h1 id="greeting">Hi, {{ $name }}  </h1>
                <p>Your demand at Mint has been approved! You can check you profile. Thank you for using Mint!</p>
                <p>If you have further questions, feel free to reach out to us at donotreply.mint@gmail.com</a>.</p>
                <p id="cheers">Cheers,</p>
                <p id="closing">The Mint Team</p>
            </article>
        </section>
    </main>
    <footer>
        <div id="copyrightContainer">
            <p id="footerContent">Made by <a href="">Mint Team</a> | 2020 <br> Luxembourg </p>
        </div>
    </footer>
</body>
</html>
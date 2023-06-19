<html lang="en" style="height:100%">
    <head>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->

        <!-- Bootstrap JS -->
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

        <!-- Go JS Library -->
        <script src="<?php echo base_url('JavaScript/GoJS/release/go-debug.js')?>"></script>
        

        <!-- Your CSS -->
        <link href="<?php echo base_url('CSS/Index.css')?>" rel="stylesheet">

        <!-- jQuery UI -->
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <!-- Drag & Drop JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>



        <style>
        .container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .shape {
            width: calc(50% - 50px);
            height: calc(33% - 50px);
            background-color: #DAE8FC;
            margin: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            position: relative;
            z-index: 2; 
        }

        .oval {
            border-radius: 50%;
            width: calc(50% - 50px);
            height: calc(33% - 50px);
        }

        .octagon {
            width: calc(50% - 50px);
            height: calc(33.33% - 50px);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            clip-path: polygon(29.29% 0%, 70.71% 0%, 100% 29.29%, 100% 70.71%, 70.71% 100%, 29.29% 100%, 0% 70.71%, 0% 29.29%);
            z-index: 2; 
        }


        .lineRightLong {
            position: absolute;
            width: 2px;
            top: 50%;
            right: 22%;
            width: 42%;
            height: 2px;
            background-color: black;
            transform: translateX(50%);
        }

        .lineRightSmall {
            position: absolute;
            width: 2px;
            top: 50%;
            right: 30%;
            width: 30%;
            height: 2px;
            background-color: black;
            transform: translateX(50%);
        }

        /* Vertical Line Middle */
        .lineVerticalMiddle {
            position: absolute;
            width: 2px;
            height: calc(33.33% + 20px);
            background-color: black;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1; 
        }


        /* Linie von Links klein */
        .lineLeftSmall {
            position: absolute;
            width: 50%;
            height: 2px;
            background-color: black;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
        }

          /* Linie von Links klein */
          .lineLeftBig {
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: black;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
        }

        /* Vertical Line Right */
        .lineVerticalRight {
            position: absolute;
            width: 2px;
            height: 50%;
            background-color: black;
            top: 50%;
            left: 85%;
            transform: translate(-50%, -50%);
            z-index: 1; 
        }


        /* Line Top Right */
        .lineTopRight {
            position: absolute;
            right: 0;
            width: 15%;
            height: 1px;
            background-color: black;
            top: 25%;
            transform: translateY(-50%);
        }

        /* Line Bottem Right */
        .lineBottemRight {
            position: absolute;
            right: 0;
            width: 15%;
            height: 2px;
            background-color: black;
            top: 75%;
            transform: translateY(-50%);
        }


        
        .text1,
        .text2,
        .text3,
        .text4 {
          position: absolute;
          color: black;
          font-size: 14px;
          font-weight: bold;
          top: 45%;
        }

        .text1 {
          left: 5%;
          transform: translate(-50%, -50%);
        }

        .text2 {
          left: 93%;
          transform: translate(-50%, -50%);
        }

        .text3 {
          left: 93%;
          top: 20%;
          transform: translate(-50%, -50%);
        }

        .text4 {
          left: 93%;
          top: 70%;
          transform: translate(-50%, -50%);
        }


        </style>

    </head>

    <body style="height:100%">
    
        
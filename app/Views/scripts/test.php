<!DOCTYPE html>
<html>
<head>
    <style>
        .container {
            width: 900px;
            height: 900px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative; /* Hinzugefügt */
        }

        .shape {
            width: calc(33.33% - 50px);
            height: calc(33.33% - 50px);
            background-color: blue;
            margin: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
            z-index: 2; /* Hinzugefügt */
        }

        .oval {
            border-radius: 50%;
        }

        .octagon {
            width: calc(33.33% - 50px);
            height: calc(33.33% - 50px);
            background-color: blue;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            clip-path: polygon(29.29% 0%, 70.71% 0%, 100% 29.29%, 100% 70.71%, 70.71% 100%, 29.29% 100%, 0% 70.71%, 0% 29.29%);
            z-index: 2; /* Hinzugefügt */
        }

        .line {
            position: absolute;
            width: 2px;
            height: calc(33.33% + 20px);
            background-color: red;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1; /* Hinzugefügt */
        }


        .line2 {
            position: absolute;
            width: 100%;
            height: 1px;
            background-color: red;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="shape">Quadrat</div>
        <div class="shape oval">Kreis</div>
        <div class="line2"></div>
        <div class="line"></div>
        <div class="shape octagon">Oktagon</div>
    </div>
</body>
</html>

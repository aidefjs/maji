<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <title>menuset</title>
    <style>
        body {
            font-family: Prompt, sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .menu-item {
            width: 20%;
            margin: 2rem;
            padding: 1rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            align-items: center;
            transition: transform 0.3s ease-in-out;
        }

        .menu-item img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .menu-item:hover {
            transform: scale(1.05);
        }
    </style>
    <script src="fetchmainNav.js"></script>
    <script src="fetchNavbar.js"></script>
    <script src="fetchBasket.js"></script>
</head>

<body class="bg-white">

    <div id="mainnavbar"></div>

    <div class="grid place-content-center sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 mt-[3%]">
        <div class="col-span-3 sm:col-span-4">
            <div id="navbar"></div>
            <?php
            $servername = "localhost";
            $username = "S074T";
            $password = "VA12906";
            $dbname = "maji";

            // Create connection <div id="basket" class="w-w-1/4"></div>
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM menu WHERE menuTypeID = 1 ;";
            $result = mysqli_query($conn, $sql);
            echo '<form  method="get" class="grid place-content-center mr-[8%] ml-[8%] sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-1 mt-[5%]"> ';

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="menu-item w-[75%] h-70 content-center text-pretty mt-[3%] bg-white border border-gray-200 rounded-lg">
                        <img class="h-30 object-cover mb-2" src="' . $row["menuImage"] . '" alt="' . $row["menuName"] . '">
                        <p class="text-black text-pretty">' . $row["menuName"] . '</p>
                        <p class="text-amber-500 text-sm text-pretty">' . $row["menuDescription"] . '</p>
                        <p class="text-black mt-2">' . '฿' . $row["menuPrice"] . '.-</p>
                        <button type="submit" name="order_menu" value="Submit" class="mt-2 text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-900 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                            สั่งอาหาร
                        </button>
                    </div>';
                }
            } else {
                echo "0 results";
            }
            echo "</form>";

            // Close connection
            mysqli_close($conn);
            ?>
        </div>
        <div class="w-60">
            <div class="ml-3">
                <div class="container mx-auto p-4">
                    <label for="orderType" class="block text-sm font-medium text-gray-600">เลือกประเภทการสั่ง</label>
                    <select id="orderType" name="orderType" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 bg-white">
                        <option value="delivery">สั่งกลับบ้าน</option>
                        <option value="dine-in">ทานที่ร้าน</option>
                    </select>

                    <p class="mt-4">เลือก: <span id="selected"> สั่งกลับบ้าน </span></p>
                    <div id="tableID"></div>
                </div>
            </div>
            <script>
                const orderType = document.getElementById('orderType');
                const selected = document.getElementById('selected');
                const tableID = document.getElementById('tableID');

                orderType.addEventListener('change', function() {
                    selected.textContent = orderType.value === 'delivery' ? 'สั่งกลับบ้าน' : 'ทานที่ร้าน';
                    if (selected.textContent == 'ทานที่ร้าน') {
                        tableID.innerHTML = "<input type='text' class='mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-red-500 ' placeholder='ใส่เลขโต๊ะ' >";
                    } else {
                        tableID.innerHTML = "";
                    }
                });
            </script>

            <div id="basket" class="justify-center mt-[3%]"></div>

            <button type="submit" name="order_menu" value="Submit" class="mt-2 text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                แก้ไข/เพิ่ม/ลบ เมนู
            </button>
        </div>
    </div>

    <script>
        let counterValue = 0;

        function updateCounter() {
            document.getElementById("counter").innerText = counterValue;
        }

        function increment() {
            counterValue++;
            updateCounter();
        }

        function decrement() {
            if (counterValue == 0) {
                counterValue = 0
                updateCounter();
            } else {
                counterValue--;
                updateCounter();
            }


        }
    </script>


</body>

</html>
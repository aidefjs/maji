<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:wght@300&family=Protest+Revolution&family=Quicksand&family=Roboto:wght@500&family=Sixtyfour&display=swap" rel="stylesheet" />
</head>

<body>
  <section class="w-80 mb-[2%] bg-red-200 rounded-md mt-[2%] mr-2 sm:py-8 lg:py-8">
    <div class="grid grid-cols-1 text-gray-900 divide-y divide-gray-900 w-auto mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center mt-[3%]">
        <h1 class="text-black"> รายการอาหารทั้งหมด</h1>
      </div>
      <div class="mt-[5%]">
        <div class="flex items-center text-l text-yellow-900 mt-[10%]"> เซตปลาแซลมอนย่างเกลือกระทะร้อน </div>
        <div class="max-w-xs mx-auto">
          <label for="counter-input" class="block mb-1 mt-[2%] text-sm font-medium text-yellow-700">จำนวน:</label>
          <div class="relative flex items-center">
            <button onclick="decrement()" class="flex-shrink-0 bg-gray-100  hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-red-600  focus:ring-2 focus:outline-none">
              <svg class="w-2.5 h-2.5 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
              </svg>
            </button>
            <span id="counter" class="m-2 flex-shrink-0 text-red-600  border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"> 0 </span>
            <button onclick="increment()" class="flex-shrink-0 bg-gray-100 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-red-600 focus:ring-2 focus:outline-none">
              <svg class="w-2.5 h-2.5 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
              </svg>
            </button>
          </div>
        </div>
        <div>
          <button onclick="window.location.href='addressInfo.html';" class="mt-2 mb-[2%] text-white bg-red-700 hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-red-500 font-medium rounded-full text-sm px-5 py-2.5 text-center">
            ยืนยันการสั่งซื้อ
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

      mysqli_close($conn);
      ?>
    </div>
  </section>

</body>

</html>
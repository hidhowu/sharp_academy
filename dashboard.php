<?php
require('includes/db.php');
require('includes/functions.php');


if(isset($_GET['email'])){
  $email = $_GET['email'];
}




// Encode the email for URL compatibility
$encodedEmail = $email;

// Generate the share links
$whatsappLink = "https://wa.me/?text=" . urlencode("Be a part of the upcoming lecture series on Defying CeFi with DeFi and get to learn how to start making money with DeFi: https://demo.jstudios.com.ng/sharc?ref=" . $encodedEmail);
$telegramLink = "https://t.me/share/url?url=" . urlencode("https://demo.jstudios.com.ng/sharc?ref=" . $encodedEmail) . "&text=" . urlencode("Be a part of the upcoming lecture series on Defying CeFi with DeFi and get to learn how to start making money with DeFi");
$twitterLink = "https://twitter.com/intent/tweet?text=" . urlencode("Be a part of the upcoming lecture series on Defying CeFi with DeFi and get to learn how to start making money with DeFi: https://demo.jstudios.com.ng/sharc?ref=" . $encodedEmail);
$facebookLink = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode("https://demo.jstudios.com.ng/sharc?ref=" . $encodedEmail) . "&quote=" . urlencode("Be a part of the upcoming lecture series on Defying CeFi with DeFi and get to learn how to start making money with DeFi");

$sharelink = "Be a part of the upcoming lecture series on Defying CeFi with DeFi and get to learn how to start making money with DeFi: https://demo.jstudios.com.ng/sharc?ref=" . $encodedEmail;


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sharp Academy</title>
    <link rel="stylesheet" href="css/tailwind.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- <script src="js/script.js"></script> -->
  </head>
  <body>
    <div class="refpage" id="">
      <div class="" id="">
        <div class="w-11/12 md:w-9/12 lg:w-11/12 mx-auto mt-10" id="">
          <div class="flex justify-end" id="">
            <a href="#" class="" id="">
              <svg
                width="24"
                height="25"
                viewBox="0 0 24 25"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M8.9 8.05999C9.21 4.45999 11.06 2.98999 15.11 2.98999H15.24C19.71 2.98999 21.5 4.77999 21.5 9.24999V15.77C21.5 20.24 19.71 22.03 15.24 22.03H15.11C11.09 22.03 9.24 20.58 8.91 17.04M15 12.5H3.62M5.85 9.14999L2.5 12.5L5.85 15.85"
                  stroke="black"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
          </div>
        </div>

        <div
          class="pri-font mt-8 lg:-mt-20 lg:flex lg:gap-16 lg:w-11/12 xl:w-10/12 xl:gap-32 lg:mx-auto"
          id=""
        >
          <div class="w-11/12 mx-auto md:w-9/12 lg:w-5/12 lg:mt-52" id="">
            <div class="" id="">
              <p class="text-[4.1rem] font-bold" id="">
                Invite
                <span class="block lg:inline-block text-pri-color" id=""
                  >Your Friends</span
                >
              </p>
              <p
                class="text-[1.4rem] font-medium lg:mt-8 lg:leading-[200%]"
                id=""
              >
                By being one of our top referrals, you will have the opportunity
                to share a reward pool of up to $1000 upon completion of the
                program
              </p>
            </div>
            <div class="mt-16" id="">
              <p class="text-[1.4rem] font-medium" id="">
                Do not let your friends miss this one time opportunity Share
                your referral link to them so they do not miss out
              </p>
              <div class="flex gap-4 mt-6 lg:mt-8" id="">
                <input
                  type="text"
                  class="flex-grow border-darkgray border rounded-[10px] px-6 text-[1.2rem] bg-lightgray opacity-60"
                  id="reflink"
                  value="https://demo.jstudios.com.ng/sharc?ref=<?php echo $email?>"
                  readonly
                />
                <button class="bg-pri-color p-4 rounded-[10px]" id="copyBtn">
                  <svg
                    width="26"
                    height="25"
                    viewBox="0 0 26 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M18.208 13.9584V17.0834C18.208 21.2501 16.5413 22.9167 12.3747 22.9167H8.41634C4.24967 22.9167 2.58301 21.2501 2.58301 17.0834V13.1251C2.58301 8.95842 4.24967 7.29175 8.41634 7.29175H11.5413"
                      stroke="white"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M12.5837 2.08325H16.7503M7.79199 5.20825C7.79199 3.47909 9.18783 2.08325 10.917 2.08325H13.6462M23.417 8.33325V14.7812C23.417 16.3958 22.1045 17.7083 20.4899 17.7083M23.417 8.33325H20.292C17.9482 8.33325 17.167 7.552 17.167 5.20825V2.08325L23.417 8.33325ZM18.2087 13.9583H14.8753C12.3753 13.9583 11.542 13.1249 11.542 10.6249V7.29159L18.2087 13.9583Z"
                      stroke="white"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </button>
              </div>
              <div
                class="mt-8 flex w-9/12 lg:w-7/12 mx-auto justify-between"
                id=""
              >
                <a
                  href="<?php echo $whatsappLink?>"
                  class="bg-sixth-color flex justify-center items-center rounded-full h-16 w-16"
                  id=""
                  ><img src="images/svgs/whatsapp.svg" alt="" class="" id="" />
                </a>

                <a
                  href="<?php echo $telegramLink?>"
                  class="bg-sixth-color flex justify-center items-center rounded-full h-16 w-16"
                  id=""
                  ><img src="images/svgs/telegram.svg" alt="" class="" id="" />
                </a>

                <a
                  href="<?php echo $twitterLink?>"
                  class="bg-sixth-color flex justify-center items-center rounded-full h-16 w-16"
                  id=""
                  ><img src="images/svgs/twitter.svg" alt="" class="" id="" />
                </a>

                <a
                  href="<?php echo $facebookLink?>"
                  class="bg-sixth-color flex justify-center items-center rounded-full h-16 w-16"
                  id=""
                  ><img src="images/svgs/facebook.svg" alt="" class="" id="" />
                </a>
              </div>
            </div>
          </div>
          <div class="mt-20 md:w-9/12 lg:w-6/12 md:mx-auto" id="">
            <div class="relative">
              <img src="images/rocket_main.webp" class="w-full" alt="" />
              <p
                class="absolute bottom-6 md:bottom-20 md:left-16 left-4 text-white text-[2.5rem] font-bold"
                id=""
              >
                REFERRAL <span class="block text-pri-color">LEADERBOARD</span>
              </p>
            </div>

            <div class="w-11/12 mx-auto mt-8" id="">

                <?php
                $sql = "SELECT email, ref_count FROM members ORDER BY ref_count desc LIMIT 5";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                $arr = [];
               
                // Loop through each row
                while ($rows = mysqli_fetch_assoc($result)) {
                  $arr[] = $rows['email'];
                  // print_r($rows)
                ?>
                  <div
                    class="bg-sixth-color rounded-[8px] px-8 py-6 flex justify-between my-5"
                    id=""
                  >
                    <div class="self-center" id="">
                      <svg
                        class="gold"
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M16.7002 19.4799H7.3002C6.8802 19.4799 6.4102 19.1499 6.2702 18.7499L2.1302 7.16986C1.5402 5.50986 2.2302 4.99986 3.6502 6.01986L7.5502 8.80986C8.2002 9.25986 8.9402 9.02986 9.2202 8.29986L10.9802 3.60986C11.5402 2.10986 12.4702 2.10986 13.0302 3.60986L14.7902 8.29986C15.0702 9.02986 15.8102 9.25986 16.4502 8.80986L20.1102 6.19986C21.6702 5.07986 22.4202 5.64986 21.7802 7.45986L17.7402 18.7699C17.5902 19.1499 17.1202 19.4799 16.7002 19.4799ZM6.5002 22.4999H17.5002H6.5002ZM9.5002 14.4999H14.5002H9.5002Z"
                          fill="#ffffff"
                        />
                        <path
                          d="M6.5002 22.4999H17.5002M9.5002 14.4999H14.5002M16.7002 19.4799H7.3002C6.8802 19.4799 6.4102 19.1499 6.2702 18.7499L2.1302 7.16986C1.5402 5.50986 2.2302 4.99986 3.6502 6.01986L7.5502 8.80986C8.2002 9.25986 8.9402 9.02986 9.2202 8.29986L10.9802 3.60986C11.5402 2.10986 12.4702 2.10986 13.0302 3.60986L14.7902 8.29986C15.0702 9.02986 15.8102 9.25986 16.4502 8.80986L20.1102 6.19986C21.6702 5.07986 22.4202 5.64986 21.7802 7.45986L17.7402 18.7699C17.5902 19.1499 17.1202 19.4799 16.7002 19.4799Z"
                          stroke="black"
                          stroke-width="1.5"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </div>
                    <div class="self-center text-[1.2rem]" id="">
                     <?php echo $rows['email']?>
                    </div>
                    <div class="self-center text-[1.3rem]" id=""><?php echo $rows['ref_count']?></div>
                  </div>

                  <?php

                }
                
                if (!in_array($email, $arr)){

                  $sqla = "SELECT email, ref_count FROM members where email = '{$email}'";
  
                  // Execute the query
                  $resulta = mysqli_query($conn, $sqla);
                   
                  // print_r($result);
                  // Loop through each row
                  $rowsa = mysqli_fetch_assoc($resulta) 
                    ?>
                    <div
                      class="bg-sixth-color rounded-[8px] px-8 py-6 flex justify-between my-5"
                      id=""
                    >
                      <div class="self-center" id="">
                        <svg
                          class="white"
                          width="24"
                          height="25"
                          viewBox="0 0 24 25"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M16.7002 19.4799H7.3002C6.8802 19.4799 6.4102 19.1499 6.2702 18.7499L2.1302 7.16986C1.5402 5.50986 2.2302 4.99986 3.6502 6.01986L7.5502 8.80986C8.2002 9.25986 8.9402 9.02986 9.2202 8.29986L10.9802 3.60986C11.5402 2.10986 12.4702 2.10986 13.0302 3.60986L14.7902 8.29986C15.0702 9.02986 15.8102 9.25986 16.4502 8.80986L20.1102 6.19986C21.6702 5.07986 22.4202 5.64986 21.7802 7.45986L17.7402 18.7699C17.5902 19.1499 17.1202 19.4799 16.7002 19.4799ZM6.5002 22.4999H17.5002H6.5002ZM9.5002 14.4999H14.5002H9.5002Z"
                            fill="#ffffff"
                          />
                          <path
                            d="M6.5002 22.4999H17.5002M9.5002 14.4999H14.5002M16.7002 19.4799H7.3002C6.8802 19.4799 6.4102 19.1499 6.2702 18.7499L2.1302 7.16986C1.5402 5.50986 2.2302 4.99986 3.6502 6.01986L7.5502 8.80986C8.2002 9.25986 8.9402 9.02986 9.2202 8.29986L10.9802 3.60986C11.5402 2.10986 12.4702 2.10986 13.0302 3.60986L14.7902 8.29986C15.0702 9.02986 15.8102 9.25986 16.4502 8.80986L20.1102 6.19986C21.6702 5.07986 22.4202 5.64986 21.7802 7.45986L17.7402 18.7699C17.5902 19.1499 17.1202 19.4799 16.7002 19.4799Z"
                            stroke="black"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </div>
                      <div class="self-center text-[1.2rem]" id="">
                       <?php echo $rowsa['email']?>
                      </div>
                      <div class="self-center text-[1.3rem]" id=""><?php echo $rowsa['ref_count']?></div>
                    </div>
  
                    <?php
                  }
                  ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>


const copyBtn = document.getElementById("copyBtn");

const pollResult = [];
let currentSpeed = 0;

// const inputed = document.getElementById("reflink");
//
//
const copytext = '<?php echo $sharelink?>';

copyBtn.addEventListener("click", () => {
  //   console.log("here");
  navigator.clipboard
    .writeText(copytext)
   
});

  </script>
</html>

const startBtn = document.querySelectorAll(".getstarted");
const popup = document.querySelector("#onboarding");
const regBox = document.getElementById("reg");
const verifyBox = document.getElementById("verifyBox");
const regBtn = document.getElementById("register");
const verifyBtn = document.getElementById("verifyBtn");
const pollStart = document.getElementById("pollStart");
const startPollBtn = document.getElementById("start");
const mainPoll = document.getElementById("mainPoll");
const errormessage = document.querySelectorAll(".errormessage");
const endPoll = document.getElementById("endPoll");
const next = document.getElementById("next");
const closeUp = document.getElementById("closeUp");
const previous = document.getElementById("previous");
const option1 = document.getElementById("option1");
const option2 = document.getElementById("option2");
const option3 = document.getElementById("option3");
const option4 = document.getElementById("option4");
const questionBox = document.getElementById("question");
const meter = document.getElementById("meter-bar");
const optionBox = document.getElementById("optionBox");
const header = document.querySelector("#header");
const home = document.querySelector("#home");
const hamburgerOpen = document.querySelector("#hamburger");
const navMenu = document.querySelector("#navMenu");
const menuClose = document.querySelector("#menu-close");
const menuContainer = document.querySelector("#menu_container");
const loginArea = document.querySelector("#loginArea");
const loginBtn = document.querySelector("#login");
const dashBtn = document.querySelector("#dashAccess");
const regText = document.querySelector("#regText");

const pollResult = [];
let currentSpeed = 0;

// Creating Mobile navigation

const openMenu = () => {
  navMenu.classList.add("open");
};

const closeMenu = () => {
  navMenu.classList.remove("open");
};

hamburgerOpen.addEventListener("click", openMenu);
menuClose.addEventListener("click", closeMenu);

menuContainer.addEventListener("click", (e) => {
  e.preventDefault();
  if (e.target.classList.contains("menu-item")) {
    // console.log(e.target);
    closeMenu();

    // Creating smooth scroll
    document
      .querySelector(`${e.target.getAttribute("href")}`)
      .scrollIntoView({ behavior: "smooth" });
  }
});

// setting navigtion as fixed using IO

const navFixed = function (entries) {
  const [entry] = entries;
  //   console.log(entry);

  if (!entry.isIntersecting)
    header.querySelector("#nav").classList.add("sticky");
  else header.querySelector("#nav").classList.remove("sticky");

  // observer.unobserve(entry.target);
};

const navObserver = new IntersectionObserver(navFixed, {
  root: null,
  threshold: 0,
  rootMargin: "0px",
});

navObserver.observe(header);
//
//

// Get the search parameters from the URL
const searchParams = new URLSearchParams(window.location.search);

// Get the value of a specific parameter
let ref = searchParams?.get("ref");
if (ref == null) ref = "";
// console.log(ref);

//
//
//
//
//

// const question = document.getElementById("question");
// reg popper

const poll = {
  q1: {
    question: "Which platform do you prefer for our classes to take place",
    options: ["Discord", "Telegram", "Google Meet", "Zoom"],
  },

  q2: {
    question:
      "What time of the day do you prefer for Sharp Academy's daily DeFi classes to take place",
    options: ["10am - 12pm", "1pm - 3pm", "4pm - 6pm", "6pm - 8pm"],
  },
};

const regPop = () => {
  popup.classList.remove("hidden", "md:hidden");
  regBox.classList.remove("hidden");
};

const validEmail = function (email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
};

const errorMes = (message) => {
  errormessage.forEach((el, i) => {
    el.innerText = message;
    el.classList.remove("hidden");
  });
};

const errorHide = () => {
  errormessage.forEach((el, i) => {
    el.classList.add("hidden");
  });
};

// Callback function if form got submitted
const regSuccessCallback = function (response) {
  // console.log(response);
  regBtn.innerHTML = "Register";

  if (response == "success") {
    regBox.classList.add("hidden");
    verifyBox.classList.remove("hidden");
  } else if (response == "completed") {
    window.location.href = `https://demo.jstudios.com.ng/sharc/dashboard.php?email=${email.value}`;
  } else {
    errorMes("Unexpected Error Occured. Try Again Later");
  }
};

// Verify success callback
const verifySuccessCallback = function (response) {
  //   console.log(response);

  if (response == "success") {
    verifyBox.classList.add("hidden");
    pollStart.classList.remove("hidden");
  } else if (response == "failed") {
    errorMes("invalid code");
  } else {
    errorMes("Unexpected Error Occured. Try Again Later");
  }
};

// An ajax sender
const ajaxSender = function (path, formdata, callback = "") {
  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Define the PHP script URL and HTTP method
  var url = path;
  var method = "POST";

  // Prepare the data to send
  var data = new FormData();
  formdata.forEach(function (el, i) {
    [key, value] = [...el];
    data.append(key, value);
  });

  // Set up the AJAX request
  xhr.open(method, url, true);

  // Set the appropriate HTTP headers
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

  // Define the callback function when the request completes
  xhr.onload = function () {
    if (xhr.status === 200) {
      // Request was successful
      var response = xhr.responseText;
      if (callback != "") {
        callback(response);
      }
    } else {
      // Request failed
      console.error("Request failed. Error code: " + xhr.status);
    }
  };
  xhr.send(data);
};

const registerUser = function () {
  regBtn.innerHTML = '<img src="images/svgs/pulse.svg" alt="" class="" />';
  errorHide();
  const email = document.querySelector("input#email").value;
  if (validEmail(email)) {
    emailData = [
      ["email", email],
      ["ref", ref],
    ];
    ajaxSender("includes/email.php", emailData, regSuccessCallback);
  } else {
    errorMes("invalid email");
  }
};

const verifyCode = function () {
  errorHide();

  const code = document.querySelector("input#code").value;

  if (code.length == 6 && !isNaN(parseFloat(code)) && isFinite(code)) {
    emailData = [
      ["email", email.value],
      ["code", code],
    ];
    ajaxSender("includes/verify.php", emailData, verifySuccessCallback);
  } else {
    errorMes("invalid code");
  }
};
let pollNumber = 1;

const addQuestion = function () {
  //   if (pollNumber == 1) {
  previous.style.visibility = "hidden";
  //   }
  //   else if (pollNumber == Object.keys(poll).length) {
  // previous.style.visibility = "visible";
  //   }
  let quest = poll[`q${pollNumber}`].question;
  let opt1 = poll[`q${pollNumber}`].options[0];
  let opt2 = poll[`q${pollNumber}`].options[1];
  let opt3 = poll[`q${pollNumber}`].options[2];
  let opt4 = poll[`q${pollNumber}`].options[3];

  questionBox.innerText = quest;
  option1.querySelector("label").innerText = opt1;
  option1.querySelector("input").value = 1;
  option2.querySelector("label").innerText = opt2;
  option2.querySelector("input").value = 2;
  option3.querySelector("label").innerText = opt3;
  option3.querySelector("input").value = 3;
  option4.querySelector("label").innerText = opt4;
  option4.querySelector("input").value = 4;
  currentSpeed += meterSpeed;
  meter.style.width = `${currentSpeed}%`;
};

const checkAns = () => {
  const answer = optionBox.querySelector("input:checked")?.value || null;

  if (answer != null) {
    pollResult.push(answer);
    // console.log(pollResult);
    if (pollNumber < Object.keys(poll).length) {
      optionBox.querySelector("input:checked").checked = false;
      pollNumber++;
      addQuestion();
    }
    if (pollNumber >= Object.keys(poll).length) {
      closePoll();
    }
  }
};

const pollUpdateCallback = function (response) {
  if (response == "success") {
    mainPoll.classList.add("hidden");
    endPoll.classList.remove("hidden");
  } else {
    errorMes("Unexpected Error Occured. Try Again Later");
  }
};

const closePoll = () => {
  const pollData = [
    ["email", email.value],
    ["opt1", pollResult[0]],
    ["opt2", pollResult[1]],
  ];

  ajaxSender("includes/poll.php", pollData, pollUpdateCallback);
  //   optionBox.querySelector("input:checked").checked = false;
};

const checker = function () {
  const answer = optionBox.querySelector("input:checked")?.value || null;

  if (answer != null) {
    pollResult.push(answer);
    // console.log(pollResult);
    // if (pollNumber >= Object.keys(poll).length) {
    optionBox.querySelector("input:checked").checked = false;
    if (pollNumber >= Object.keys(poll).length) {
      closePoll();
    } else {
      pollNumber++;
      addQuestion();
    }
  }
  //   }
};

const openPoll = () => {
  errorHide();
  //   console.log(Object.keys(poll).length);

  addQuestion();

  pollStart.classList.add("hidden");
  mainPoll.classList.remove("hidden");
};

// Popping up registration
startBtn.forEach(function (el, i) {
  el.addEventListener("click", regPop);
});

const dashPop = () => {
  regPop();
  regText.innerText = "Enter your email to access your dashboard";
  regBtn.innerText = "Login";
};

dashBtn.addEventListener("click", dashPop);

regBtn.addEventListener("click", registerUser);
// loginBtn.addEventListener("click", registerUser);
verifyBtn.addEventListener("click", verifyCode);
startPollBtn.addEventListener("click", openPoll);

// Setting next click and adding answers to array
next.addEventListener("click", checker);
const meterSpeed = 100 / Object.keys(poll).length;

// Closing the poll entirely
closeUp.addEventListener("click", () => {
  errorHide();
  document.querySelector("input#email").value = "";
  document.querySelector("input#code").value = "";
  currentSpeed = 0;
  pollResult.length = 0;

  pollNumber = 1;
  endPoll.classList.add("hidden");
  popup.classList.add("hidden", "md:hidden");
  regBox.classList.add("hidden");
});
document.querySelector("#closeOnb").addEventListener("click", () => {
  errorHide();
  document.querySelector("input#email").value = "";
  document.querySelector("input#code").value = "";
  currentSpeed = 0;
  pollResult.length = 0;

  pollNumber = 1;
  endPoll.classList.add("hidden");
  popup.classList.add("hidden", "md:hidden");
  regBox.classList.add("hidden");
});

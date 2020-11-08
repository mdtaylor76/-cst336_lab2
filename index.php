<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lab 2: Geography Quiz</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js" ></script> 
        
        <script>
            $(document).ready(function(){
            
                //Global Variables
                var score = 0;
                var attempts = localStorage.getItem("total_attempts");
                
                //event listener
                $("button").on("click", gradeQuiz);
                
                $(".q5Choice").on("click", function() {
                    $(".q5Choice").css("background","")
                    $(this).css("background","rgb(255, 255, 0)");
                });
                
                $(".q10Choice").on("click", function() {
                    $(".q10Choice").css("background","")
                    $(this).css("background","rgb(255, 255, 0)");
                });
                
                displayQ4Choices();
                displayQ7Choices();
                
                function displayQ4Choices() {
                    
                    let q4ChoicesArray = ["Maine", "Rhode Island", "Maryland", "Delaware"];
                    q4ChoicesArray = _.shuffle(q4ChoicesArray);
                    
                    for (let i = 0; i < q4ChoicesArray.length; i++) {
                        
                        let addon = ` <input type="radio" name="q4" id="${q4ChoicesArray[i]}" value="${q4ChoicesArray[i]}"> <label for="${q4ChoicesArray[i]}"> ${q4ChoicesArray[i]} </label>`;
                        $("#q4Choices").append(addon);
                        
                    }
                }
                
                function displayQ7Choices() {
                    
                    let q7ChoicesArray = ["Alaska", "Texas", "California", "Montana"];
                    q7ChoicesArray = _.shuffle(q7ChoicesArray);
                    
                    for (let i = 0; i < q7ChoicesArray.length; i++) {
                        
                        let addon = ` <input type="radio" name="q7" id="${q7ChoicesArray[i]}" value="${q7ChoicesArray[i]}"> <label for="${q7ChoicesArray[i]}"> ${q7ChoicesArray[i]} </label>`;
                        $("#q7Choices").append(addon);
                        
                    }
                }
                
                function isFormValid(){
                    let isValid = true;

                    if ($("#q1").val() == "" || $("#q8").val() == "") {
                        isValid = false;
                        $("#validationFdbk").html("Question 1 or 8 was not answered");
                    }

                    return isValid;
                }
                
                function gradeQuiz() {
                    $("#validationFdbk").html(""); //resets validation feedback
                    
                    if (!isFormValid()) {
                        return;
                    }
                    
                    function rightAnswer(index) {
                        $(`#q${index}Feedback`).html("Correct!");
                        $(`#q${index}Feedback`).attr("class", "bg-success text-white");
                        $(`#markImg${index}`).html("<img src='img/checkmark.png' alt='checkmark'>");
                        score += 10;
                    }
                    
                    function wrongAnswer(index) {
                        $(`#q${index}Feedback`).html("Incorrect!");
                        $(`#q${index}Feedback`).attr("class", "bg-warning text-white");
                        $(`#markImg${index}`).html("<img src='img/xmark.png' alt='xmark'>");
                    }
                    
                    score = 0;
                    let q1Response = $("#q1").val().toLowerCase();
                    let q2Response = $("#q2").val();
                    let q4Response = $("input[name=q4]:checked").val();
                    let q6Response = $("#q6").val();
                    let q7Response = $("input[name=q7]:checked").val();
                    let q8Response = $("#q8").val().toLowerCase();
                    
                    //Question 1
                    if(q1Response == "sacramento") {
                        rightAnswer(1);
                    }
                    else {
                        wrongAnswer(1);
                    }

                    //Question 2
                    if(q2Response == "mo") {
                        rightAnswer(2);
                    }
                    else {
                        wrongAnswer(2);
                    }
                    
                    //Question 3
                    if ($("#Jefferson").is(":checked") && $("#Roosevelt").is(":checked") &&
                    !$("#Jakcson").is(":checked") && !$("#Franklin").is(":checked")) {
                        rightAnswer(3);
                    }
                    else {
                        wrongAnswer(3);
                    }
                    
                    //Question 4
                    if (q4Response == "Rhode Island") {
                        rightAnswer(4);
                    }
                    else {
                        wrongAnswer(4);
                    }
                    
                    //Question 5
                    if($("#seal2").css("background-color") == "rgb(255, 255, 0)") {
                        rightAnswer(5);
                    }
                    else {
                        wrongAnswer(5);
                    }

                    //Question 6
                    if (q6Response == "mw") {
                        rightAnswer(6);
                    }
                    else {
                        wrongAnswer(6);
                    }
                    
                    //Question 7
                    if (q7Response == "Alaska") {
                        rightAnswer(7);
                    }
                    else {
                        wrongAnswer(7);
                    }
                    
                    //Question 8
                    if (q8Response == "california") {
                        rightAnswer(8);
                    }
                    else {
                        wrongAnswer(8);
                    }
                    
                    //Question 9
                    if ($("#Mexico").is(":checked") && $("#Canada").is(":checked") &&
                    !$("#Cuba").is(":checked") && !$("#Nicaragua").is(":checked")) {
                        rightAnswer(9);
                    }
                    else {
                        wrongAnswer(9);
                    }
                     
                    //Question 10
                    if($("#biden").css("background-color") == "rgb(255, 255, 0)")  {
                        rightAnswer(10);
                    }
                    else {
                        wrongAnswer(10);
                    }
                
                    if (score < 80) {
                        $("#totalScore").html(`<h2 class="text-danger">Total Score: ${score}</h2>`);
                    }
                    else {
                        $("#totalScore").html(`<h2 class="text-success">Congragulations! Total Score: ${score}</h2>`);
                    }
                    
                    $("#totalAttempts").html(`Total Attempts: ${++attempts}`);
                    localStorage.setItem("total_attempts", attempts);
                }
            })
        </script>
        
    </head>
    
    
    <body class="text-center">
        
        <h1 class="jumbotron"> US Georgraphy Quiz </h1>
        
        <!-- Question 1 -->
        <h3><span id="markImg1"></span>What is the Capital of California?</h3>
        <input type="text" id="q1">
        <br><br>
        <div id="q1Feedback"></div>
        <br>
        
        <!-- Question 2 -->
        <h3><span id="markImg2"></span>What is the longest river?</h3>
        <select id="q2">
            <option value="">Select One</option>
            <option value="ms">Mississippi</option>
            <option value="mo">Missouri</option>
            <option value="co">Colorado</option>
            <option value="de">Delaware</option>
        </select>
        <br><br>
        <div id="q2Feedback"></div>
        <br>
        
        <!-- Question 3 -->
        <h3><span id="markImg3"></span>What presidents are carved into mount Rushmore?</h3>
        <input type="checkbox" id="Jackson">    <label for="Jackson"> A. Jackson  </label>
        <input type="checkbox" id="Franklin">    <label for="Franklin"> B. Franklin  </label>
        <input type="checkbox" id="Jefferson">    <label for="Jefferson"> T. Jefferson  </label>
        <input type="checkbox" id="Roosevelt">    <label for="Roosevelt"> T. Roosevelt  </label>
        <br><br>
        <div id="q3Feedback"></div>
        <br>
        
        <!-- Question 4 -->
        <h3><span id="markImg4"></span>What is the smallest US state?</h3>
        <div id="q4Choices"></div>
        <div id="q4Feedback"></div>
        <br><br>
        
        <!-- Question 5 -->
        <h3><span id="markImg5"></span>What image is the Great Seal of the State of California?</h3>
        <img src="img/seal1.png" alt="Seal 1" class="q5Choice" id="seal1">
        <img src="img/seal2.png" alt="Seal 2" class="q5Choice" id="seal2">
        <img src="img/seal3.png" alt="Seal 3" class="q5Choice" id="seal3">
        <br><br>
        <div id="q5Feedback"></div>
        <br>
        
        <h3><span id="markImg6"></span>What's the tallest mountain in the continental US?</h3>
        <select id="q6">
            <option value="">Select One</option>
            <option value="mw">Mount Whitney, Ca</option>
            <option value="pp">Pikes Peak, Co</option>
            <option value="mr">Mount ranier, Wa</option>
            <option value="me">Mount Elbert, Co</option>
        </select>
        <br><br>
        <div id="q6Feedback"></div>
        <br>

        <h3><span id="markImg7"></span>What's the largest state by area?</h3>
        <div id="q7Choices"></div>
        <div id="q7Feedback"></div>
        <br>
        
        <h3><span id="markImg8"></span>What the largest state by population?</h3>
        <input type="text" id="q8">
        <br><br>
        <div id="q8Feedback"></div>
        <br>
        
        <h3><span id="markImg9"></span>What countries border the AS?</h3>
        <input type="checkbox" id="Mexico">    <label for="Mexico"> Mexico  </label>
        <input type="checkbox" id="Canada">    <label for="Canada"> Canada  </label>
        <input type="checkbox" id="Cuba">    <label for="Cuba"> Cuba  </label>
        <input type="checkbox" id="Nicaragua">    <label for="Nicaragua"> Nicaragua  </label>
        <br><br>
        <div id="q9Feedback"></div>
        <br>
        
        <h3><span id="markImg10"></span>Who will be President of the US in 2021?</h3>
        <img src="img/Biden.Transparent.png" alt="binden" class="q10Choice" id="biden">
        <img src="img/Sanders.Transparent.png" alt="Sanders" class="q10Choice" id="sanders">
        <img src="img/Harris.Transparent.png" alt="Harris" class="q10Choice" id="harris">
        <br><br>
        <div id="q10Feedback"></div>
        <br>
        
        <h3 id="validationFdbk" class="bg-danger text-white"></h3>
        <button class="btn btn-outline-success"> Submit Quiz </button>
        <br>
        <!-- <h2 id="totalScore" class="text-info"></h2> -->
        <div id="totalScore"></div>
        
        <h3 id="totalAttempts"></h3>
    </body>
</html>

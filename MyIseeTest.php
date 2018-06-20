



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


 
<?php
//We start the session to put the Question numbers and pass it to the next page
if (!isset($_SESSION)) {
    session_start();
}
?>
<html class="main">
    <head>
        <meta charset="UTF-8">
        <link href="Styles.css" rel="stylesheet" type="text/css"/>
        <style>
            /*
            body{font-size: 16px}
            html{font-size:110%;} 
                @media(min-width:60em){html{font-size: 90%}
                }
                This media query is saying that text should be 90% (of our default 16px) on desktop,
                but on mobile it should be 110% (of our default 16px).
            */
 
 
            html,body{
                font-size: 16px;
 
 
            }
 
 
            .gradient {
                background-image:
 
                    linear-gradient(
                    to bottom right, 
                    white, 
                     #ebffe4
 
                    );
            }
 
            .main{
                height: 100%;
                width: 100%;
                font-size: 16px;               
 
            }
 
            .questionContainner{
                width: 50%; 
                height: 70%;
                overflow-y: auto; 
                font-family: sans-serif;                     
                font-size: 200%;                
              /*  background-color: #ccccff; */
                text-align: center;
                position: relative; 
                text-transform: uppercase;
                border: azure ;
                background-color: Gainsboro;
                padding-top: 5px;
                padding-right: 10px;
                padding-bottom: 5px;
                padding-left: 10px;
                color: black;
 
            }
 
            .answerContainer{
                width: 50%; 
                height: 60%;
                overflow-y: auto; 
                font-family: sans-serif;                     
                font-size: 150%;                
              /*  background-color: #ccccff; */
                text-align: left;
                
                position: relative; 
                border: azure ;
                background-color: Gainsboro;
                padding-top: 5px;
                padding-right: 10px;
                padding-bottom: 5px;
                padding-left: 10px;
                color: black;
 
                }
                
                .answerCell{
                    padding-left: 30%;
                    
                }
 
                direction{
                    font-size: 200%;
 
                }
 
 
body {
        background: #e6e6e6;
}
 

 .questionNumberBar{
                border-style: solid;
                border-color: #003333;
                border-width: 1px;
                background-color: #859999;
                text-align:center;
                border-radius: 30%;
                color: black;
                font-size: 150%;
                text-decoration:none;
                width:5%;
 
 
            }
 
            .questionNumberBarCurrent{
                border-style: solid;
                border-color: #003333;
                border-width: 1px;
                background-color: #856c6e;
                text-align:center;
                border-radius: 30%;
                 color: black;
                font-size: 150%;
                text-decoration:none;
                width:5%;
 
            }
 
 
.control-group {
        display: inline-block;
        /*width: 200px;
        height: 210px;
        margin: 10%;
        padding: 30%;
        text-align: center;
        vertical-align: central;
        /*background: #fff;
        box-shadow: 0 1px 2px rgba(0,0,0,.1);*/
}
.control {
        
        position: relative;
        display: block;
        margin-bottom: 15px;
        padding-left: 30px;
        cursor: pointer;
}
 
.control input {
        position: absolute;
        z-index: -1;
        opacity: 0;
}
.control__indicator {
        position: absolute;
        top: 2px;
        left: 0;
        width: 20px;
        height: 20px;/*
        background: #e6e6e6;  */
        background:white;
}
 
.control--radio .control__indicator {
        border-radius: 50%;
}
/* Hover and focus states */
.control:hover input ~ .control__indicator,
.control input:focus ~ .control__indicator {
        background: #ccc;
}
 
/* Checked state */
.control input:checked ~ .control__indicator {
        background: #2aa1c0;
}
 
/* Hover state whilst checked */
.control:hover input:not([disabled]):checked ~ .control__indicator,
.control input:checked:focus ~ .control__indicator {
        background: #0e647d;
}
 
/* Disabled state */
.control input:disabled ~ .control__indicator {
        pointer-events: none;
        opacity: .6;
        background: #e6e6e6;
}
 
/* Check mark */
.control__indicator:after {
        position: absolute;
        display: none;
        content: '';
}
 
/* Show check mark */
.control input:checked ~ .control__indicator:after {
        display: block;
}
 
/* Checkbox tick */
.control--checkbox .control__indicator:after {
        top: 4px;
        left: 8px;
        width: 3px;
        height: 8px;
        transform: rotate(45deg);
        border: solid #fff;
        border-width: 0 2px 2px 0;
}
 
/* Disabled tick colour */
.control--checkbox input:disabled ~ .control__indicator:after {
        border-color: #7b7b7b;
}
 
/* Radio button inner circle */
.control--radio .control__indicator:after {
        top: 7px;
        left: 7px;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #fff;
}
 
/* Disabled circle colour */
.control--radio input:disabled ~ .control__indicator:after {
        background: #7b7b7b;
}
 
 
 
 
 
        </style>
        <title>Charts App</title>
    </head>
 
    <body class="main">
 
        <?php
        $firstQuestion = 1;
        $questionNumber = $thisQuestion = "";
        $answer1 = $answer2 = $answer3 = $answer4 = $selectedAnswer = "";
        $QuestionList = array("", "PRINCIPLE", "APTITUDE",
            "EULOGY", "SUCCINCT","APATHY","PRINCIPLE", "APTITUDE",
            "EULOGY", "SUCCINCT","APATHY","PRINCIPLE", "APTITUDE",
            "EULOGY", "SUCCINCT","APATHY","PRINCIPLE", "APTITUDE",
            "EULOGY", "SUCCINCT","APATHY");
        $answer1 = array("", "chief", "standard", "theory", "leader");
        $answer2 = array("", "reason", "difficulty", "mistake", "ability");
        $answer3 = array("", "encouragement", "tribute", "complement", "exam");
        $answer4z = array("", "subterranean", "convoluted", "hurtful", "direct");
 
        function getQuestion($questionNumber, $QuestionList1) {
            return $QuestionList1[$questionNumber];
        }
        
        function getAnswer($answerNumber, $answerList){
            return $answerList[$answerNumber];
        }
 
        if (isset($_SESSION["currentQuesstionNumber"])) {
            $lastQuestionNumber = $_SESSION["currentQuesstionNumber"];
            if (isset($_POST["next"])) {
                $questionNumber = $lastQuestionNumber + 1;
                $_SESSION["currentQuesstionNumber"] = $questionNumber;
            }
            if (isset($_POST["pre"])) {
                $questionNumber = $lastQuestionNumber - 1;
                $_SESSION["currentQuesstionNumber"] = $questionNumber;
            }
        } else {
            $_SESSION["currentQuesstionNumber"] = 1;
        }
        ?>
        <div id="25percentHeight" style="height: 25%">
 
        <table  style="width: 100%; height: 100%; ">
            <tr>
                <td class="BigFontCenter  " style="width: 100%;text-align: center; height: 60%;">
                    <div style=" " class="BigFontCenter  ">VERBAL REASONING </div>
 
                <td style="width: 35%; ">
                    <table>
                        <tr>
                            <td>
 
                            </td>
                        </tr>
                    </table>
                    <div class="SolidBorder" id="clockdiv">  
                        <div>
                            <span><img width="25" height="25" src="Images/clock.png" ></span>
                            <span class="TimerBox">Remaining Time</span>
                        </div>
                        <div class="BigFontCenter">
                            <span class="minutes"></span>
                            <span class="seconds"></span>
                        </div>
                    </div>
               </td>
                </td>
            </tr>
            <tr>
                <td  style="background-color: #d9e5ff; font-size: 200%; ;" colspan="2">
                    <span ><b>Directions:</b> Select the word that is most nearly the same in meaning as the word in capital letters.</span>
                </td>
            </tr>
        </table>
 
</div>
        
<div id="5percent" style="height: 5%">
 
                       <table  style="height: 100%; width: 100%">
                <tr>
 
 
                                    <?php for($x = 1; $x < count($QuestionList); $x++) {
                                        $className = "questionNumberBar";
                                        if ($_SESSION["currentQuesstionNumber"] == $x) {
                                            $className = "questionNumberBarCurrent";
                                        }
 
 
                          echo '<td class="'.$className.'"> <a style="color:black;text-decoration:none" href="test2.php/question?'. $x .'"><div style="width=100%;height=100%">'. $x .'</div></a></td>';
 
 
                                }
        ?> 
                </tr>
            </table>
 
 
 
 
        </div>
 
        
        
        <div id="70percentheight" style="height: 70%">
 
 
 
 
 
            <form style="height: 100%" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
 
            <table style="width: 100%;height: 100%; color: #dbe0e0">
                <tr style="height: 50%;">
                    <td class="questionContainner">
<?php
echo $_SESSION["currentQuesstionNumber"] . '. ';
 
echo getQuestion($_SESSION["currentQuesstionNumber"], $QuestionList)
//                   
?>
                    </td>
 
                    <td class="answerContainer">
                        <table style="width: 80%; background-color: #eef0f0; ">
                            <tr style="width: 100%">
                                <td class="answerCell" > 
 
                        <div class="control-group">
 
   <label class="control control--radio">
                                <input type="radio"  name="userAnswer" <?php if (isset($thisAnswer) && $thisAnswer == "A") echo "checked"; ?> value="A">
                                <?php
                                 echo getAnswer(1, ${'answer'.$_SESSION["currentQuesstionNumber"]});
                                ?>
 
                                <div class="control__indicator"></div>
                            </label>                        </div>
                            <div style="padding-left: 5%"><hr/></div> 
                    </td>
 
                </tr>
                <tr>
                    <td class="answerCell">
 
 
                        <div class="control-group">
 
   <label class="control control--radio">
                                <input type="radio"  name="userAnswer" <?php if (isset($thisAnswer) && $thisAnswer == "B") echo "checked"; ?> value="A">
                                <?php
                                 echo getAnswer(2, ${'answer'.$_SESSION["currentQuesstionNumber"]});
                                ?>
 
                                <div class="control__indicator"></div>
                            </label>                        </div>
 
                       <div style="padding-left: 5%"><hr/></div>   
                </td>
                </tr>
                <tr>
                    <td  class="answerCell">
                        <div class="control-group">
 
  <label class="control control--radio">
                                <input type="radio"  name="userAnswer" <?php if (isset($thisAnswer) && $thisAnswer == "C") echo "checked"; ?> value="A">
                                <?php
                                 echo getAnswer(3, ${'answer'.$_SESSION["currentQuesstionNumber"]});
                                ?>
 
                                <div class="control__indicator"></div>
                            </label>                        </div>
 
                       <div style="padding-left: 5%"><hr/></div>   
                </td>
                </tr>
                <tr>
                    <td  class="answerCell">
                         <div class="control-group">
 
   <label class="control control--radio">
                                <input type="radio"  name="userAnswer" <?php if (isset($thisAnswer) && $thisAnswer == "D") echo "checked"; ?> value="A">
                                <?php
                                 echo getAnswer(4, ${'answer'.$_SESSION["currentQuesstionNumber"]});
                                ?>
 
                                <div class="control__indicator"></div>
                            </label>                        </div>
 
                       <div style="padding-left: 5%"><hr/></div>   
                </td>
                </tr>
 
            </table>
 
        </td>
    </tr>
    <tr>
        <td style="">
            <input style="font-size: 150%; color: #0033cc; float: right;" type="submit" name="pre" value="PREVIOUS"> 
        </td>
        <td>
 
            <input style="font-size: 150%; color: #0033cc; margin-left: 5%; " type="submit" name="next"  value="NEXT"> 
        </td>
    </tr>
 
</table>
 
 
</form>
 
         </div>
 
<script>
 
 
    var givenTimeInMinutes = 10;
    var currentTime = Date.parse(new Date());
    var endtime = new Date(currentTime + givenTimeInMinutes * 60 * 1000);
 
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }
 
    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
//  var daysSpan = clock.querySelector('.days');
//  var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');
 
        function updateClock() {
            var t = getTimeRemaining(endtime);
 
            //  daysSpan.innerHTML = t.days;
            //  hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2) + ': ';
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
 
            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }
 
        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }
 
//var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
    initializeClock('clockdiv', endtime);
 
// if there's a cookie with the name myClock, use that value as the deadline
    if (document.cookie && document.cookie.match('myClock')) {
        // get deadline value from cookie
        var deadline = document.cookie.match(/(^|;)myClock=([^;]+)/)[2];
    }
 
// otherwise, set a deadline 10 minutes from now and 
// save it in a cookie with that name
    else {
        // create deadline 10 minutes from now
        var timeInMinutes = 10;
        var currentTime = Date.parse(new Date());
        var deadline = new Date(currentTime + timeInMinutes * 60 * 1000);
 
        // store deadline in cookie for future reference
        document.cookie = 'myClock=' + deadline + '; path=/; domain=.yourdomain.com';
    }
 
 
</script>
 
 
 
 
 
</body>
 
 
</html>
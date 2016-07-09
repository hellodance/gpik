<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->setPageTitle("Gympik- Lifestyle to help you fine-tune your workout/diet plans");
?>
<style>
    textarea {
        color: #8FBD34;
        height: auto;
        width: 100%;
        font-weight: bolder;
    }

</style>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/running-calorie-burn-calculator.js">
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/walking-calorie-burn-calculator.js">
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/daily-caloric-expenditure-calculator.js">
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/heart-rate-based-caloric-expenditure-calculator.js">
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/bmr-calculator.js">
</script>
<div id="content-area">
<div class="container inner">
<div class="row-fluid">
<div class="span12">
<div class="box-profil about">
<ul class="categories">
    <li class="active"><a href="#calculator" class="work-schedule">Running Calorie Burn Calculator</a><span class="radius-bottom"></span></li>
    <li class=""><a href="#calculator1" class="walking">Walking Calorie Burn Calculator</a><span class="radius-bottom"></span></li>
    <li class=""><a href="#calculator2" class="chart">Daily Calorie Expenditure Calculator</a><span class="radius-bottom"></span></li>
    <li class=""><a href="#calculator3" class="hart-c">Heart Rate Based Calorie Burn Calculator</a> <span class="radius-bottom"></span></li>
    <li class=""> <a href="#calculator4" class="bmr-c">BMR Calculator</a> <span class="radius-bottom"></span></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="calculator">
    <h1>Running Calorie Burn Calculator</h1>
    <div class="calculator-left">
        <form  name="runningcalorieburncalculatorform" action="#">
            <div class="control-group">
                <label class="control-label" for="" style="">Age</label>
                <div class="controls">
                    <input type="text" id="inputName" name="age" placeholder="Your Age"><p><input class="validationfeedbackfield" type="text" name="agefieldvalidation" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Weight</label>
                <div class="controls">
                    <input type="text" id="inputName" placeholder="" name="weight">
                    <select name="weightunits">
                        <option value="Pounds">Pounds</option>
                        <option value="kilograms">Kilograms</option>
                    </select>
                    <span class="weightfieldvalidation"></span>
                    <p><input class="validationfeedbackfield" type="text" name="weightfieldvalidation" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">20 Second Resting Heart Rate</label>
                <div class="controls">
                    <input type="text" id="inputName" placeholder="" name="twentysecondheartrate">
                    <p><input class="validationfeedbackfield" style="width:300px;" type="text" name="twentysecondheartratefieldvalidation" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">On Treadmill?</label>
                <div class="controls">
                    <select name="treadmillquestion">
                        <option value="Select">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Running Surface Grade </label>
                <div class="controls">
                    <select name="grade">
                        <option  value="-20">20% Decline</option>
                        <option  value="-19">19% Decline</option>
                        <option  value="-18">18% Decline</option>
                        <option  value="-17">17% Decline</option>
                        <option  value="-16">16% Decline</option>
                        <option  value="-15">15% Decline</option>
                        <option  value="-14">14% Decline</option>
                        <option  value="-13">13% Decline</option>
                        <option  value="-12">12% Decline</option>
                        <option  value="-11">11% Decline</option>
                        <option  value="-10">10% Decline</option>
                        <option  value="-9">9% Decline</option>
                        <option  value="-8">8% Decline</option>
                        <option  value="-7">7% Decline</option>
                        <option  value="-6">6% Decline</option>
                        <option  value="-5">5% Decline</option>
                        <option  value="-4">4% Decline</option>
                        <option  value="-3">3% Decline</option>
                        <option  value="-2">2% Decline</option>
                        <option  value="-1">1% Decline</option>
                        <option  value="0" selected="selected" >Level</option>
                        <option  value="1">1% Incline</option>
                        <option  value="2">2% Incline</option>
                        <option  value="3">3% Incline</option>
                        <option  value="4">4% Incline</option>
                        <option  value="5">5% Incline</option>
                        <option  value="6">6% Incline</option>
                        <option  value="7">7% Incline</option>
                        <option  value="8">8% Incline</option>
                        <option  value="9">9% Incline</option>
                        <option  value="10">10% Incline</option>
                        <option  value="11">11% Incline</option>
                        <option  value="12">12% Incline</option>
                        <option  value="13">13% Incline</option>
                        <option  value="14">14% Incline</option>
                        <option  value="15">15% Incline</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Run Distance</label>
                <div class="controls">
                    <input type="text" id="inputName" placeholder="" name="rundistance">
                    <select name="rundistanceunits">
                        <option value="kilometers">Kilometers</option>
                        <option value="miles">Miles</option></select>
                    <p><input class="validationfeedbackfield" type="text" name="rundistancefieldvalidation" style="width:200px;" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <button type="button" class="btn btn-primary" onclick="runningcalorieburncalculator();">Calculate Calorie Burn</button>

               <p>&nbsp;</p>
                <textarea class="outputdisplay" name="outputdisplay"  style="border: none; background-color: #ffffff;"  readonly></textarea>
                <!--<input class="outputdisplay" type="text" name="outputdisplay">-->
            </div>
        </form>
    </div>
    <div class="calculator-right">
        <p>This running calorie burn calculator estimates the calories that you burn while running any given distance. The calculator takes
            into consideration the grade of the running surface that you are on (i.e. the incline or decline), whether you are running on a treadmill
            or not, and your fitness level.</p>
        <p>The incline or decline of the running surface is taken into consideration because more calories are
            burned as the incline of the running surface increases, and less calories are burned as the decline of the surface increases (until -10%
            grade, beyond which any further decline will cause an increase in calorie burn, similar to the effect of increasing the incline). Whether
            or not you are running on a treadmill is taken into consideration because treadmill runners do not need to overcome air resistance and
            therefore consume slightly less energy than those running on solid ground. Fitness level (measured through VO2max estimation) is taken
            into consideration because there is a known negative correlation between VO2max and energy cost of running (i.e. with increased fitness,
            or VO2max, you will burn less calories to run a given distance).</p>
    </div>

    <p><strong>Note:</strong> This calculator provides net calorie burn estimates. If you want to convert the estimate to gross calorie burn, memorize the number and click here. If you want to learn more about net and gross calorie burn, read the Net Versus Gross Calorie Burn article.</p>
</div>
<div class="tab-pane" id="calculator1">
    <h1>Walking Calorie Burn Calculator</h1>
    <div class="calculator-left">
        <form name="walkingcalorieburncalculatorform" action="#">
            <div class="control-group">
                <label class="control-label" for="">Weight</label>
                <div class="controls">
                    <input type="text" id="inputName" name="weight" placeholder="">
                    <select name="weightunits">
                        <option value="pounds">Pounds</option>
                        <option value="kilograms">Kilograms</option>
                    </select>
                    <p><input class="validationfeedbackfield" type="text" name="weightfieldvalidation" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputTelephone">Walking Surface Grade </label>
                <div class="controls">
                    <select name="grade">
                        <option  value="-5">5% Decline</option>
                        <option  value="-4">4% Decline</option>
                        <option  value="-3">3% Decline</option>
                        <option  value="-2">2% Decline</option>
                        <option  value="-1">1% Decline</option>
                        <option  value="0" selected="selected" >Level</option>
                        <option  value="1">1% Incline</option>
                        <option  value="2">2% Incline</option>
                        <option  value="3">3% Incline</option>
                        <option  value="4">4% Incline</option>
                        <option  value="5">5% Incline</option>
                        <option  value="6">6% Incline</option>
                        <option  value="7">7% Incline</option>
                        <option  value="8">8% Incline</option>
                        <option  value="9">9% Incline</option>
                        <option  value="10">10% Incline</option>
                        <option  value="11">11% Incline</option>
                        <option  value="12">12% Incline</option>
                        <option  value="13">13% Incline</option>
                        <option  value="14">14% Incline</option>
                        <option  value="15">15% Incline</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Walk Distance</label>
                <div class="controls">
                    <input type="text" id="inputName" placeholder="" name="walkdistance">
                    <select name="walkdistanceunits">
                        <option value="kilometers">Kilometers</option>
                        <option value="miles">Miles</option>
                    </select>
                    <p><input class="validationfeedbackfield" type="text" name="walkdistancefieldvalidation" style="width:200px;" readonly = "true"></p>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="">Walk Time</label>
                <div class="controls">
                    <input type="text" id="inputName" placeholder="Minutes" name="minutes">
                    <input type="text" id="inputName" placeholder="Seconds" name="seconds">
                    <p><input class="validationfeedbackfield" type="text" name="timefieldvalidation" style="width:225px" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <button type="button" class="btn btn-primary" onclick="walkingcalorieburncalculator();">Calculate Calorie Burn</button>
            </div>
            <p>&nbsp;</p>
            <textarea class="outputdisplay" name="outputdisplay"  style="border: none; background-color: #ffffff;" readonly></textarea>
            <!--<p><input class="outputdisplay" type="text" name="outputdisplay"></p>-->
        </form>
    </div>
    <div class="calculator-right">
        <p>For a walking surface grade between -5% to +5% inclusive, this walking calorie burn calculator is based on equations (shown below) derived by ShapeSense.com from experimental data displayed in Figure 3 of the study titled "Energy Cost of Running," by R Margaria, P Cerretelli, P Aghemo, and G Sassi (note that the data on walking energy expenditure was originally printed in the study titled "Sulla fisiologia, e specialmente sul consumo energetico, della marcia e della corsa a varie velocita ed inclinazioni del terreno," by R. Margaria).</p>
        <p>For a walking surface grade between +6% to +15% inclusive, this walking calorie burn calculator is based on the American College of Sports Medecine (ACSM) metabolic equation for walking oxygen consumption (i.e. VO2), with a subsequent conversion from VO2 to calorie burn included by ShapeSense.com. These equations are shown below.</p>
    </div>

    <p><strong>Note:</strong> This calculator provides <strong>gross</strong> calorie burn estimates. If you want to convert the estimate to <strong>net</strong> calorie burn, memorize the number and <a href="#">click here.</a> If you want to learn more about net and gross calorie burn, read the <a href="#">Net Versus Gross Calorie Burn</a> article.</p>
</div>
<div class="tab-pane" id="calculator2">
    <h1>Daily Caloric Expenditure Calculator</h1>
    <div class="calculator-left">
        <form name="dailycaloricexpenditureform" action="#">
            <div class="control-group">
                <label class="control-label" for="">Gender</label>
                <div class="controls">
                    <select name="gender">
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Age</label>
                <div class="controls">
                    <input type="text" name="age" id="inputName" placeholder="">
                    <p><input class="validationfeedbackfield" type="text" name="agefieldvalidation" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Weight</label>
                <div class="controls">
                    <input type="text" name="weight" id="inputName" placeholder="">
                    <select name="weightunits">
                        <option value="pounds">Pounds</option>
                        <option value="kilograms">Kilograms</option>
                    </select>
                    <p><input class="validationfeedbackfield" type="text" name="weightfieldvalidation" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputTelephone">Height </label>
                <div class="controls">
                    <select name="height" STYLE="width: auto;">
                        <option value="122">4ft 0in (122cm)</option>
                        <option value="124">4ft 1in (124cm)</option>
                        <option value="127">4ft 2in (127cm)</option>
                        <option value="130">4ft 3in (130cm)</option>
                        <option value="132">4ft 4in (132cm)</option>
                        <option value="135">4ft 5in (135cm)</option>
                        <option value="137">4ft 6in (137cm)</option>
                        <option value="140">4ft 7in (140cm)</option>
                        <option value="142">4ft 8in (142cm)</option>
                        <option value="145">4ft 9in (145cm)</option>
                        <option value="147">4ft 10in (147cm)</option>
                        <option value="150">4ft 11in (150cm)</option>
                        <option value="152">5ft 0in (152cm)</option>
                        <option value="155">5ft 1in (155cm)</option>
                        <option value="157">5ft 2in (157cm)</option>
                        <option value="160">5ft 3in (160cm)</option>
                        <option value="163">5ft 4in (163cm)</option>
                        <option selected="selected" value="165">5ft 5in (165cm)</option>
                        <option value="168">5ft 6in (168cm)</option>
                        <option value="170">5ft 7in (170cm)</option>
                        <option value="173">5ft 8in (173cm)</option>
                        <option value="175">5ft 9in (175cm)</option>
                        <option value="178">5ft 10in (178cm)</option>
                        <option value="180">5ft 11in (180cm)</option>
                        <option value="183">6ft 0in (183cm)</option>
                        <option value="185">6ft 1in (185cm)</option>
                        <option value="188">6ft 2in (188cm)</option>
                        <option value="191">6ft 3in (191cm)</option>
                        <option value="193">6ft 4in (193cm)</option>
                        <option value="196">6ft 5in (196cm)</option>
                        <option value="198">6ft 6in (198cm)</option>
                        <option value="201">6ft 7in (201cm)</option>
                        <option value="203">6ft 8in (203cm)</option>
                        <option value="206">6ft 9in (206cm)</option>
                        <option value="208">6ft 10in (208cm)</option>
                        <option value="211">6ft 11in (211cm)</option>
                        <option value="213">7ft 0in (213cm)</option>
                        <option value="216">7ft 1in (216cm)</option>
                        <option value="218">7ft 2in (218cm)</option>
                        <option value="221">7ft 3in (221cm)</option>
                        <option value="224">7ft 4in (224cm)</option>
                        <option value="226">7ft 5in (226cm)</option>
                        <option value="229">7ft 6in (229cm)</option>
                        <option value="231">7ft 7in (231cm)</option>
                        <option value="234">7ft 8in (234cm)</option>
                        <option value="236">7ft 9in (236cm)</option>
                        <option value="239">7ft 10in (239cm)</option>
                        <option value="241">7ft 11in (241cm)</option>
                        <option value="244">8ft 0in (244cm)</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Activity Level</label>
                <div class="controls">
                    <select name="activitylevelfactor" STYLE="width: auto;">
                        <option value="1.2">Sedentary</option>
                        <option value="1.375">Lightly Active</option>
                        <option value="1.55">Moderately Active</option>
                        <option value="1.725">Very Active</option>
                        <option value="1.9">Extremely Active</option>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <button type="button" class="btn btn-primary"  onclick="dailycaloricexpenditure();">Calculate Calorie Burn</button>
                <textarea class="outputdisplay" name="outputdisplay"  style="border: none; background-color: #ffffff;" readonly></textarea>
            <!--<p><input class="outputdisplay" type="text" name="outputdisplay"></p>-->
            </div>
        </form>
    </div>
    <div class="calculator-right">
        <p><strong>Equations</strong></p>
        <p>This calculator provides an estimate of your total daily caloric expenditure by multiplying the Harris-Benedict equations for basal metabolic rate by an "Activity Level Factor" that accounts for your daily physical activity levels and the thermic effect of food. The equations used by this calculator are shown below.</p>
        <ul>
            <li>Male (metric): DCE = ALF x ((13.75 x WKG) + (5 x HC) - (6.76 x age) + 66)</li>
            <li>Male (imperial): DCE = ALF x ((6.25 x WP) + (12.7 x HI) - (6.76 x age) + 66)</li>
            <li>Female (metric): DCE = ALF x ((9.56 x WKG) + (1.85 x HC) - 4.68 x age) + 655)</li>
            <li>Female (imperial): DCE = ALF x ((4.35 x WP) + (4.7 x HI) - 4.68 x age) + 655)</li>

        </ul>
    </div>

    <p><strong>Note:</strong> This calculator provides <strong>gross</strong> calorie burn estimates. If you want to convert the estimate to <strong>net</strong> calorie burn, memorize the number and <a href="#">click here.</a> If you want to learn more about net and gross calorie burn, read the <a href="#">Net Versus Gross Calorie Burn</a> article.</p>
</div>
<div class="tab-pane" id="calculator3">
    <h1>Heart Rate Based Calorie Burn Calculator</h1>
    <div class="calculator-left">
        <form name="hrbasedcaloricexpenditurecalculatorform" action="#">
            <div class="control-group">
                <label class="control-label" for="">Gender</label>
                <div class="controls">
                    <select name="gender">
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Age</label>
                <div class="controls">
                    <input type="text" id="inputName" name="age" placeholder="Your Age">
                    <p><input class="validationfeedbackfield" type="text" name="agefieldvalidation" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Weight</label>
                <div class="controls">
                    <input type="text" id="inputName" name="weight" placeholder="">
                    <select name="weightunits">
                        <option value="pounds">Pounds</option>
                        <option value="kilograms">Kilograms</option>
                    </select>
                    <p><input class="validationfeedbackfield" type="text" name="weightfieldvalidation" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputTelephone">Activity Duration</label>
                <div class="controls">
                    <input type="text" id="inputName" name="minutes" placeholder="Minutes">
                    <input type="text" id="inputName" name="seconds" placeholder="Seconds">
                </div>
                <p><input class="validationfeedbackfield" type="text" name="timefieldvalidation" style="width:200px" readonly = "true"></p>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Average Heart Rate<br />(in beats/minute)</label>
                <div class="controls">
                    <input type="text" id="inputName" name="heartrate" placeholder="">
                    <p><input class="validationfeedbackfield" style="width: 342px;" type="text" name="heartratefieldvalidation" readonly = "true"/></p>
                </div>
            </div>

            <div class="control-group">
                <button type="button" class="btn btn-primary" onclick="hrbasedcaloricexpenditurecalculator();">Calculate Calorie Burn</button>
            </div>
            <p>&nbsp;</p>
            <textarea class="outputdisplay" name="outputdisplay"  style="border: none; background-color: #ffffff;" ></textarea>
            <!--<p ><input class="outputdisplay" type="text" name="outputdisplay">
             <input class="outputdisplay" type="text" name="outputdisplay2">
             <input class="outputdisplay" type="text" name="outputdisplay3">
             <input class="outputdisplay" type="text" name="outputdisplay4"></p>-->
        </form>
    </div>
    <div class="calculator-right">
        <p>This calculator is based on the equations (shown below) derived by LR Keytel, JH Goedecke, TD Noakes, H Hiiloskorpi, R Laukkanen, L van der Merwe, and EV Lambert for their study titled "Prediction of energy expenditure from heart rate monitoring during submaximal exercise."</p>
        <p>The experimental data on which this calculator is based covers an exercise intensity level that ranges from between 41% to 80% of VO2max. The calculator will not provide an estimate of heart rate based caloric expenditure below 41% of VO2max (or roughly 64% of maximum heart rate according to the Swain et al. correlation) because the relationship between heart rate and caloric expenditure is not considered to be reliable below the test data lower limit. The calculator does, however, provide an estimate of heart rate based caloric expenditure above the test data upper limit of 80% of VO2max (or roughly 89% of maximum heart rate according to the Swain et al.</p>
    </div>

    <p><strong>Note:</strong> Use this calculator if you don't know your <abbr title="Maximal Oxygen Consumption">VO2max</abbr>. If you know your <abbr title="Maximal Oxygen Consumption">VO2max</abbr> you should use the calculator below this one, as it is considered to be slightly more accurate. If you want to estimate your <abbr title="Maximal Oxygen Consumption">VO2max</abbr>, click <a href="#">here.</a></p>
</div>
<div class="tab-pane" id="calculator4">
    <h1>BMR Calculator</h1>
    <div class="calculator-left">
        <form name="bmrcalculatorform" action="#">
            <div class="control-group">
                <label class="control-label" for="">Gender</label>
                <div class="controls">
                    <select name="gender">
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Age</label>
                <div class="controls">
                    <input type="text" id="inputName" name="age" placeholder="">
                    <p><input class="validationfeedbackfield" type="text" name="agefieldvalidation" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="">Weight</label>
                <div class="controls">
                    <input type="text" id="inputName" name="weight" placeholder="">
                    <select name="weightunits">
                        <option value="pounds">Pounds</option>
                        <option value="kilograms">Kilograms</option>
                    </select>
                    <p><input class="validationfeedbackfield" type="text" name="weightfieldvalidation" readonly = "true"></p>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputTelephone">Height </label>
                <div class="controls">
                    <select name="height" STYLE="width: auto;">
                        <option value="122">4ft 0in (122cm)</option>
                        <option value="124">4ft 1in (124cm)</option>
                        <option value="127">4ft 2in (127cm)</option>
                        <option value="130">4ft 3in (130cm)</option>
                        <option value="132">4ft 4in (132cm)</option>
                        <option value="135">4ft 5in (135cm)</option>
                        <option value="137">4ft 6in (137cm)</option>
                        <option value="140">4ft 7in (140cm)</option>
                        <option value="142">4ft 8in (142cm)</option>
                        <option value="145">4ft 9in (145cm)</option>
                        <option value="147">4ft 10in (147cm)</option>
                        <option value="150">4ft 11in (150cm)</option>
                        <option value="152">5ft 0in (152cm)</option>
                        <option value="155">5ft 1in (155cm)</option>
                        <option value="157">5ft 2in (157cm)</option>
                        <option value="160">5ft 3in (160cm)</option>
                        <option value="163">5ft 4in (163cm)</option>
                        <option selected="selected" value="165">5ft 5in (165cm)</option>
                        <option value="168">5ft 6in (168cm)</option>
                        <option value="170">5ft 7in (170cm)</option>
                        <option value="173">5ft 8in (173cm)</option>
                        <option value="175">5ft 9in (175cm)</option>
                        <option value="178">5ft 10in (178cm)</option>
                        <option value="180">5ft 11in (180cm)</option>
                        <option value="183">6ft 0in (183cm)</option>
                        <option value="185">6ft 1in (185cm)</option>
                        <option value="188">6ft 2in (188cm)</option>
                        <option value="191">6ft 3in (191cm)</option>
                        <option value="193">6ft 4in (193cm)</option>
                        <option value="196">6ft 5in (196cm)</option>
                        <option value="198">6ft 6in (198cm)</option>
                        <option value="201">6ft 7in (201cm)</option>
                        <option value="203">6ft 8in (203cm)</option>
                        <option value="206">6ft 9in (206cm)</option>
                        <option value="208">6ft 10in (208cm)</option>
                        <option value="211">6ft 11in (211cm)</option>
                        <option value="213">7ft 0in (213cm)</option>
                        <option value="216">7ft 1in (216cm)</option>
                        <option value="218">7ft 2in (218cm)</option>
                        <option value="221">7ft 3in (221cm)</option>
                        <option value="224">7ft 4in (224cm)</option>
                        <option value="226">7ft 5in (226cm)</option>
                        <option value="229">7ft 6in (229cm)</option>
                        <option value="231">7ft 7in (231cm)</option>
                        <option value="234">7ft 8in (234cm)</option>
                        <option value="236">7ft 9in (236cm)</option>
                        <option value="239">7ft 10in (239cm)</option>
                        <option value="241">7ft 11in (241cm)</option>
                        <option value="244">8ft 0in (244cm)</option>
                    </select>
                </div>
            </div>


            <div class="control-group">
                <button type="button" class="btn btn-primary" onclick="bmrcalculator();">Calculate Calorie Burn</button>
                <p>&nbsp;</p>
                <textarea class="outputdisplay" name="outputdisplay"  COLS="40" style="border: none; background-color: #ffffff; color:#8FBD34;" readonly></textarea>
                <!--<p><input class="outputdisplay" type="text" name="outputdisplay"></p>-->
            </div>
        </form>
    </div>
    <div class="calculator-right">
        <p><strong>Equations</strong></p>
        <p>This calculator is based on the widely used and accepted Harris-Benedict equations for BMR. They are shown below:</p>
        <ul>
            <li>Male (metric): BMR = (13.75 x WKG) + (5 x HC) - (6.76 x age) + 66</li>
            <li>Male (imperial): BMR = (6.25 x WP) + (12.7 x HI) - (6.76 x age) + 66</li>
            <li>Female (metric): BMR = (9.56 x WKG) + (1.85 x HC) - 4.68 x age) + 655</li>
            <li>Female (imperial): BMR = (4.35 x WP) + (4.7 x HI) - 4.68 x age) + 655</li>

        </ul>
    </div>

    <p><strong>Note:</strong> This calculator provides <strong>gross</strong> calorie burn estimates. If you want to convert the estimate to <strong>net</strong> calorie burn, memorize the number and <a href="#">click here.</a> If you want to learn more about net and gross calorie burn, read the <a href="#">Net Versus Gross Calorie Burn</a> article.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



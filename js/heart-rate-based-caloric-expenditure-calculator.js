
      function strtrim() {
         return this.replace(/^\s+/,'').replace(/\s+$/,'');
         }
		 
         String.prototype.trim = strtrim;
		 
	  function hrbasedcaloricexpenditurecalculator() {
	     
		 var kilogramweight;
	         var gender = document.hrbasedcaloricexpenditurecalculatorform.gender.value;
		 var age = document.hrbasedcaloricexpenditurecalculatorform.age.value;
		 var weight = document.hrbasedcaloricexpenditurecalculatorform.weight.value;
		 var heartrate = document.hrbasedcaloricexpenditurecalculatorform.heartrate.value;
		 var weightunits = document.hrbasedcaloricexpenditurecalculatorform.weightunits.value;
		 var minutes = document.hrbasedcaloricexpenditurecalculatorform.minutes.value;
	         var seconds = document.hrbasedcaloricexpenditurecalculatorform.seconds.value;
		 var hours;
		 var caloricexpenditure;
		 var caloricexpenditureperhour;
		 var maxhrtanaka;
		 var maxhr;
		 var percentmaxhr;
		 var lowercalculationlimit;
		 var uppercalculationlimit;
	 
		 age = age.trim();
		 weight = weight.trim();
		 minutes = minutes.trim();
	     seconds = seconds.trim();
		 heartrate = heartrate.trim();
		 
		 age = Number(age);
		 age = Math.round(age);
		 minutes = Number(minutes);
		 minutes = Math.round(minutes);
		 seconds = Number(seconds);
		 seconds = Math.round(seconds);
		 weight = Number(weight);
		 weight = Math.round(weight);
		 heartrate = Number(heartrate);
		 heartrate = Math.round(heartrate);
		 hours = Number(hours);
		 
		 if (age == null||age == "") {
		    document.hrbasedcaloricexpenditurecalculatorform.agefieldvalidation.value = "Please enter your age";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = "";
		    }
		 else if (isNaN(age) == true||age < 1) {
		    document.hrbasedcaloricexpenditurecalculatorform.agefieldvalidation.value = "Please enter a valid number";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = "";
		    }
		 else {
		    document.hrbasedcaloricexpenditurecalculatorform.agefieldvalidation.value = "";
		 }
		 
		 if (weight == null||weight == "") {
		    document.hrbasedcaloricexpenditurecalculatorform.weightfieldvalidation.value = "Please enter your weight";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = "";
		    }
		 else if (isNaN(weight) == true||weight < 1) {
		    document.hrbasedcaloricexpenditurecalculatorform.weightfieldvalidation.value = "Please enter a valid number";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = "";
		    }
		 else {
		    document.hrbasedcaloricexpenditurecalculatorform.weightfieldvalidation.value = "";
		 }
		 
		 maxhrtanaka = 208 - (0.7*age);
		 lowercalculationlimit = Math.round(0.64*maxhrtanaka);
		 uppercalculationlimit = 200;
		 
		 if (heartrate == null||heartrate == "") {
		    document.hrbasedcaloricexpenditurecalculatorform.heartratefieldvalidation.value = "Please enter your heart rate";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = "";
		    }
		 else if (isNaN(heartrate) == true) {
		    document.hrbasedcaloricexpenditurecalculatorform.heartratefieldvalidation.value = "Please enter a valid number";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = "";
		    }
		 else if (heartrate < lowercalculationlimit || heartrate > uppercalculationlimit) {
		    document.hrbasedcaloricexpenditurecalculatorform.heartratefieldvalidation.value = "Heart rate must be between " + lowercalculationlimit + " and " + uppercalculationlimit + " bpm";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = "";
		    }
		 else {
		    document.hrbasedcaloricexpenditurecalculatorform.heartratefieldvalidation.value = "";
		 }
		 
		 if (hrbasedcaloricexpenditurecalculatorform.minutes.value.length == 0||hrbasedcaloricexpenditurecalculatorform.seconds.value.length == 0||minutes == null||seconds == null) {
		    document.hrbasedcaloricexpenditurecalculatorform.timefieldvalidation.value = "Fill both fields";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = "";
		    }
	     else if (seconds > 59) {
		    document.hrbasedcaloricexpenditurecalculatorform.timefieldvalidation.value = "Seconds must be 59 or less";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = "";
		 }
	     else if (isNaN(minutes) == true||minutes < 0||isNaN(seconds) == true||seconds < 0) {
		    document.hrbasedcaloricexpenditurecalculatorform.timefieldvalidation.value = "Enter a valid number";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = "";
		    }
	     else {
		    document.hrbasedcaloricexpenditurecalculatorform.timefieldvalidation.value = "";
		 }
		 
		 if (age == null||age == ""||weight == null||weight == ""||isNaN(age) == true||age < 1||isNaN(weight) == true||weight < 1||heartrate == null||heartrate == ""||isNaN(heartrate) == true||heartrate < lowercalculationlimit || heartrate > uppercalculationlimit||hrbasedcaloricexpenditurecalculatorform.minutes.value.length == 0||hrbasedcaloricexpenditurecalculatorform.seconds.value.length == 0||minutes == null||seconds == null||seconds > 59||isNaN(minutes) == true||minutes < 0||isNaN(seconds) == true||seconds < 0) {
		    document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = "";
			return false;
		    }
		 
		 if (weightunits == "kilograms") {
            kilogramweight = weight;
            }
         else if (weightunits == "pounds") {
            kilogramweight = 0.4536*weight;
         }
  
         if (gender == "male") {
            caloricexpenditureperhour = Math.round(((-55.0969 + (0.6309*heartrate) + (0.1988*kilogramweight) + (0.2017*age))/4.184)*60);
		 }
		 else if (gender == "female") {
	        caloricexpenditureperhour = Math.round(((-20.4022 + (0.4472*heartrate) - (0.1263*kilogramweight) + (0.074*age))/4.184)*60);
		 }
 
 		 maxhr = Math.round(maxhrtanaka);
		 percentmaxhr = Math.round((heartrate/maxhrtanaka)*100);
		 hours = (minutes + (seconds/60))/(60);
		 
		 caloricexpenditure = Math.round(caloricexpenditureperhour*hours);
 
		 document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "At a heartrate of " + heartrate + " bpm, or " + percentmaxhr + "% of your estimated";
		 document.hrbasedcaloricexpenditurecalculatorform.outputdisplay2.value = "maximum heartrate (" + maxhr + " bpm)," + " your calorie burn is an"; 
		 document.hrbasedcaloricexpenditurecalculatorform.outputdisplay3.value = "estimated " + caloricexpenditureperhour + " calories per hour. In " + minutes + " minutes and ";
		 document.hrbasedcaloricexpenditurecalculatorform.outputdisplay4.value = seconds + " seconds you will burn approximately " + caloricexpenditure + " calories.";
	  }
	  
	  function hrbasedcaloricexpenditurecalculator2() {
	     
		 var kilogramweight2;
	         var gender2 = document.hrbasedcaloricexpenditurecalculatorform.gender2.value;
		 var age2 = document.hrbasedcaloricexpenditurecalculatorform.age2.value;
		 var weight2 = document.hrbasedcaloricexpenditurecalculatorform.weight2.value;
		 var heartrate2 = document.hrbasedcaloricexpenditurecalculatorform.heartrate2.value;
		 var weightunits2 = document.hrbasedcaloricexpenditurecalculatorform.weightunits2.value;
		 var minutes2 = document.hrbasedcaloricexpenditurecalculatorform.minutes2.value;
	         var seconds2 = document.hrbasedcaloricexpenditurecalculatorform.seconds2.value;
		 var vo2max2 = document.hrbasedcaloricexpenditurecalculatorform.vo2max2.value;
		 var hours2;
		 var caloricexpenditure2;
		 var caloricexpenditureperhour2;
		 var maxhrtanaka2;
		 var maxhr2;
		 var percentmaxhr2;
		 var lowercalculationlimit2;
		 var uppercalculationlimit2;
	 
		 age2 = age2.trim();
		 weight2 = weight2.trim();
		 minutes2 = minutes2.trim();
	         seconds2 = seconds2.trim();
		 heartrate2 = heartrate2.trim();
		 vo2max2 = vo2max2.trim();
		 
		 age2 = Number(age2);
		 age2 = Math.round(age2);
		 minutes2 = Number(minutes2);
		 minutes2 = Math.round(minutes2);
		 seconds2 = Number(seconds2);
		 seconds2 = Math.round(seconds2);
		 weight2 = Number(weight2);
		 weight2 = Math.round(weight2);
		 heartrate2 = Number(heartrate2);
		 heartrate2 = Math.round(heartrate2);
		 hours2 = Number(hours2);
		 vo2max2 = Number(vo2max2);
		 vo2max2 = Math.round(vo2max2);
		 
		 if (age2 == null||age2 == "") {
		    document.hrbasedcaloricexpenditurecalculatorform.agefieldvalidation2.value = "Please enter your age";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		    }
		 else if (isNaN(age2) == true||age2 < 1) {
		    document.hrbasedcaloricexpenditurecalculatorform.agefieldvalidation2.value = "Please enter a valid number";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		    }
		 else {
		    document.hrbasedcaloricexpenditurecalculatorform.agefieldvalidation2.value = "";
		 }
		 
		 if (weight2 == null||weight2 == "") {
		    document.hrbasedcaloricexpenditurecalculatorform.weightfieldvalidation2.value = "Please enter your weight";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		    }
		 else if (isNaN(weight2) == true||weight2 < 1) {
		    document.hrbasedcaloricexpenditurecalculatorform.weightfieldvalidation2.value = "Please enter a valid number";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		    }
		 else {
		    document.hrbasedcaloricexpenditurecalculatorform.weightfieldvalidation2.value = "";
		 }
		 
		 maxhrtanaka2 = 208 - (0.7*age2);
		 lowercalculationlimit2 = Math.round(0.64*maxhrtanaka2);
		 uppercalculationlimit2 = 200;
		 
		 if (heartrate2 == null||heartrate2 == "") {
		    document.hrbasedcaloricexpenditurecalculatorform.heartratefieldvalidation2.value = "Please enter your heart rate";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		    }
		 else if (isNaN(heartrate2) == true) {
		    document.hrbasedcaloricexpenditurecalculatorform.heartratefieldvalidation2.value = "Please enter a valid number";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		    }
		 else if (heartrate2 < lowercalculationlimit2 || heartrate2 > uppercalculationlimit2) {
		    document.hrbasedcaloricexpenditurecalculatorform.heartratefieldvalidation2.value = "Heart rate must be between " + lowercalculationlimit2 + " and " + uppercalculationlimit2 + " bpm";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		    }
		 else {
		    document.hrbasedcaloricexpenditurecalculatorform.heartratefieldvalidation2.value = "";
		 }
		 
		 if (hrbasedcaloricexpenditurecalculatorform.minutes2.value.length == 0||hrbasedcaloricexpenditurecalculatorform.seconds2.value.length == 0||minutes2 == null||seconds2 == null) {
		    document.hrbasedcaloricexpenditurecalculatorform.timefieldvalidation2.value = "Fill both fields";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		    }
	     else if (seconds2 > 59) {
		    document.hrbasedcaloricexpenditurecalculatorform.timefieldvalidation2.value = "Seconds must be 59 or less";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		 }
	     else if (isNaN(minutes2) == true||minutes2 < 0||isNaN(seconds2) == true||seconds2 < 0) {
		    document.hrbasedcaloricexpenditurecalculatorform.timefieldvalidation2.value = "Enter a valid number";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		    }
	     else {
		    document.hrbasedcaloricexpenditurecalculatorform.timefieldvalidation2.value = "";
		 }
		 
		 if (vo2max2 == null||vo2max2 == "") {
		    document.hrbasedcaloricexpenditurecalculatorform.vo2maxfieldvalidation2.value = "Please enter your VO2max";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		    }
		 else if (isNaN(vo2max2) == true||vo2max2 < 1) {
		    document.hrbasedcaloricexpenditurecalculatorform.vo2maxfieldvalidation2.value = "Please enter a valid number";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
		    }
		 else {
		    document.hrbasedcaloricexpenditurecalculatorform.vo2maxfieldvalidation2.value = "";
		 }
		 
		 if (isNaN(vo2max2) == true||vo2max2 < 1||vo2max2 == null||vo2max2 == ""||age2 == null||age2 == ""||weight2 == null||weight2 == ""||isNaN(age2) == true||age2 < 1||isNaN(weight2) == true||weight2 < 1||heartrate2 == null||heartrate2 == ""||isNaN(heartrate2) == true||heartrate2 < lowercalculationlimit2 || heartrate2 > uppercalculationlimit2||hrbasedcaloricexpenditurecalculatorform.minutes2.value.length == 0||hrbasedcaloricexpenditurecalculatorform.seconds2.value.length == 0||minutes2 == null||seconds2 == null||seconds2 > 59||isNaN(minutes2) == true||minutes2 < 0||isNaN(seconds2) == true||seconds2 < 0) {
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay5.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = "";
			document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = "";
			return false;
		    }
		 
		 if (weightunits2 == "kilograms") {
            kilogramweight2 = weight2;
            }
         else if (weightunits2 == "pounds") {
            kilogramweight2 = 0.4536*weight2;
         }
  
         if (gender2 == "male") {
            caloricexpenditureperhour2 = Math.round(((-59.3954 - 36.3781 + (0.634*heartrate2) + (0.404*vo2max2) + (0.394*kilogramweight2) + (0.271*age2))/4.184)*60);
		 }
		 else if (gender2 == "female") {
	        caloricexpenditureperhour2 = Math.round(((-59.3954 + (0.450*heartrate2) + (0.380*vo2max2) + (0.103*kilogramweight2) + (0.274*age2))/4.184)*60);
		 }
 
 		 maxhr2 = Math.round(maxhrtanaka2);
		 percentmaxhr2 = Math.round((heartrate2/maxhrtanaka2)*100);
		 hours2 = (minutes2 + (seconds2/60))/(60);
		 
		 caloricexpenditure2 = Math.round(caloricexpenditureperhour2*hours2);
 
		 document.hrbasedcaloricexpenditurecalculatorform.outputdisplay.value = "At a heartrate of " + heartrate2 + " bpm, or " + percentmaxhr2 + "% of your estimated" + "maximum heartrate (" + maxhr2 + " bpm)," + " your calorie burn is an"  + "estimated " + caloricexpenditureperhour2 + " calories per hour. In " + minutes2 + " minutes and " +seconds2 + " seconds you will burn approximately " + caloricexpenditure2 + " calories.";
		 //document.hrbasedcaloricexpenditurecalculatorform.outputdisplay6.value = ;
		 //document.hrbasedcaloricexpenditurecalculatorform.outputdisplay7.value = ;
		 //document.hrbasedcaloricexpenditurecalculatorform.outputdisplay8.value = ;
	  }

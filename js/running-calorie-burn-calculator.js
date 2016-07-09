
	  
      function strtrim() {
         return this.replace(/^\s+/,'').replace(/\s+$/,'');
         }
		 
         String.prototype.trim = strtrim;
		 
	  function runningcalorieburncalculator() {
	     
		 var kilogramweight;
		 var kilometerrundistance;
		 var grade = document.runningcalorieburncalculatorform.grade.value;
		 var treadmillquestion = document.runningcalorieburncalculatorform.treadmillquestion.value;
		 var age = document.runningcalorieburncalculatorform.age.value;
		 var weight = document.runningcalorieburncalculatorform.weight.value;
		 var twentysecondheartrate = document.runningcalorieburncalculatorform.twentysecondheartrate.value;
		 var weightunits = document.runningcalorieburncalculatorform.weightunits.value;
		 var rundistance = document.runningcalorieburncalculatorform.rundistance.value;
		 var rundistanceunits = document.runningcalorieburncalculatorform.rundistanceunits.value;
		 var maxhrtanaka;
		 var votwomax;
		 var votwomaxfactor;
		 var treadmillfactor;
		 var kcalperkgperkm;
		 var totalkcal;
	 
		 age = age.trim();
		 weight = weight.trim();
		 rundistance = rundistance.trim();
		 twentysecondheartrate = twentysecondheartrate.trim();
		 
		 age = Number(age);
		 grade = Number(grade);
		 age = Math.round(age);
		 rundistance = Number(rundistance);
		 weight = Number(weight);
		 weight = Math.round(weight);
		 twentysecondheartrate = Number(twentysecondheartrate);
		 twentysecondheartrate = Math.round(twentysecondheartrate);
		 
		 if (age == null||age == "") {
		    document.runningcalorieburncalculatorform.agefieldvalidation.value = "Please enter your age";
			document.runningcalorieburncalculatorform.outputdisplay.value = "";
		    }
		 else if (isNaN(age) == true||age < 1) {
		    document.runningcalorieburncalculatorform.agefieldvalidation.value = "Please enter a valid number";
			document.runningcalorieburncalculatorform.outputdisplay.value = "";
		    }
		 else {
		    document.runningcalorieburncalculatorform.agefieldvalidation.value = "";
		 }
		 
		 if (weight == null||weight == "") {
		    document.runningcalorieburncalculatorform.weightfieldvalidation.value = "Please enter your weight";
			document.runningcalorieburncalculatorform.outputdisplay.value = "";
		    }
		 else if (isNaN(weight) == true||weight < 1) {
		    document.runningcalorieburncalculatorform.weightfieldvalidation.value = "Please enter a valid number";
			document.runningcalorieburncalculatorform.outputdisplay.value = "";
		    }
		 else {
		    document.runningcalorieburncalculatorform.weightfieldvalidation.value = "";
		 }
		 
		 maxhrtanaka = 208 - (0.7*age);
		 lowercalculationlimit = Math.round(0.64*maxhrtanaka);
		 uppercalculationlimit = Math.round(0.89*maxhrtanaka);
		 
		 if (twentysecondheartrate == null||twentysecondheartrate == "") {
		    document.runningcalorieburncalculatorform.twentysecondheartratefieldvalidation.value = "Please enter value";
			document.runningcalorieburncalculatorform.outputdisplay.value = "";
		    }
		 else if (isNaN(twentysecondheartrate) == true||twentysecondheartrate < 1) {
		    document.runningcalorieburncalculatorform.twentysecondheartratefieldvalidation.value = "Enter a valid number";
			document.runningcalorieburncalculatorform.outputdisplay.value = "";
		    }
		 else {
		    document.runningcalorieburncalculatorform.twentysecondheartratefieldvalidation.value = "";
		 }
		 
		 if (runningcalorieburncalculatorform.rundistance.value.length == 0||rundistance == null) {
		    document.runningcalorieburncalculatorform.rundistancefieldvalidation.value = "Enter a run distance";
			document.runningcalorieburncalculatorform.outputdisplay.value = "";
		    }
	     else if (isNaN(rundistance) == true||rundistance <= 0) {
		    document.runningcalorieburncalculatorform.rundistancefieldvalidation.value = "Enter a valid number";
			document.runningcalorieburncalculatorform.outputdisplay.value = "";
		    }
	     else {
		    document.runningcalorieburncalculatorform.rundistancefieldvalidation.value = "";
		 }
		 
		 if (age == null||age == ""||weight == null||weight == ""||isNaN(age) == true||age < 1||isNaN(weight) == true||weight < 1||twentysecondheartrate == null||twentysecondheartrate == ""||isNaN(twentysecondheartrate) == true||twentysecondheartrate < 1||runningcalorieburncalculatorform.rundistance.value.length == 0||rundistance == null||isNaN(rundistance) == true||rundistance <= 0) {
		    document.runningcalorieburncalculatorform.outputdisplay.value = "";
			return false;
		    }
		 
		 if (weightunits == "kilograms") {
            kilogramweight = weight;
            }
         else if (weightunits == "pounds") {
            kilogramweight = 0.4536*weight;
         }
		 
		 if (rundistanceunits == "kilometers") {
            kilometerrundistance = rundistance;
            }
         else if (rundistanceunits == "miles") {
            kilometerrundistance = 1.609344*rundistance;
         }
  
  	     maxhrtanaka = 208 - (0.7*age);
	  
	     votwomax = Math.round(15.3*(maxhrtanaka/(twentysecondheartrate*3)));
  
         if (votwomax >= 56) {
		    votwomaxfactor = 1;
		 }
		 else if (votwomax < 56 && votwomax >= 54) {
		    votwomaxfactor = 1.01;
		 }
		 else if (votwomax < 54 && votwomax >= 52) {
		    votwomaxfactor = 1.02;
		 }
		 else if (votwomax < 52 && votwomax >= 50) {
		    votwomaxfactor = 1.03;
		 }
		 else if (votwomax < 50 && votwomax >= 48) {
		    votwomaxfactor = 1.04;
		 }
		 else if (votwomax < 48 && votwomax >= 46) {
		    votwomaxfactor = 1.05;
		 }
		 else if (votwomax < 46 && votwomax >= 44) {
		    votwomaxfactor = 1.06;
		 }
		 else {
		    votwomaxfactor = 1.07;
		 }
  
         if (treadmillquestion == "yes") {
		    treadmillfactor = 0;
		 }
		 else {
		    treadmillfactor = 0.84;
		 }
  
  
         if (grade <= -15) {
		    kcalperkgperkm = (-0.01*grade) + 0.5;
		 }
		 else if (grade > -15 && grade <= -10) {
		    kcalperkgperkm = (-0.02*grade) + 0.35;
		 }
		 else if (grade > -10 && grade <= 0) {
		    kcalperkgperkm = (0.04*grade) + 0.95;
		 }
		 else if (grade > 0 && grade <= 10) {
		    kcalperkgperkm = (0.05*grade) + 0.95;
		 }
		 else if (grade > 10 && grade <= 15) {
		    kcalperkgperkm = (0.07*grade) + 0.75;
		 }
		 
		 totalkcal = Math.round(((kcalperkgperkm*kilogramweight) + treadmillfactor)*kilometerrundistance*votwomaxfactor);

		 document.runningcalorieburncalculatorform.outputdisplay.value = "You burned an estimated " + totalkcal + " calories.";
	  }

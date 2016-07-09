
	  
      function strtrim() {
         return this.replace(/^\s+/,'').replace(/\s+$/,'');
         }
		 
         String.prototype.trim = strtrim;
		 
	  function walkingcalorieburncalculator() {
	     
		 var kilogramweight;
		 var kilometerwalkdistance;
		 var grade = document.walkingcalorieburncalculatorform.grade.value;
		 var weight = document.walkingcalorieburncalculatorform.weight.value;
		 var weightunits = document.walkingcalorieburncalculatorform.weightunits.value;
		 var walkdistance = document.walkingcalorieburncalculatorform.walkdistance.value;
		 var walkdistanceunits = document.walkingcalorieburncalculatorform.walkdistanceunits.value;
		 var minutes = document.walkingcalorieburncalculatorform.minutes.value;
		 var seconds = document.walkingcalorieburncalculatorform.seconds.value;
		 var totalkcal;
		 var hours;
		 var kmperhrspeed;
		 var kcalperkgperhr;
		 var mperminspeed;
		 var fractionalgrade;
	 
		 weight = weight.trim();
		 walkdistance = walkdistance.trim();
		 minutes = minutes.trim();
		 seconds = seconds.trim();
		 
		 grade = Number(grade);
		 fractionalgrade = Number(fractionalgrade);
		 walkdistance = Number(walkdistance);
		 weight = Number(weight);
		 weight = Math.round(weight);
		 minutes = Number(minutes);
		 minutes = Math.round(minutes);
		 seconds = Number(seconds);
		 seconds = Math.round(seconds);
		 hours = Number(hours);
		 kmperhrspeed = Number(kmperhrspeed);
		 mperminspeed = Number(mperminspeed);
		 kcalperkgperhr = Number(kcalperkgperhr);
		 
		 if (weight == null||weight == "") {
		    document.walkingcalorieburncalculatorform.weightfieldvalidation.value = "Please enter your weight";
			document.walkingcalorieburncalculatorform.outputdisplay.value = "";
		    }
		 else if (isNaN(weight) == true||weight < 1) {
		    document.walkingcalorieburncalculatorform.weightfieldvalidation.value = "Please enter a valid number";
			document.walkingcalorieburncalculatorform.outputdisplay.value = "";
		    }
		 else {
		    document.walkingcalorieburncalculatorform.weightfieldvalidation.value = "";
		 }
		 
		 if (walkingcalorieburncalculatorform.walkdistance.value.length == 0||walkdistance == null) {
		    document.walkingcalorieburncalculatorform.walkdistancefieldvalidation.value = "Please enter a distance";
			document.walkingcalorieburncalculatorform.outputdisplay.value = "";
		    }
	     else if (isNaN(walkdistance) == true||walkdistance <= 0) {
		    document.walkingcalorieburncalculatorform.walkdistancefieldvalidation.value = "Enter a valid number";
			document.walkingcalorieburncalculatorform.outputdisplay.value = "";
		    }
	     else {
		    document.walkingcalorieburncalculatorform.walkdistancefieldvalidation.value = "";
		 }
		 
		 hours = (minutes + (seconds/60))/(60);
		 
		 if (walkdistanceunits == "kilometers") {
            kilometerwalkdistance = walkdistance;
            }
         else if (walkdistanceunits == "miles") {
            kilometerwalkdistance = 1.609344*walkdistance;
         }
		 
		 kmperhrspeed = kilometerwalkdistance/hours;
		 
		 if (walkingcalorieburncalculatorform.minutes.value.length == 0||walkingcalorieburncalculatorform.seconds.value.length == 0||minutes == null||seconds == null) {
		    document.walkingcalorieburncalculatorform.timefieldvalidation.value = "Fill both fields";
			document.walkingcalorieburncalculatorform.outputdisplay.value = "";
		    }
	     else if (isNaN(minutes) == true||minutes < 0||isNaN(seconds) == true||seconds < 0) {
		    document.walkingcalorieburncalculatorform.timefieldvalidation.value = "Enter a valid number";
			document.walkingcalorieburncalculatorform.outputdisplay.value = "";
		    }
	     else if (seconds > 59) {
		    document.walkingcalorieburncalculatorform.timefieldvalidation.value = "Seconds must be 59 or less";
			document.walkingcalorieburncalculatorform.outputdisplay.value = "";
		 }
		 else if (kmperhrspeed > 7.5) {
		 	document.walkingcalorieburncalculatorform.timefieldvalidation.value = "You walked too fast!";
			document.walkingcalorieburncalculatorform.outputdisplay.value = "";
		 }
		 else if (kmperhrspeed < 1) {
		 	document.walkingcalorieburncalculatorform.timefieldvalidation.value = "You walked too slow!";
			document.walkingcalorieburncalculatorform.outputdisplay.value = "";
		 }
	     else {
		    document.walkingcalorieburncalculatorform.timefieldvalidation.value = "";
		 }
		 
		 if (weight == null||weight == ""||isNaN(weight) == true||weight < 1||walkingcalorieburncalculatorform.walkdistance.value.length == 0||walkdistance == null||isNaN(walkdistance) == true||walkdistance <= 0||walkingcalorieburncalculatorform.minutes.value.length == 0||walkingcalorieburncalculatorform.seconds.value.length == 0||minutes == null||seconds == null||seconds > 59||isNaN(minutes) == true||minutes < 0||isNaN(seconds) == true||seconds < 0||kmperhrspeed > 7.5||kmperhrspeed < 1) {
		    document.walkingcalorieburncalculatorform.outputdisplay.value = "";
			return false;
		    }
		 
		 if (weightunits == "kilograms") {
            kilogramweight = weight;
            }
         else if (weightunits == "pounds") {
            kilogramweight = 0.4536*weight;
         }
  
    	 mperminspeed = kmperhrspeed/0.06;
		 fractionalgrade = grade/100;
  
         if (grade == -5) {
		    kcalperkgperhr = 0.0251*Math.pow(kmperhrspeed, 3) - 0.2157*Math.pow(kmperhrspeed, 2) + 0.7888*kmperhrspeed + 1.2957;
		 }
		 else if (grade == -4) {
		    kcalperkgperhr = 0.0244*Math.pow(kmperhrspeed, 3) - 0.2079*Math.pow(kmperhrspeed, 2) + 0.8053*kmperhrspeed + 1.3281;
		 }
		 else if (grade == -3) {
		    kcalperkgperhr = 0.0237*Math.pow(kmperhrspeed, 3) - 0.2*Math.pow(kmperhrspeed, 2) + 0.8217*kmperhrspeed + 1.3605;
		 }
		 else if (grade == -2) {
		    kcalperkgperhr = 0.023*Math.pow(kmperhrspeed, 3) - 0.1922*Math.pow(kmperhrspeed, 2) + 0.8382*kmperhrspeed + 1.3929;
		 }
		 else if (grade == -1) {
		    kcalperkgperhr = 0.0222*Math.pow(kmperhrspeed, 3) - 0.1844*Math.pow(kmperhrspeed, 2) + 0.8546*kmperhrspeed + 1.4253;
		 }
		 else if (grade == 0) {
		    kcalperkgperhr = 0.0215*Math.pow(kmperhrspeed, 3) - 0.1765*Math.pow(kmperhrspeed, 2) + 0.871*kmperhrspeed + 1.4577;
		 }
		 else if (grade == 1) {
		    kcalperkgperhr = 0.0171*Math.pow(kmperhrspeed, 3) - 0.1062*Math.pow(kmperhrspeed, 2) + 0.608*kmperhrspeed + 1.86;
		 }
		 else if (grade == 2) {
		    kcalperkgperhr = 0.0184*Math.pow(kmperhrspeed, 3) - 0.1134*Math.pow(kmperhrspeed, 2) + 0.6566*kmperhrspeed + 1.92;
		 }		 
		 else if (grade == 3) {
		    kcalperkgperhr = 0.0196*Math.pow(kmperhrspeed, 3) - 0.1205*Math.pow(kmperhrspeed, 2) + 0.7053*kmperhrspeed + 1.98;
		 }		 
		 else if (grade == 4) {
		    kcalperkgperhr = 0.0208*Math.pow(kmperhrspeed, 3) - 0.1277*Math.pow(kmperhrspeed, 2) + 0.7539*kmperhrspeed + 2.04;
		 }
		 else if (grade == 5) {
		    kcalperkgperhr = 0.0221*Math.pow(kmperhrspeed, 3) - 0.1349*Math.pow(kmperhrspeed, 2) + 0.8025*kmperhrspeed + 2.1;
		 }
		 else {
		    kcalperkgperhr = (0.1*mperminspeed + 1.8*mperminspeed*fractionalgrade + 3.5)*60*5/1000;
		 }
		 
		 totalkcal = Math.round(kcalperkgperhr*kilogramweight*hours);
		 
		 document.walkingcalorieburncalculatorform.outputdisplay.value = "You burned an estimated " + totalkcal + " calories.";
	  }

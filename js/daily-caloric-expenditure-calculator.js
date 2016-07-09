
      function strtrim() {
         return this.replace(/^\s+/,'').replace(/\s+$/,'');
         }
		 
         String.prototype.trim = strtrim;
		 
	  function dailycaloricexpenditure() {
	     
		 var kilogramweight;
                var gender = document.dailycaloricexpenditureform.gender.value;
		 var age = document.dailycaloricexpenditureform.age.value;
		 var weight = document.dailycaloricexpenditureform.weight.value;
		 var weightunits = document.dailycaloricexpenditureform.weightunits.value;
		 var height = document.dailycaloricexpenditureform.height.value;
		 var activitylevelfactor = document.dailycaloricexpenditureform.activitylevelfactor.value;
		 var bmr;
		 var dce;
	 
		 age = age.trim();
		 
		 weight = weight.trim();
		 
		 if (age == null||age == "") {
		    document.dailycaloricexpenditureform.agefieldvalidation.value = "Please enter your age";
			document.dailycaloricexpenditureform.outputdisplay.value = "";
		    }
		 else if (isNaN(age) == true||age < 1) {
		    document.dailycaloricexpenditureform.agefieldvalidation.value = "Please enter a valid number";
			document.dailycaloricexpenditureform.outputdisplay.value = "";
		    }
		 else {
		    document.dailycaloricexpenditureform.agefieldvalidation.value = "";
		 }
		 
		 if (weight == null||weight == "") {
		    document.dailycaloricexpenditureform.weightfieldvalidation.value = "Please enter your weight";
			document.dailycaloricexpenditureform.outputdisplay.value = "";
		    }
		 else if (isNaN(weight) == true||weight < 1) {
		    document.dailycaloricexpenditureform.weightfieldvalidation.value = "Please enter a valid number";
			document.dailycaloricexpenditureform.outputdisplay.value = "";
		    }
		 else {
		    document.dailycaloricexpenditureform.weightfieldvalidation.value = "";
		 }
		 
		 if (age == null||age == ""||weight == null||weight == ""||isNaN(age) == true||age < 1||isNaN(weight) == true||weight < 1) {
		    document.dailycaloricexpenditureform.outputdisplay.value = "";
			return false;
		    }
		 
		 if (weightunits == "kilograms") {
            kilogramweight = weight;
            }
         else if (weightunits == "pounds") {
            kilogramweight = 0.4536*weight;
         }
  
         if (gender == "male") {
            bmr = (13.75*kilogramweight) + (5*height) - (6.76*age) + 66;
		 }
		 else if (gender == "female") {
	        bmr = (9.56*kilogramweight) + (1.85*height) - (4.68*age) + 655;
		 }
  
         dce = Math.round(activitylevelfactor*bmr);

		 document.dailycaloricexpenditureform.outputdisplay.value = "You burn an estimated " + dce + " calories per day.";
	  }

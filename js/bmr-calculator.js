
	  
      function strtrim() {
         return this.replace(/^\s+/,'').replace(/\s+$/,'');
         }
		 
         String.prototype.trim = strtrim;
		 
	  function bmrcalculator() {
	     
		 var kilogramweight;
	     var gender = document.bmrcalculatorform.gender.value;
		 var age = document.bmrcalculatorform.age.value;
		 var weight = document.bmrcalculatorform.weight.value;
		 var weightunits = document.bmrcalculatorform.weightunits.value;
		 var height = document.bmrcalculatorform.height.value;
		 var bmr;
	 
		 age = age.trim();
		 
		 weight = weight.trim();
		 
		 if (age == null||age == "") {
		    document.bmrcalculatorform.agefieldvalidation.value = "Please enter your age";
			document.bmrcalculatorform.outputdisplay.value = "";
		    }
		 else if (isNaN(age) == true||age < 1) {
		    document.bmrcalculatorform.agefieldvalidation.value = "Please enter a valid number";
			document.bmrcalculatorform.outputdisplay.value = "";
		    }
		 else {
		    document.bmrcalculatorform.agefieldvalidation.value = "";
		 }
		 
		 if (weight == null||weight == "") {
		    document.bmrcalculatorform.weightfieldvalidation.value = "Please enter your weight";
			document.bmrcalculatorform.outputdisplay.value = "";
		    }
		 else if (isNaN(weight) == true||weight < 1) {
		    document.bmrcalculatorform.weightfieldvalidation.value = "Please enter a valid number";
			document.bmrcalculatorform.outputdisplay.value = "";
		    }
		 else {
		    document.bmrcalculatorform.weightfieldvalidation.value = "";
		 }
		 
		 if (age == null||age == ""||weight == null||weight == ""||isNaN(age) == true||age < 1||isNaN(weight) == true||weight < 1) {
		    document.bmrcalculatorform.outputdisplay.value = "";
			return false;
		    }
		 
		 if (weightunits == "kilograms") {
            kilogramweight = weight;
            }
         else if (weightunits == "pounds") {
            kilogramweight = 0.4536*weight;
         }
  
         if (gender == "male") {
            bmr = Math.round((13.75*kilogramweight) + (5*height) - (6.76*age) + 66);
		 }
		 else if (gender == "female") {
	        bmr = Math.round((9.56*kilogramweight) + (1.85*height) - (4.68*age) + 655);
		 }
 
		 document.bmrcalculatorform.outputdisplay.value = "Your BMR is an estimated " + bmr + " calories per day.";
	  }

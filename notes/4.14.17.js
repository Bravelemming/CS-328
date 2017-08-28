javascript

mypara.innerHTML = "i am a paragraph" + "yes i am"!;

//to insert elements

document.createElement();

//to enable strict mode for better syntax checking

"use strict"; //on the very top of js file


//javscript types, built in

Number;
Boolean;
String;
Array;

//many objects are truthy or false
false;
0;
NaN;
"";
null;
undefined;

true;

//if you want soemthing to ahppen whether a variable is null or undefined,

if (myVariable)
{
	//can action based on it as NOT null
}
else {
	//will get here if its null or undefined.
}


var myArray = [];

var otherArray = [1, 2, 3];

isNaN(); //a function that tests if its a number, or not.
//returns true on NOT a number?

parseInt(); //takes a value and tries to parse it as an integer
parseFloat(); //same for floats



// ---------------

//add event handler functions to form and button elements DOM objects
//after the page is loaded

window.onload = function() {
	var valueForm = document.getElementById("valueForm");
	//returns with null if id doesnt exist
	testButton.onclick = doSomething;
}


//function 
functionName; // runs the function
//not the result of having called the function
functionName(); //returns true


function allFilled()
{
	//get the dom object for the body element

	// getElementsByTagName
	var bodyobjectarray = document.getElementsByTagName("body");

	var bodydoject = bodyobjectarray[0];

	//names
	var value1field = document.getElementById("value1");
	var value2field = document.getElementById("value2");
	var value3field = document.getElementById("value3");
	//values
	var value1 = value1field.value;
	var value2 = value2field.value;
	var value3 = value3field.value;

	//creating a new element
	errorsPara = document.createElement("p");
	//sets an id for it
	errorsPara.id = "errors";

}


//to trim spaces off the front and back
if (( ! val1.trim() ) )
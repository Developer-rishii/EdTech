<?php
include 'auth.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BITW Pyisics</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="icon" href="./image/phy_logo.jpeg">
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
 }
 
 .header {
     display: flex;
     align-items: center;
     justify-content: space-between;
     padding: 10px 20px;
     background-color: black;
     box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
 }
 
 .header img{
    height: 50px;
    width: auto;
 }
 
 .nav-links ul {
     display: flex;
 }
 
 .nav-links ul li {
     list-style: none;
     padding: 0 20px;
     position: relative;
 }
 
 .nav-links ul li i {
     font-size: 25px;
 }
 
 .nav-links ul li a {
     text-decoration: none;
     font-size: 16px;
     font-weight: 600;
     color: azure;
     transition: 0.3s ease;
 }
 
 .nav-links ul li a:hover,
 .nav-links ul li a.active {
     color: #32b1fa;
 }
 
 .nav-links ul li a.active::after {
     content: "";
     width: 30%;
     height: 2px;
     background-color: #32b1fa;
     position: absolute;
     bottom: -2px;
     left: 20px;
 }
  body {
    font-family: Arial, sans-serif;
  }
  .converter {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    max-width: 600px;
    margin: 5% 30%;
  }
  .converter label {
    display: block;
    margin-bottom: 10px;
  }
  .converter input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
  }
  .converter select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
  }
  .converter button {
    width: 100%;
    padding: 10px;
    margin:5px;
    margin-left:0;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  .result {
    margin-top: 10px;
  }
</style>
</head>
<body>
  <section class="header">
    <a href="home.html" class="logo"><img src="./image/phy_logo.jpeg" alt=""></a>

    <div class="nav-links">
     <ul>
         <li><a href="home.html">Home</a></li>
         <li><a href="exp.html">Experiments</a></li>
         <li><a href="explore.html">Explore</a></li>
         <li><a href="profile.html">About</a></li>
         <li class="login-container">
          <a href="index.php">
             <i class="fa-solid fa-right-to-bracket"></i>
             <span class="logout-text">Logout</span>
          </a>
       </li>
     </ul>
    </div>
 </section>

<div class="converter">
  <label for="quantity">Select Quantity:</label>
  <select id="quantity">
    <option value="length">Length</option>
    <option value="mass">Mass</option>
    <option value="energy">Energy</option>
    <option value="pressure">Pressure</option>
    <option value="frequency">Frequency</option>
  </select>

  <label for="inputNumber">Enter a number:</label>
  <input type="number" id="inputNumber">
  
  <label for="fromUnit">From:</label>
  <select id="fromUnit"></select>
  
  <label for="toUnit">To:</label>
  <select id="toUnit"></select>
  
  <button id="convertBtn">Convert</button>
  <button id="switchBtn">Switch</button>
    
  <div class="result" id="result"></div>
</div>

<script>
document.getElementById("quantity").addEventListener("change", function() {
  var quantity = this.value;
  var inputNumber = parseFloat(document.getElementById("inputNumber").value);
  var fromUnit = document.getElementById("fromUnit").value;
  var toUnit = document.getElementById("toUnit").value;
  convert(quantity, inputNumber, fromUnit, toUnit);
});

document.getElementById("convertBtn").addEventListener("click", function() {
  var quantity = document.getElementById("quantity").value;
  var inputNumber = parseFloat(document.getElementById("inputNumber").value);
  var fromUnit = document.getElementById("fromUnit").value;
  var toUnit = document.getElementById("toUnit").value;
  convert(quantity, inputNumber, fromUnit, toUnit);
});
document.getElementById("switchBtn").addEventListener("click", function() {
  var temp = document.getElementById("fromUnit").value;
  document.getElementById("fromUnit").value = document.getElementById("toUnit").value;
  document.getElementById("toUnit").value = temp;
});

document.getElementById("quantity").addEventListener("change", function() {
  var quantity = this.value;
  populateUnits(quantity);
});

function populateUnits(quantity) {
  var units = getUnits(quantity);
  var fromUnitSelect = document.getElementById("fromUnit");
  var toUnitSelect = document.getElementById("toUnit");
  
  fromUnitSelect.innerHTML = "";
  toUnitSelect.innerHTML = "";
  
  units.forEach(function(unit) {
    var option1 = document.createElement("option");
    var option2 = document.createElement("option");
    option1.value = unit;
    option1.textContent = unit;
    option2.value = unit;
    option2.textContent = unit;
    fromUnitSelect.appendChild(option1);
    toUnitSelect.appendChild(option2);
  });
}

function getUnits(quantity) {
  switch(quantity) {
    case "length":
      return ["meter", "centimeter", "kilometer", "inch", "mile", "angstrom", "millimeter", "micrometer", "nanometer", "foot", "yard"];
    case "mass":
      return ["gram", "kilogram", "milligram", "tonne", "microgram", "pound", "dalton"];
    case "energy":
      return ["joule", "erg", "kilowatt-hour", "electron volt"];
    case "pressure":
      return ["pascal", "bar", "atm", "torr", "mmHg"];
    case "frequency":
      return ["hertz", "kilohertz", "megahertz", "gigahertz"];
    default:
      return [];
  }
}

function convert(quantity, inputNumber, fromUnit, toUnit) {
  var result;
  
  
  // conversion for length (from meter)
  switch(fromUnit) {
    case "meter":
      switch(toUnit) {
        case "meter":
          result = inputNumber;
          break;
        case "centimeter":
          result = inputNumber * 100;
          break;
        case "kilometer":
          result = inputNumber / 1000;
          break;
        case "inch":
          result = inputNumber * 39.3701;
          break;
        case "mile":
          result = inputNumber * 0.000621371;
          break;
        case "angstrom":
          result = inputNumber * 1e+10;
          break;
        case "millimeter":
          result = inputNumber * 1000;
          break;
        case "micrometer":
          result = inputNumber * 1e6;
          break;
        case "nanometer":
          result = inputNumber * 1e9;
          break;
        case "foot":
          result = inputNumber * 3.28084;
          break;
        case "yard":
          result = inputNumber * 1.09361;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
    // conversion for length (from centimeter)
  switch(fromUnit) {
    case "centimeter":
      switch(toUnit) {
        case "centimeter":
          result = inputNumber;
          break;
        case "meter":
          result = inputNumber / 100;
          break;
        case "kilometer":
          result = inputNumber / 100000;
          break;
        case "inch":
          result = inputNumber / 2.54;
          break;
        case "mile":
          result = inputNumber / 160900;
          break;
        case "angstrom":
          result = inputNumber * 1e+8;
          break;
        case "millimeter":
          result = inputNumber * 10;
          break;
        case "micrometer":
          result = inputNumber * 10000;
          break;
        case "nanometer":
          result = inputNumber * 1e+7;
          break;
        case "foot":
          result = inputNumber / 30.48;
          break;
        case "yard":
          result = inputNumber / 91.44;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
    // conversion for length (from kilometer)
  switch(fromUnit) {
    case "kilometer":
      switch(toUnit) {
        case "kilometer":
          result = inputNumber;
          break;
        case "centimeter":
          result = inputNumber * 100000;
          break;
        case "meter":
          result = inputNumber * 1000;
          break;
        case "inch":
          result = inputNumber * 39370;
          break;
        case "mile":
          result = inputNumber / 1.609;
          break;
        case "angstrom":
          result = inputNumber * 1e+13;
          break;
        case "millimeter":
          result = inputNumber * 1e+6;
          break;
        case "micrometer":
          result = inputNumber * 1e+9;
          break;
        case "nanometer":
          result = inputNumber * 1e+12;
          break;
        case "foot":
          result = inputNumber * 3281;
          break;
        case "yard":
          result = inputNumber * 1094;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
    // conversion for length(from inch)
  switch(fromUnit) {
    case "inch":
      switch(toUnit) {
        case "inch":
          result = inputNumber;
          break;
        case "centimeter":
          result = inputNumber * 2.54;
          break;
        case "kilometer":
          result = inputNumber / 39370;
          break;
        case "meter":
          result = inputNumber / 39.37;
          break;
        case "mile":
          result = inputNumber / 63360;
          break;
        case "angstrom":
          result = inputNumber * 2.54e+8;
          break;
        case "millimeter":
          result = inputNumber * 25.4;
          break;
        case "micrometer":
          result = inputNumber * 25400;
          break;
        case "nanometer":
          result = inputNumber * 2.54e+7;
          break;
        case "foot":
          result = inputNumber / 12;
          break;
        case "yard":
          result = inputNumber / 36;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
    // conversion for length (from millimeter)
  switch(fromUnit) {
    case "meter":
      switch(toUnit) {
        case "meter":
          result = inputNumber;
          break;
        case "centimeter":
          result = inputNumber * 100;
          break;
        case "kilometer":
          result = inputNumber / 1000;
          break;
        case "inch":
          result = inputNumber * 39.3701;
          break;
        case "mile":
          result = inputNumber * 0.000621371;
          break;
        case "angstrom":
          result = inputNumber * 1e10;
          break;
        case "millimeter":
          result = inputNumber * 1000;
          break;
        case "micrometer":
          result = inputNumber * 1e6;
          break;
        case "nanometer":
          result = inputNumber * 1e9;
          break;
        case "foot":
          result = inputNumber * 3.28084;
          break;
        case "yard":
          result = inputNumber * 1.09361;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
    // conversion for length (micrometer)
  switch(fromUnit) {
    case "meter":
      switch(toUnit) {
        case "meter":
          result = inputNumber;
          break;
        case "centimeter":
          result = inputNumber * 100;
          break;
        case "kilometer":
          result = inputNumber / 1000;
          break;
        case "inch":
          result = inputNumber * 39.3701;
          break;
        case "mile":
          result = inputNumber * 0.000621371;
          break;
        case "angstrom":
          result = inputNumber * 1e10;
          break;
        case "millimeter":
          result = inputNumber * 1000;
          break;
        case "micrometer":
          result = inputNumber * 1e6;
          break;
        case "nanometer":
          result = inputNumber * 1e9;
          break;
        case "foot":
          result = inputNumber * 3.28084;
          break;
        case "yard":
          result = inputNumber * 1.09361;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
    // conversion for length (from nanometer)
  switch(fromUnit) {
    case "meter":
      switch(toUnit) {
        case "meter":
          result = inputNumber;
          break;
        case "centimeter":
          result = inputNumber * 100;
          break;
        case "kilometer":
          result = inputNumber / 1000;
          break;
        case "inch":
          result = inputNumber * 39.3701;
          break;
        case "mile":
          result = inputNumber * 0.000621371;
          break;
        case "angstrom":
          result = inputNumber * 1e10;
          break;
        case "millimeter":
          result = inputNumber * 1000;
          break;
        case "micrometer":
          result = inputNumber * 1e6;
          break;
        case "nanometer":
          result = inputNumber * 1e9;
          break;
        case "foot":
          result = inputNumber * 3.28084;
          break;
        case "yard":
          result = inputNumber * 1.09361;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
    // conversion for length (mile)
  switch(fromUnit) {
    case "meter":
      switch(toUnit) {
        case "meter":
          result = inputNumber;
          break;
        case "centimeter":
          result = inputNumber * 100;
          break;
        case "kilometer":
          result = inputNumber / 1000;
          break;
        case "inch":
          result = inputNumber * 39.3701;
          break;
        case "mile":
          result = inputNumber * 0.000621371;
          break;
        case "angstrom":
          result = inputNumber * 1e10;
          break;
        case "millimeter":
          result = inputNumber * 1000;
          break;
        case "micrometer":
          result = inputNumber * 1e6;
          break;
        case "nanometer":
          result = inputNumber * 1e9;
          break;
        case "foot":
          result = inputNumber * 3.28084;
          break;
        case "yard":
          result = inputNumber * 1.09361;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
    // conversion for length (foot)
  switch(fromUnit) {
    case "meter":
      switch(toUnit) {
        case "meter":
          result = inputNumber;
          break;
        case "centimeter":
          result = inputNumber * 100;
          break;
        case "kilometer":
          result = inputNumber / 1000;
          break;
        case "inch":
          result = inputNumber * 39.3701;
          break;
        case "mile":
          result = inputNumber * 0.000621371;
          break;
        case "angstrom":
          result = inputNumber * 1e10;
          break;
        case "millimeter":
          result = inputNumber * 1000;
          break;
        case "micrometer":
          result = inputNumber * 1e6;
          break;
        case "nanometer":
          result = inputNumber * 1e9;
          break;
        case "foot":
          result = inputNumber * 3.28084;
          break;
        case "yard":
          result = inputNumber * 1.09361;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
    // conversion for length (from angstrom)
  switch(fromUnit) {
    case "meter":
      switch(toUnit) {
        case "meter":
          result = inputNumber;
          break;
        case "centimeter":
          result = inputNumber * 100;
          break;
        case "kilometer":
          result = inputNumber / 1000;
          break;
        case "inch":
          result = inputNumber * 39.3701;
          break;
        case "mile":
          result = inputNumber * 0.000621371;
          break;
        case "angstrom":
          result = inputNumber * 1e10;
          break;
        case "millimeter":
          result = inputNumber * 1000;
          break;
        case "micrometer":
          result = inputNumber * 1e6;
          break;
        case "nanometer":
          result = inputNumber * 1e9;
          break;
        case "foot":
          result = inputNumber * 3.28084;
          break;
        case "yard":
          result = inputNumber * 1.09361;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
    // conversion for length (from yard)
  switch(fromUnit) {
    case "meter":
      switch(toUnit) {
        case "meter":
          result = inputNumber;
          break;
        case "centimeter":
          result = inputNumber * 100;
          break;
        case "kilometer":
          result = inputNumber / 1000;
          break;
        case "inch":
          result = inputNumber * 39.3701;
          break;
        case "mile":
          result = inputNumber * 0.000621371;
          break;
        case "angstrom":
          result = inputNumber * 1e10;
          break;
        case "millimeter":
          result = inputNumber * 1000;
          break;
        case "micrometer":
          result = inputNumber * 1e6;
          break;
        case "nanometer":
          result = inputNumber * 1e9;
          break;
        case "foot":
          result = inputNumber * 3.28084;
          break;
        case "yard":
          result = inputNumber * 1.09361;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
  
  
  
    // conversion for mass (from gram)
  switch(fromUnit) {
    case "gram":
      switch(toUnit) {
        case "gram":
          result = inputNumber;
          break;
        case "milligram":
          result = inputNumber * 1000;
          break;
        case "kilogram":
          result = inputNumber / 1000;
          break;
        case "tonne":
          result = inputNumber / 1e+6;
          break;
        case "microgram":
          result = inputNumber * 1e+6;
          break;
        case "pound":
          result = inputNumber / 453.6;
          break;
        case "dalton":
          result = inputNumber * 6.022e+23;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }

 // conversion for mass (from kilogram)
  switch(fromUnit) {
    case "kilogram":
      switch(toUnit) {
        case "kilogram":
          result = inputNumber;
          break;
        case "milligram":
          result = inputNumber * 1e+6;
          break;
        case "gram":
          result = inputNumber * 1000;
          break;
        case "tonne":
          result = inputNumber / 1000;
          break;
        case "microgram":
          result = inputNumber * 1e+9;
          break;
        case "pound":
          result = inputNumber * 2.205;
          break;
        case "dalton":
          result = inputNumber * 6.022e+26;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }

 // conversion for mass (from milligram)
  switch(fromUnit) {
    case "milligram":
      switch(toUnit) {
        case "milligram":
          result = inputNumber;
          break;
        case "gram":
          result = inputNumber / 1000;
          break;
        case "kilogram":
          result = inputNumber / 1e+6;
          break;
        case "tonne":
          result = inputNumber / 1e+9;
          break;
        case "microgram":
          result = inputNumber * 1000;
          break;
        case "pound":
          result = inputNumber / 453600;
          break;
        case "dalton":
          result = inputNumber * 6.022e+20;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
  
   // conversion for mass (from tonne)
  switch(fromUnit) {
    case "tonne":
      switch(toUnit) {
        case "tonne":
          result = inputNumber;
          break;
        case "milligram":
          result = inputNumber * 1e+9;
          break;
        case "kilogram":
          result = inputNumber * 1000;
          break;
        case "gram":
          result = inputNumber * 1e+6;
          break;
        case "microgram":
          result = inputNumber * 1e+12;
          break;
        case "pound":
          result = inputNumber * 2205;
          break;
        case "dalton":
          result = inputNumber * 6.022e+29;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }

 // conversion for mass (from microgram)
  switch(fromUnit) {
    case "microgram":
      switch(toUnit) {
        case "microgram":
          result = inputNumber;
          break;
        case "milligram":
          result = inputNumber / 1000;
          break;
        case "kilogram":
          result = inputNumber / 1e+9;
          break;
        case "tonne":
          result = inputNumber / 1e+12;
          break;
        case "gram":
          result = inputNumber / 1e+6;
          break;
        case "pound":
          result = inputNumber / 4.536e+8;
          break;
        case "dalton":
          result = inputNumber * 6.022e+17;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
  
   // conversion for mass (from pound)
  switch(fromUnit) {
    case "pound":
      switch(toUnit) {
        case "pound":
          result = inputNumber;
          break;
        case "milligram":
          result = inputNumber * 453600;
          break;
        case "kilogram":
          result = inputNumber / 2.205;
          break;
        case "tonne":
          result = inputNumber / 2205;
          break;
        case "microgram":
          result = inputNumber * 4.536e+8;
          break;
        case "gram":
          result = inputNumber * 453.6;
          break;
        case "dalton":
          result = inputNumber * 2.732e+26;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
  
   // conversion for mass (from dalton)
  switch(fromUnit) {
    case "dalton":
      switch(toUnit) {
        case "dalton":
          result = inputNumber;
          break;
        case "milligram":
          result = inputNumber / 6.022e+20;
          break;
        case "kilogram":
          result = inputNumber / 6.022e+26;
          break;
        case "tonne":
          result = inputNumber / 6.022e+29;
          break;
        case "microgram":
          result = inputNumber / 6.022e+17;
          break;
        case "pound":
          result = inputNumber / 2.732e+26;
          break;
        case "gram":
          result = inputNumber / 6.022e+23;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }

  // conversion for energy (from joule)
  switch(fromUnit) {
    case "joule":
      switch(toUnit) {
        case "joule":
          result = inputNumber;
          break;
        case "erg":
          result = inputNumber * 1e+7;
          break;
        case "kilowatt-hour":
          result = inputNumber / 3.6e+6;
          break;
        case "electron volt":
          result = inputNumber * 6.242e+18;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }

// conversion for energy (from erg)
  switch(fromUnit) {
    case "erg":
      switch(toUnit) {
        case "erg":
          result = inputNumber;
          break;
        case "joule":
          result = inputNumber / 1e+7;
          break;
        case "kilowatt-hour":
          result = inputNumber / 3.6e+13;
          break;
        case "electron volt":
          result = inputNumber * 6.242e+11;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }

// conversion for energy (from kilowatt-hour)
  switch(fromUnit) {
    case "kilowatt-hour":
      switch(toUnit) {
        case "kilowatt-hour":
          result = inputNumber;
          break;
        case "erg":
          result = inputNumber * 3.6e+13;
          break;
        case "joule":
          result = inputNumber * 3.6e+6;
          break;
        case "electron volt":
          result = inputNumber * 2.247e+25;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
  
  // conversion for energy (from electron-volt)
  switch(fromUnit) {
    case "electron-volt":
      switch(toUnit) {
        case "electron-volt":
          result = inputNumber;
          break;
        case "erg":
          result = inputNumber / 6.242e+11;
          break;
        case "kilowatt-hour":
          result = inputNumber / 2.247e+25;
          break;
        case "joule":
          result = inputNumber / 6.242e+18;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }

  // conversion for pressure (from pascal)
  switch(fromUnit) {
    case "pascal":
      switch(toUnit) {
        case "pascal":
          result = inputNumber;
          break;
        case "bar":
          result = inputNumber / 100000;
          break;
        case "atm":
          result = inputNumber / 101300;
          break;
        case "torr":
          result = inputNumber / 133.3;
          break;
        case "mmHg":
          result = inputNumber/ 133.3;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }

// conversion for pressure (from bar)
  switch(fromUnit) {
    case "bar":
      switch(toUnit) {
        case "bar":
          result = inputNumber;
          break;
        case "pascal":
          result = inputNumber * 100000;
          break;
        case "atm":
          result = inputNumber / 1.013;
          break;
        case "torr":
          result = inputNumber * 750.1;
          break;
        case "mmHg":
          result = inputNumber * 750.1;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }

// conversion for pressure (from atm)
  switch(fromUnit) {
    case "atm":
      switch(toUnit) {
        case "atm":
          result = inputNumber;
          break;
        case "pascal":
          result = inputNumber * 101300;
          break;
        case "bar":
          result = inputNumber * 1.013;
          break;
        case "torr":
          result = inputNumber * 760;
          break;
        case "mmHg":
          result = inputNumber * 760;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
  
  // conversion for pressure (from torr)
  switch(fromUnit) {
    case "torr":
      switch(toUnit) {
        case "torr":
          result = inputNumber;
          break;
        case "pascal":
          result = inputNumber * 133.3;
          break;
        case "atm":
          result = inputNumber / 760;
          break;
        case "bar":
          result = inputNumber / 750.1;
          break;
        case "mmHg":
          result = inputNumber * 1;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }
  
  // conversion for pressure (from mmHg)
  switch(fromUnit) {
    case "mmHg":
      switch(toUnit) {
        case "mmHg":
          result = inputNumber;
          break;
        case "pascal":
          result = inputNumber * 133.3;
          break;
        case "atm":
          result = inputNumber / 760;
          break;
        case "torr":
          result = inputNumber * 1;
          break;
        case "bar":
          result = inputNumber / 750.1;
          break;
        default:
          break;
      }
      break;
    
    default:
      break;
  }

  // conversion for Frequency (from hertz)
  switch(fromUnit) {
    case "hertz":
      switch(toUnit) {
        case "hertz":
          result = inputNumber;
          break;
        case "kilohertz":
          result = inputNumber / 1000;
          break;
        case "megahertz":
          result = inputNumber / 1e+6;
          break;
        case "gigahertz":
          result = inputNumber / 1e+9;
          break;
        
        default:
          break;
      }
      break;
    
    default:
      break;
  }
  
  
  // conversion for Frequency (from kilohertz)
  switch(fromUnit) {
    case "kilohertz":
      switch(toUnit) {
        case "kilohertz":
          result = inputNumber;
          break;
        case "hertz":
          result = inputNumber * 1000;
          break;
        case "megahertz":
          result = inputNumber / 1000;
          break;
        case "gigahertz":
          result = inputNumber / 1e+6;
          break;
        
        default:
          break;
      }
      break;
    
    default:
      break;
  }

// conversion for Frequency (from megahertz)
  switch(fromUnit) {
    case "megahertz":
      switch(toUnit) {
        case "megahertz":
          result = inputNumber;
          break;
        case "kilohertz":
          result = inputNumber * 1000;
          break;
        case "hertz":
          result = inputNumber * 1e+6;
          break;
        case "gigahertz":
          result = inputNumber / 1000;
          break;
        
        default:
          break;
      }
      break;
    
    default:
      break;
  }
  
  // conversion for Frequency (from gigahertz)
  switch(fromUnit) {
    case "gigahertz":
      switch(toUnit) {
        case "gigahertz":
          result = inputNumber;
          break;
        case "kilohertz":
          result = inputNumber * 1e+6;
          break;
        case "megahertz":
          result = inputNumber * 1000;
          break;
        case "hertz":
          result = inputNumber * 1e+9;
          break;
        
        default:
          break;
      }
      break;
    
    default:
      break;
  }

  
  document.getElementById("result").textContent = inputNumber + " " + fromUnit + " = " + result + " " + toUnit;
  document.getElementById("result").style.display = "block";
}
</script>

</body>
</html>

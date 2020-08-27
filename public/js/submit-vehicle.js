/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function fillModelsOptions(makerSelectedId) {
    var oldModelId = document.getElementById("oldModel").getAttribute("value");

    // Reset the list every time
    $('#selectModel').find('option:not(:first)').remove();

    if (makerSelectedId === "") {

        // If no maker selected, disable the component
        $('#selectModel').prop('disabled', true);
        $('#selectModel').selectpicker('refresh');

    } else {
        var selectElement = document.getElementById('selectModel');

        // Fill the list with models of maker selected
        modelsList.forEach(function (current) {
            if (current.makeId === makerSelectedId) {

                var option = document.createElement("option");
                option.text = current.name;
                option.value = current.id;


                // If model is previous selected, mark as selected
                if (option.value === oldModelId) {

                    option.setAttribute("selected", "true");
                }

                // Add the model to the models select list component 
                selectElement.add(option);
            }
        });
        $('#selectModel').prop('disabled', false);
        $('#selectModel').selectpicker('refresh');
    }
}

function kwToCv() {
    var kw = document.getElementById("powerKw");
    var cv = document.getElementById("powerCv");

    var result = Math.round(kw.value * 1.359);


    if (result < 1) {
        cv.value = "";
    } else {
        cv.value = result;
    }
}


function cvToKw() {
    var kw = document.getElementById("powerKw");
    var cv = document.getElementById("powerCv");

    var result = Math.round(cv.value * 0.736);

    if (result < 1) {
        kw.value = "";
    } else {
        kw.value = result;
    }
}

var firstRegistration = new Object();
firstRegistration.month = "";
firstRegistration.year = "";

function fillFirstRegistrationDate(month, year) {
    var result;
    var objective1 = document.getElementById('textFirstRegistration');
    var objective2 = document.getElementById('textFirstRegistrationDisplay');

    if (month !== null) {
        if (month.length < 2) {
            month = "0" + month;
        }
        firstRegistration.month = month;
    }
    if (year !== null) {
        firstRegistration.year = year;
    }

    result = firstRegistration.month + " / " + firstRegistration.year;
    objective2.value = objective1.value = result;
}

var nextInspection = new Object();
nextInspection.month = "";
nextInspection.year = "";

function fillNextInspection(month, year) {
    var result;
    var objective1 = document.getElementById('textNextInspection');
    var objective2 = document.getElementById('textNextInspectionDisplay');

    if (month !== null) {
        if (month.length < 2) {
            month = "0" + month;
        }
        nextInspection.month = month;
    }
    if (year !== null) {
        nextInspection.year = year;
    }

    result = nextInspection.month + " / " + nextInspection.year;
    objective2.value = objective1.value = result;
}


var lastService = new Object();
lastService.month = "";
lastService.year = "";

function fillLastTechnicalService(month, year) {
    var result;
    var objective1 = document.getElementById('textLastTechnicalService');
    var objective2 = document.getElementById('textLastTechnicalServiceDisplay');

    if (month !== null) {
        if (month.length < 2) {
            month = "0" + month;
        }
        lastService.month = month;
    }
    if (year !== null) {
        lastService.year = year;
    }

    result = lastService.month + " / " + lastService.year;
    objective2.value = objective1.value = result;
}

var lastCamBeltService = new Object();
lastCamBeltService.month = "";
lastCamBeltService.year = "";

function fillLastCamBeltService(month, year) {
    var result;
    var objective1 = document.getElementById('textLastCamBeltService');
    var objective2 = document.getElementById('textLastCamBeltServiceDisplay');

    if (month !== null) {
        if (month.length < 2) {
            month = "0" + month;
        }
        lastCamBeltService.month = month;
    }
    if (year !== null) {
        lastCamBeltService.year = year;
    }

    result = lastCamBeltService.month + " / " + lastCamBeltService.year;
    objective2.value = objective1.value = result;
}

function formatLicensePlate() {
    var licensePlate = document.getElementById("licensePlate"), str = "", isValid;
    var pattValidPlate = /(^[a-z]{2}-?[0-9]{4}-?[a-z]{2}$|^[a-z]{1}-?[0-9]{4}-?[a-z]{2}$)|^[0-9]{4}-?[a-z]{3}$/i;

    str = licensePlate.value;
    isValid = str.match(pattValidPlate);

    if (isValid === null) {
        licensePlate.value = "";
        licensePlate.placeholder = "Antigua: xx-0000-xx | Actual: 0000-xxx ";
        return;
    }

    var plate = null;
    var pattOldPlate = /^[a-z][a-z]|^[a-z]/i;
    var pattLold = /[a-z][a-z]$/i;
    var pattL = /[a-z][a-z][a-z]$/i;
    var pattN = /[0-9][0-9][0-9][0-9]/i;
    var fistLetters;
    var number;
    var letters;
    var isOld = str.match(pattOldPlate);

    if (isOld !== null) {
        fistLetters = str.match(pattOldPlate);
        number = str.match(pattN);
        letters = str.match(pattLold);
        plate = fistLetters + "-" + number + "-" + letters;
        licensePlate.value = plate.toUpperCase();
    } else {
        number = str.match(pattN);
        letters = str.match(pattL);
        plate = number + "-" + letters;
        licensePlate.value = plate.toUpperCase();
    }

}

function showInputConsumptions(fuelSelectedId) {

    var electricCombinated = document.getElementById("electricConsumptionCombined");
    var fuelUrban = document.getElementById("fuelConsumptionUrban");
    var fuelHighway = document.getElementById("fuelConsumptionHighway");
    var fuelCombinated = document.getElementById("fuelConsumptionCombined");

    if (fuelSelectedId !== "") {
        fuelSelectedId = fuelSelectedId.toUpperCase();
        if (fuelSelectedId === "E") {
            fuelUrban.value = "";
            fuelHighway.value = "";
            fuelCombinated.value = "";
            $('#cylinders').collapse('hide');
            $('#divFuelConsumptionGroup').collapse('hide');
            $('#divElectricConsumptionGroup').collapse('show');
        } else {
            electricCombinated.value = "";
            $('#divElectricConsumptionGroup').collapse('hide');
            $('#divFuelConsumptionGroup').collapse('show');
            $('#cylinders').collapse('show');
        }
    } else {
        electricCombinated.value = "";
        fuelUrban.value = "";
        fuelHighway.value = "";
        fuelCombinated.value = "";
        $('#divFuelConsumptionGroup').collapse('hide');
        $('#divElectricConsumptionGroup').collapse('hide');
        $('#cylinders').collapse('hide');
    }
}

function toggles(sender){
   
    if (sender.value !== "1"){
        sender.value = "1";
        sender.checked = true;
    }else{
        sender.value = "0";
        sender.checked = true;
    }
}

$('#selectMaker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var makerSelectedId = e.currentTarget.selectedOptions[0].value;
    fillModelsOptions(makerSelectedId);
});
$('#selectModel').prop('disabled', true);

$('#selectFuelCategory').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var fuelSelectedId = e.currentTarget.selectedOptions[0].value;
    showInputConsumptions(fuelSelectedId);
});

$('#selectMonthRegistration').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var monthSelected = e.currentTarget.selectedOptions[0].value;
    fillFirstRegistrationDate(monthSelected, null);
});

$('#selectYearRegistration').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var yearSelected = e.currentTarget.selectedOptions[0].value;
    fillFirstRegistrationDate(null, yearSelected);
});


$('#selectMonthNextInspection').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var monthSelected = e.currentTarget.selectedOptions[0].value;
    fillNextInspection(monthSelected, null);
});

$('#selectYearNextInspection').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var yearSelected = e.currentTarget.selectedOptions[0].value;
    fillNextInspection(null, yearSelected);
});

$('#selectMonthLastTechnicalService').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var monthSelected = e.currentTarget.selectedOptions[0].value;
    fillLastTechnicalService(monthSelected, null);
});

$('#selectYearLastTechnicalService').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var yearSelected = e.currentTarget.selectedOptions[0].value;
    fillLastTechnicalService(null, yearSelected);
});

$('#selectMonthLastCamBeltService').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var monthSelected = e.currentTarget.selectedOptions[0].value;
    fillLastCamBeltService(monthSelected, null);
});

$('#selectYearLastCamBeltService').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var yearSelected = e.currentTarget.selectedOptions[0].value;
    fillLastCamBeltService(null, yearSelected);
});




window.onload = function () {
    var maker = $('#selectMaker').selectpicker('val');
    fillModelsOptions(maker);

};

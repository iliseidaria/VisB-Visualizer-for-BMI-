function addEventListeners(){
    document.getElementById('responsive-menu-bar').addEventListener('click',()=>{
        document.getElementById('responsive-menu').style.display='block';
    });
    document.getElementById('menu-close-bar').addEventListener('click',()=>{
        document.getElementById('responsive-menu').style.display='none';
    });
}

addEventListeners();

function setUnit(unit) {
    const unitSelection = document.querySelectorAll('.unit-selection .unit');
    unitSelection.forEach(option => option.classList.remove('selected'));

    const selectedUnit = document.querySelector(`.unit-selection a[href="javascript:setUnit('${unit}')"]`);
    selectedUnit.classList.add('selected');

    const calculatorContainer = document.querySelector('.calculator-container');
    calculatorContainer.style.display = unit === 'Metric' ? 'block' : 'none';
}

const metricForm = document.querySelector('.metric-form');
const usForm = document.querySelector('.us-form');
const metricButton = document.getElementById('metricButton');
const usButton = document.getElementById('usButton');
const calculateButton = document.getElementById('calculateButton');

// functie pt afisare/ascuns formul pe baza selectiei unitatilor
function showForm(formElement) {
  metricForm.style.display = 'none';
  usForm.style.display = 'none';
  formElement.style.display = 'block';
}

// event listeners pt butoanele de selectie a unitatilor
metricButton.addEventListener('click', function() {
    if (metricForm.style.display === 'block') {
      //nu facem nimic, daca este deja ales
    } else {
      showForm(metricForm);
      metricButton.classList.add('selected');
      usButton.classList.remove('selected');
    }
});
  
usButton.addEventListener('click', function() {
    if (usForm.style.display === 'block') {
       //nu facem nimic, daca e deja ales
    } else {
      showForm(usForm);
      metricButton.classList.remove('selected');
      usButton.classList.add('selected');
    }
});

// functie de initializare (metric by default)
function initialize() {
    showForm(metricForm);
    metricButton.classList.add('selected');
    usButton.classList.remove('selected');
}

window.addEventListener('load', initialize);
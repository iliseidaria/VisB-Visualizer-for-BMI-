function addEventListeners(){
    document.getElementById('responsive-menu-bar').addEventListener('click',()=>{
        document.getElementById('responsive-menu').style.display='block';
    });
    document.getElementById('menu-close-bar').addEventListener('click',()=>{
        document.getElementById('responsive-menu').style.display='none';
    });
}

addEventListeners();


function selectMeasurementBMI(){
document.getElementById('metricButton').addEventListener('click', function() {
    document.querySelector('.metric-form').style.display = 'block';
    document.querySelector('.us-form').style.display = 'none';
    this.classList.add('selected');
    document.getElementById('usButton').classList.remove('selected');
});

document.getElementById('usButton').addEventListener('click', function() {
    document.querySelector('.metric-form').style.display = 'none';
    document.querySelector('.us-form').style.display = 'block';
    this.classList.add('selected');
    document.getElementById('metricButton').classList.remove('selected');
});
}

selectMeasurementBMI();


document.addEventListener('DOMContentLoaded', function() {
  const button1v1 = document.getElementById('button1v1');
  const buttonMaxValue = document.getElementById('buttonMaxValue');
  const buttonMinValue = document.getElementById('buttonMinValue');
  const buttonSameValue = document.getElementById('buttonSameValue');
  const resultsContainer = document.getElementById('results');

  function loadSection(url) {
      fetch(url)
          .then(response => response.text())
          .then(data => {
              resultsContainer.innerHTML = data;
          })
          .catch(error => {
              resultsContainer.innerHTML = `<p>There was an error loading the content.</p>`;
              console.error('Error:', error);
          });
  }

  button1v1.addEventListener('click', function() {
      loadSection('section1v1.php');
      button1v1.classList.add('selected');
      buttonMaxValue.classList.remove('selected');
      buttonMinValue.classList.remove('selected');
      buttonSameValue.classList.remove('selected');
  });

  buttonMaxValue.addEventListener('click', function() {
      loadSection('maxValue.php');
      button1v1.classList.remove('selected');
      buttonMaxValue.classList.add('selected');
      buttonMinValue.classList.remove('selected');
      buttonSameValue.classList.remove('selected');
  });

  buttonMinValue.addEventListener('click', function() {
      loadSection('minValue.php');
      button1v1.classList.remove('selected');
      buttonMaxValue.classList.remove('selected');
      buttonMinValue.classList.add('selected');
      buttonSameValue.classList.remove('selected');
  });

  buttonSameValue.addEventListener('click', function() {
      loadSection('sameValue.php');
      button1v1.classList.remove('selected');
      buttonMaxValue.classList.remove('selected');
      buttonMinValue.classList.remove('selected');
      buttonSameValue.classList.add('selected');
  });

  loadSection('section1v1.php');
});
function getDate() {
  var date = new Date().toLocaleDateString("in_ID");
  document.write(date);
}

function getCurrentDate() {
    const today = new Date();
    const day = String(today.getDate()).padStart(2, '0');
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based
    const year = today.getFullYear();
    return `${day}/${month}/${year}`;
  }

  const dateTextElements = document.querySelectorAll('.date-text');
  dateTextElements.forEach(element => {
    element.textContent = getCurrentDate();
  });

  function getCurrentYear() {
    const today = new Date();
    const year = today.getFullYear();
    return year;
  }

  const yearTextElements = document.querySelectorAll('.year-text');
  yearTextElements.forEach(element => {
    element.textContent = `Tahun: ${getCurrentYear()}`;
  });
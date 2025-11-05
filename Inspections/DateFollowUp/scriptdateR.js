// Get the current date in YYYY-MM-DD format
function getCurrentDate() {
  const now = new Date();
  const year = now.getFullYear();
  const month = String(now.getMonth() + 1).padStart(2, '0');
  const day = String(now.getDate()).padStart(2, '0');
  return `${year}-${month}-${day}`;
}

// Set the value of the date input field to the current date
document.addEventListener('DOMContentLoaded', function() {
  const dateInput = document.getElementById('dateInputR');
  dateInput.value = getCurrentDate();
});

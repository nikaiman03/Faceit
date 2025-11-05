// Get the current time in HH:mm format
function getCurrentTime() {
  const now = new Date();
  const hours = String(now.getHours()).padStart(2, '0');
  const minutes = String(now.getMinutes()).padStart(2, '0');
  return `${hours}:${minutes}`;
}

// Set the value of the time input field to the current time
document.addEventListener('DOMContentLoaded', function() {
  const timeInput = document.getElementById('timeInput');
  timeInput.value = getCurrentTime();
});

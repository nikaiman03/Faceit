/**
 * Faceit Solutions - Time Management Script
 * Purpose: Automate inspection timestamps for technicians
 */

function setCurrentTime() {
    const timeInput = document.getElementById('timeInput');
    
    if (timeInput) {
        const now = new Date();
        
        // Format to HH:mm (24-hour format)
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const formattedTime = `${hours}:${minutes}`;

        // Set the value
        timeInput.value = formattedTime;

        // Security: Lock the field to prevent manual tampering of logs
        timeInput.setAttribute('readonly', true);
    }
}

// Execute when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', setCurrentTime);
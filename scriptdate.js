/**
 * Faceit Solutions - Date Management Script
 * Requirement: Data Integrity & Business Logic
 */

document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('dateInput');
    
    // 1. Get current date in local time (Avoids timezone shifts)
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    const formattedDate = `${year}-${month}-${day}`;

    // 2. Auto-fill the Repair Date
    if (dateInput) {
        dateInput.value = formattedDate;
        
        // 3. Security Hint: Ensure it's locked
        // Even if the HTML forgot 'readonly', JS will enforce it here
        dateInput.setAttribute('readonly', true);
    }
});

/**
 * Pro-tip for Section 3.1 (Software Design):
 * Explain that while JS sets the date for User Experience (UX), 
 * the server-side script (save.php) should also re-verify the date 
 * using PHP's date('Y-m-d') to prevent tampering.
 */
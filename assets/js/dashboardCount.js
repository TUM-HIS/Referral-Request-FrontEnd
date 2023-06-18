var patientsCountUrl = document.currentScript.getAttribute('data-patients-count-url');
var physiciansCountUrl = document.currentScript.getAttribute('data-physicians-count-url');
var referralsCountUrl = document.currentScript.getAttribute('data-referrals-count-url');

function fetchPatientsCount(period) {
    // Make an AJAX request to the server to get the updated patient count
    fetch(`${patientsCountUrl}?period=${period}`)
        .then(response => response.json())
        .then(data => {
            // Update the patient count in the view
            document.getElementById('patients-count').textContent = data;
            // Update the period text
            document.getElementById('patients-period').textContent = '| ' + period.charAt(0).toUpperCase() + period.slice(1);
        })
        .catch(error => {
            // Handle any error that occurred during the AJAX request
            console.log(error);
        });
}

function fetchPhysiciansCount(period) {
    // Make an AJAX request to the server to get the updated physicians count
    fetch(`${physiciansCountUrl}?period=${period}`)
        .then(response => response.json())
        .then(data => {
            // Update the physician count in the view
            document.getElementById('physicians-count').textContent = data;
            // Update the period text
            document.getElementById('physicians-period').textContent = '| ' + period.charAt(0).toUpperCase() + period.slice(1);
        })
        .catch(error => {
            // Handle any error that occurred during the AJAX request
            console.log(error);
        });
}

function fetchReferralsCount(period) {
    // Make an AJAX request to the server to get the updated physicians count
    fetch(`${referralsCountUrl}?period=${period}`)
        .then(response => response.json())
        .then(data => {
            // Update the physician count in the view
            document.getElementById('referrals-count').textContent = data;
            // Update the period text
            document.getElementById('referrals-period').textContent = '| ' + period.charAt(0).toUpperCase() + period.slice(1);
        })
        .catch(error => {
            // Handle any error that occurred during the AJAX request
            console.log(error);
        });
}
function fetchPatientsCount(period) {
    axios.get('/patients-count', {
        params: {
            period: period
        }
    })
    .then(function(response) {
        const patientsCount = response.data;
        document.querySelector('#patients-period').textContent = '| ' + period.charAt(0).toUpperCase() + period.slice(1);
        document.querySelector('#patients-count').textContent = patientsCount;
        // Update other elements as needed
    })
    .catch(function(error) {
        console.error(error);
    });
}

// Fetch initial data on page load
fetchPatientsCount('today');
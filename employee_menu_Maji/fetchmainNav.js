fetch('mainnavbar.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('mainnavbar').innerHTML = data;
    })
    .catch(error => console.error('Error fetching mainnavbar:', error));

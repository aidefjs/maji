fetch('basket.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('basket').innerHTML = data;
    })
    .catch(error => console.error('Error fetching basket:', error));

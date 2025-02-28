document.addEventListener("DOMContentLoaded", function () {
    function updateCounters() {
        fetch(counterAjax.ajax_url + '?action=get_counter_values')
            .then(response => response.json())
            .then(data => {
                document.getElementById('projects_completed').innerHTML = data.projects_completed + " <span class='blue'>+</span>";
                document.getElementById('hours_coding').innerHTML = data.hours_coding + " <span class='blue'>m</span>";
                document.getElementById('happy_clients').innerHTML = data.happy_clients + " <span class='blue'>+</span>";
            })
            .catch(error => console.error("Error fetching counter values:", error));
    }

    updateCounters();
    setInterval(updateCounters, 3000); // Auto-update every 3 seconds
});



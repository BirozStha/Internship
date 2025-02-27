document.addEventListener("DOMContentLoaded", function () {
    function updateCounters() {
        fetch('/wp-admin/admin-ajax.php?action=get_counter_values')
            .then(response => response.json())
            .then(data => {
                document.getElementById('projects_completed').innerText = data.projects_completed + " +";
                document.getElementById('hours_coding').innerText = data.hours_coding + "m";
                document.getElementById('happy_clients').innerText = data.happy_clients + " +";
            })
            .catch(error => console.error("Error fetching counter values:", error));
    }

    updateCounters();
    setInterval(updateCounters, 5000); // Auto-update every 5 seconds
});


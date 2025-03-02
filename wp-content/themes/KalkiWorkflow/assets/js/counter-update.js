document.addEventListener("DOMContentLoaded", function () {
    let lastValues = { projects_completed: 0, hours_coding: 0, happy_clients: 0 };

    function animateCounter(element, start, end, duration) {
        let startTime = null;
        const step = (timestamp) => {
            if (!startTime) startTime = timestamp;
            const progress = Math.min((timestamp - startTime) / duration, 1);
            element.innerHTML = Math.floor(progress * (end - start) + start) + " <span class='blue'>+</span>";
            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                element.innerHTML = end + " <span class='blue'>+</span>";
            }
        };
        requestAnimationFrame(step);
    }

    function updateCounters() {
        fetch(counterAjax.ajax_url + '?action=get_counter_values', {
            method: 'GET',
            cache: 'no-cache',
            headers: { 'Content-Type': 'application/json' }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let newValues = {
                    projects_completed: parseInt(data.data.projects_completed),
                    hours_coding: parseInt(data.data.hours_coding),
                    happy_clients: parseInt(data.data.happy_clients)
                };

                // Only animate if values have changed
                if (newValues.projects_completed !== lastValues.projects_completed) {
                    animateCounter(document.getElementById('projects_completed'), 0, newValues.projects_completed, 2000);
                }
                if (newValues.hours_coding !== lastValues.hours_coding) {
                    animateCounter(document.getElementById('hours_coding'), 0, newValues.hours_coding, 2000);
                }
                if (newValues.happy_clients !== lastValues.happy_clients) {
                    animateCounter(document.getElementById('happy_clients'), 0, newValues.happy_clients, 2000);
                }

                // Update last known values
                lastValues = newValues;
            } else {
                console.error("Invalid response:", data);
            }
        })
        .catch(error => console.error("Error fetching counter values:", error));
    }

    updateCounters(); // Initial call on page load
    setInterval(updateCounters, 3000); // Fetch updates only if values change
});



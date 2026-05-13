document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".visitor-box").forEach(box => {

        const endpoint = box.dataset.endpoint;

        fetch(endpoint)
            .then(res => res.json())
            .then(data => {

                const canvas = box.querySelector("canvas");

                new Chart(canvas, {
                    type: 'pie',
                    data: {
                        labels: data.map(item => item.country),
                        datasets: [{
                            data: data.map(item => item.total),
                        }]
                    }
                });

            });

    });

});
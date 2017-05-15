new Vue({
    el: '#dashboard',

    data: {
        admin: '',
        op:'',
        kepala:'',
        teacher:'',
        student: '',

    },

    ready: function(){
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });

            // Slimscroll
            $('.slimscroll').slimscroll({
                allowPageScroll: true
            });
        });



        var ctx = document.getElementById("user-report").getContext("2d");

        var data = {
            labels: ["Pendidik", "Peserta didik"],
            datasets: [
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,0.8)",
                    highlightFill: "rgba(151,187,205,0.75)",
                    highlightStroke: "rgba(151,187,205,1)",
                    data: [this.teacher, this.student]
                }
            ]
        };

        var myNewChart = new Chart(ctx).Bar(data, {
            scaleBeginAtZero : true,

            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines : true,            
        });
    },
})       

        
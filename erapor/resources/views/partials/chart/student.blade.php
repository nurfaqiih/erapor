<canvas id="myChart" class="col-md-12"></canvas>

@section('footer')
    @include('partials.footer')
    <script type="text/javascript">
        var ctx = $('#myChart').get(0).getContext('2d');

        var data = {
            labels: window.bp,
            tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
            datasets: [
                {
                    label: "Laki Laki",
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    data: window.men
                },
                {
                    label: "Perempuan",
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,0.8)",
                    highlightFill: "rgba(151,187,205,0.75)",
                    highlightStroke: "rgba(151,187,205,1)",
                    data: window.women
                }
            ]
        };
        var myBarChart = new Chart(ctx).Line(data);
    </script>
@endsection
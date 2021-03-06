<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Kevin</title>
    <link rel="stylesheet" href="Rotary.css" type="text/css">
    <link rel="stylesheet" href="Graph.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
</head>
<body>
<div class="main-front">
    <h1>Decryption of Vigenère cipher</h1>
    <br>
    <div class="col-md-6">
        <label for="cipher">Analyze your cipher here:</label>
        <textarea class="form-control" rows="6" id="cipher" style="width: 500px"></textarea>
        <div id="ticker">
            <div class="rotator"></div>
            <div class="rotator"></div>
            <div class="rotator"></div>
            <div id="result"></div>
        </div>
        <br>
        <br>
    </div>
    <div class="col-md-6">
        <br>
        <label>Frequency of letters:</label>
        <div id="graph"></div>
        <script src="http://d3js.org/d3.v3.min.js"></script>
        <script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
        <script>

            var margin = {top: 40, right: 20, bottom: 30, left: 40},
                width = 600 - margin.left - margin.right,
                height = 500 - margin.top - margin.bottom;

//            var formatPercent = d3.format(".0%");

            var x = d3.scale.ordinal()
                .rangeRoundBands([0, width], .1);

            var y = d3.scale.linear()
                .range([height, 0]);

            var xAxis = d3.svg.axis()
                .scale(x)
                .orient("bottom");

            var yAxis = d3.svg.axis()
                .scale(y)
                .orient("left")
//                .tickFormat(formatPercent);

            var tip = d3.tip()
                .attr('class', 'd3-tip')
                .offset([-10, 0])
                .html(function (d) {
                    return "<strong>Frequency:</strong> <span style='color:red'>" + d.frequency + "</span>";
                })

            var svg = d3.select("#graph").append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.top + margin.bottom)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

            svg.call(tip);

            d3.tsv("data.tsv", type, function (error, data) {
                x.domain(data.map(function (d) {
                    return d.letter;
                }));
                y.domain([0, d3.max(data, function (d) {
                    return d.frequency;
                })]);

                svg.append("g")
                    .attr("class", "x axis")
                    .attr("transform", "translate(0," + height + ")")
                    .call(xAxis);

                svg.append("g")
                    .attr("class", "y axis")
                    .call(yAxis)
                    .append("text")
                    .attr("transform", "rotate(-90)")
                    .attr("y", 6)
                    .attr("dy", ".71em")
                    .style("text-anchor", "end")
                    .text("Frequency");

                svg.selectAll(".bar")
                    .data(data)
                    .enter().append("rect")
                    .attr("class", "bar")
                    .attr("x", function (d) {
                        return x(d.letter);
                    })
                    .attr("width", x.rangeBand())
                    .attr("y", function (d) {
                        return y(d.frequency);
                    })
                    .attr("height", function (d) {
                        return height - y(d.frequency);
                    })
                    .on('mouseover', tip.show)
                    .on('mouseout', tip.hide)

            });

            function type(d) {
                d.frequency = +d.frequency;
                return d;
            }

        </script>
    </div>
    <div class="col-md-12">
        <label for="result">Result:</label>
        <textarea class="form-control" rows="6" id="result" style="width: 500px"></textarea>
    </div>
</div>
</body>
<script src="Rotary.js"></script>
<script src="Graph.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</html>